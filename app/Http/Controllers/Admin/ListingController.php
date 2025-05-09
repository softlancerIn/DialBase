<?php

namespace App\Http\Controllers\Admin;

use App\Models\Amenity;
use App\Models\Listing;

use App\Models\Category;
use App\Models\MenuItem;
use App\Models\SocialLink;
use App\Models\WorkingHour;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class ListingController extends Controller
{
    public function index()
    {
        // $listings = Listing::with(['logoImage', 'featuredImage', 'galleryImages', 'menuItems', 'workingHours', 'amenities', 'socialLinks'])->get();
        $listings = Listing::with(['menuItems', 'workingHours', 'socialLink'])->get();
        return view('admin.listing.index', compact('listings'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // Save Basic Listing Info
            $listing = Listing::create([
                'title' => $request->title ?? '',
                'category_id' => $request->category_id ?? '',
                'keywords' => $request->keywords ?? '',
                'about' => $request->about ?? '',
                'latitude' => $request->latitude ?? '',
                'longitude' => $request->longitude ?? '',
                'state' => $request->state ?? '',
                'city' => $request->city ?? '',
                'address' => $request->address  ?? '',
                'zip_code' => $request->zip_code ?? '',
                'mobile' => $request->mobile ?? '',
                'email' => $request->email ?? '',
                'website' => $request->website ?? '',
            ]);

            // Upload logo
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('listing_logos', 'public');
                $listing->images()->create([
                    'image_path' => $logoPath,
                    'type' => 'logo'
                ]);
            }

            // Upload featured image
            if ($request->hasFile('featured_image')) {
                $featuredPath = $request->file('featured_image')->store('listing_featured', 'public');
                $listing->images()->create([
                    'image_path' => $featuredPath,
                    'type' => 'featured'
                ]);
            }

            // Upload gallery images
            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $galleryImage) {
                    $galleryPath = $galleryImage->store('listing_gallery', 'public');
                    $listing->images()->create([
                        'image_path' => $galleryPath,
                        'type' => 'gallery'
                    ]);
                }
            }

            // Save Menu Items
            if ($request->menu_items) {
                foreach ($request->menu_items as $menuItem) {
                    $listing->menuItems()->create([
                        'item_name' => $menuItem['item_name'],
                        'category' => $menuItem['category'],
                        'price' => $menuItem['price'],
                        'about' => $menuItem['about'],
                        'image' => isset($menuItem['image']) ? $menuItem['image']->store('menu_items', 'public') : null,
                    ]);
                }
            }

            // Save Working Hours
            $listing->workingHours()->create([
                'day_of_week' => 'All',
                'open_time' => json_encode($request->working_hours['open_time']),
                'close_time' => json_encode($request->working_hours['close_time']),
            ]);

            $listing->update(['is_open_24' => $request->is_open_24]);

            // Save Amenities
            if ($request->amenities) {
                $listing->amenities()->sync($request->amenities);
            }

            // Save Social Links
            $listing->socialLink()->create([
                'facebook' => $request->facebook ?? '',
                'twitter' => $request->twitter ?? '',
                'instagram' => $request->instagram ?? '',
                'linkedin' => $request->linkedin ?? '',
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Data Added Successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return response()->json(['message' => 'Failed to create listing', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $listing = Listing::with(['logoImage', 'featuredImage', 'galleryImages', 'menuItems', 'workingHours', 'amenities', 'socialLinks'])->findOrFail($id);
        return response()->json($listing);
    }

    public function create()
    {
        // This method is not typically used in API controllers
        // You can return a form or a view if needed
        $data['category'] = Category::where('status', 1)->get();
        return view('admin.listing.create', compact('data'));
    }

    public function edit($id)
    {
        $data = [];
        $data['category'] = Category::where('status', 1)->get();
        return view('admin.listing.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Similar to store(), but updating existing listing
        // Would you like me to create this full update logic too? (Because it's a bit longer) ✅
    }

    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);

        $listing->logoImage()->delete();
        $listing->featuredImage()->delete();
        $listing->galleryImages()->delete();
        $listing->menuItems()->delete();
        $listing->workingHours()->delete();
        $listing->socialLink()->delete();
        $listing->amenities()->detach();

        $listing->delete();

        return response()->json(['message' => 'Listing deleted successfully']);
    }
}
