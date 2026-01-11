<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Symfony\Component\DomCrawler\Crawler;

use App\Models\Category;
use App\Models\Listing;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ScrapingController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.scraping.index', compact('categories'));
    }

    private function geocodeAddress($address)
    {
        $data = [
            'latitude' => 0,
            'longitude' => 0,
            'state' => 'Unknown',
            'city' => 'Unknown',
            'zip_code' => '000000',
        ];

        if (empty($address)) {
            return $data;
        }

        // Helper to perform the request
        $fetchGeoData = function($query) {
            $url = "https://nominatim.openstreetmap.org/search?q=" . urlencode($query) . "&format=json&addressdetails=1&limit=1";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, "DialBase-Scraper/1.0");
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            $response = curl_exec($ch);
            curl_close($ch);
            return $response ? json_decode($response, true) : null;
        };

        try {
            // Extract Zip Code from address first (fallback)
            if (preg_match('/\b\d{6}\b/', $address, $matches)) {
                $data['zip_code'] = $matches[0];
            }

            // 1. Try Full Address
            $json = $fetchGeoData($address);

            // 2. Fallback: Try City/Last Part if full address fails
            if (empty($json)) {
                $parts = explode(',', $address);
                $lastPart = trim(end($parts));
                
                // Handle "City - Zip" format
                if (strpos($lastPart, '-') !== false) {
                    $subParts = explode('-', $lastPart);
                    $potentialCity = trim($subParts[0]);
                    if (!is_numeric($potentialCity)) {
                        $lastPart = $potentialCity;
                    }
                }

                if ($lastPart !== $address && !empty($lastPart)) {
                    $json = $fetchGeoData($lastPart);
                }
            }

            if (!empty($json) && isset($json[0])) {
                $result = $json[0];
                $data['latitude'] = $result['lat'] ?? 0;
                $data['longitude'] = $result['lon'] ?? 0;
                
                if (isset($result['address'])) {
                    $addr = $result['address'];
                    $data['state'] = $addr['state'] ?? $addr['region'] ?? 'Unknown';
                    $data['city'] = $addr['city'] ?? $addr['town'] ?? $addr['village'] ?? $addr['county'] ?? 'Unknown';
                    $data['zip_code'] = $addr['postcode'] ?? $data['zip_code'];
                }
            }
        } catch (\Exception $e) {
            // Ignore geocoding errors
        }

        return $data;
    }

    public function scrape_website(Request $request)
    {
        $url = $request->input('url');
        $categoryId = $request->input('category_id');

        if (!$url) {
            return redirect()->back()->with('error', 'Please provide a URL.');
        }
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8',
            'Accept-Language: en-US,en;q=0.9',
            'Referer: https://www.google.com/',
            'Upgrade-Insecure-Requests: 1',
            'Sec-Fetch-Dest: document',
            'Sec-Fetch-Mode: navigate',
            'Sec-Fetch-Site: cross-site',
            'Sec-Fetch-User: ?1',
        ]);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);

        $response = curl_exec($ch);
        
        if (curl_errno($ch)) {
            return redirect()->back()->with('error', 'Curl Error: ' . curl_error($ch));
        }
        
        curl_close($ch);

        $crawler = new Crawler($response);
        $scrapedData = $crawler->filter('.resultbox_info')->each(function (Crawler $node) {
            $titleNode = $node->filter('.resultbox_title_anchor');
            $title = $titleNode->count() ? $titleNode->text() : null;

            $anchorNode = $node->filter('.resultbox_title_anchorbox');
            $link = $anchorNode->count() ? $anchorNode->attr('href') : null;

            $ratingNode = $node->filter('.resultbox_totalrate');
            $rating = $ratingNode->count() ? $ratingNode->text() : null;

            $voteNode = $node->filter('.resultbox_countrate');
            $votes = $voteNode->count() ? $voteNode->text() : null;

            $addressNode = $node->filter('.locatcity');
            $address = $addressNode->count() ? $addressNode->text() : null;

            $phoneNode = $node->filter('.callcontent');
            $phone = $phoneNode->count() ? $phoneNode->text() : null;

            $imageNode = $node->filter('.resultbox_image img');
            $image = null;
            $imageNode->each(function (Crawler $img) use (&$image) {
                $src = $img->attr('src');
                if ($src && strpos($src, 'http') === 0) {
                    $image = $src;
                    return false; // Stop iteration
                }
            });

            $amenities = $node->filter('.amenities_tabs')->each(function (Crawler $subNode) {
                return $subNode->text();
            });

            return [
                'title' => $title,
                'link' => $link,
                'rating' => $rating,
                'votes' => $votes,
                'address' => $address,
                'phone' => $phone,
                'image' => $image,
                'amenities' => $amenities,
            ];
        });

        $count = 0;
        DB::beginTransaction();
        try {
            foreach ($scrapedData as $data) {
                if (!$data['title']) continue;

                // Generate Unique Slug
                $slug = Str::slug($data['title']);
                $slugCount = Listing::where('slug', 'LIKE', "{$slug}%")->count();
                if ($slugCount > 0) {
                    $slug = $slug . '-' . ($slugCount + 1);
                }

                // Geocode Address
                $geoData = $this->geocodeAddress($data['address']);
                // Sleep to respect rate limits
                sleep(1);

                // Create Listing
                $listing = Listing::create([
                    'title' => $data['title'],
                    'slug' => $slug,
                    'category_id' => $categoryId,
                    'address' => $data['address'] ?? '',
                    'mobile' => $data['phone'] ?? '',
                    'website' => '',
                    'description' => 'Scraped from JustDial',
                    'is_featured' => 0,
                    'status' => 1,
                    // Geocoded fields
                    'latitude' => $geoData['latitude'],
                    'longitude' => $geoData['longitude'],
                    'state' => $geoData['state'],
                    'city' => $geoData['city'],
                    'zip_code' => $geoData['zip_code'],
                    'email' => 'scraped@example.com',
                    'about' => 'Scraped Listing',
                ]);

                // Save Image
                if ($data['image']) {
                    try {
                        $imageContent = file_get_contents($data['image']);
                        if ($imageContent) {
                            $imageName = Str::random(10) . '.jpg';
                            $path = 'listing_featured/' . $listing->id . '/' . $imageName;
                            Storage::disk('public')->put($path, $imageContent);

                            $listing->images()->create([
                                'image_path' => $path,
                                'image_type' => 'featured'
                            ]);
                        }
                    } catch (\Exception $e) {
                        // Ignore image download errors
                    }
                }

                // Save Amenities
                if (!empty($data['amenities'])) {
                    $amenityIds = [];
                    foreach ($data['amenities'] as $amenityName) {
                        $amenity = Amenity::firstOrCreate(['name' => trim($amenityName)]);
                        $amenityIds[] = $amenity->id;
                    }
                    $listing->amenities()->sync($amenityIds);
                }
                
                // Create default working hours
                $listing->workingHours()->create([
                    'day_of_week' => 'All',
                    'open_time' => json_encode(['09:00']),
                    'close_time' => json_encode(['18:00']),
                ]);
                
                // Create empty social link
                $listing->socialLink()->create([]);

                $count++;
            }
            DB::commit();
            return redirect()->back()->with('success', "Successfully scraped and added $count listings.");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to save listings: ' . $e->getMessage());
        }
    }
}

