<?php

namespace App\Http\Controllers\Admin;

use App\Models\Amenity;
use App\Models\Listing;

use App\Models\Category;
use Illuminate\Support\Str;
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
        $query = Listing::with(['menuItems', 'workingHours', 'socialLink', 'amenities']);

        if (request()->has('category_id') && request()->category_id != '') {
            $query->where('category_id', request()->category_id);
        }
        if (request()->has('country') && request()->country != '') {
            $query->where('country', 'like', '%' . request()->country . '%');
        }
        if (request()->has('state') && request()->state != '') {
            $query->where('state', 'like', '%' . request()->state . '%');
        }
        if (request()->has('city') && request()->city != '') {
            $query->where('city', 'like', '%' . request()->city . '%');
        }

        $listings = $query->paginate(25);

        return view('admin.listing.index', compact('listings'));
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'keywords' => 'nullable|string|max:255',
            'about' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'zip_code' => 'required|string|max:50',
            'mobile' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|max:2048',
            'featured_image' => 'nullable|image|max:4096',
            'featured' => 'nullable|image|max:4096',
            'gallery' => 'nullable|image|max:4096',
            'menu_items' => 'nullable|array',
            'menu_items.*.item_name' => 'nullable|string|max:255',
            'menu_items.*.category' => 'nullable|string|max:255',
            'menu_items.*.price' => 'nullable|string|max:100',
            'menu_items.*.about' => 'nullable|string',
            'menu_items.*.image' => 'nullable|image|max:4096',
            'working_hours.open_time' => 'required|array',
            'working_hours.close_time' => 'required|array',
            'is_247_open' => 'nullable|boolean',
            'amenities' => 'nullable|array',
            'amenities.*' => 'integer|exists:amenities,id',
            'new_amenities' => 'nullable|string',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);
        DB::beginTransaction();
        try {
            // Generate Unique Slug
            $slug = Str::slug($request->title);
            $count = Listing::where('slug', 'LIKE', "{$slug}%")->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }

            // Save Basic Listing Info
            $listing = Listing::create([
                'title' => $request->title ?? '',
                'slug' => $slug,
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
                'is_featured' => $request->has('is_featured') ? 1 : 0,
            ]);

            // Upload logo
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('listing_logos', 'public');
                $listing->images()->create([
                    'image_path' => $logoPath,
                    'image_type' => 'logo'
                ]);
            }

            // Upload featured image (accept both 'featured_image' and 'featured')
            if ($request->hasFile('featured_image')) {
                $featuredPath = $request->file('featured_image')->store('listing_featured', 'public');
                $listing->images()->create([
                    'image_path' => $featuredPath,
                    'image_type' => 'featured'
                ]);
            } elseif ($request->hasFile('featured')) {
                $featuredPath = $request->file('featured')->store('listing_featured', 'public');
                $listing->images()->create([
                    'image_path' => $featuredPath,
                    'image_type' => 'featured'
                ]);
            }

            // Upload gallery image
            if ($request->hasFile('gallery')) {
                $galleryPath = $request->file('gallery')->store('listing_gallery/'.$listing->id, 'public');
                $listing->images()->create([
                    'image_path' => $galleryPath,
                    'image_type' => 'gallery'
                ]);
            }

            // Save Menu Items
            if ($request->menu_items) {
                foreach ($request->menu_items as $menuItem) {
                    if (!empty($menuItem['item_name'])) {
                        $listing->menuItems()->create([
                            'item_name' => $menuItem['item_name'],
                            'category' => $menuItem['category'] ?? null,
                            'price' => $menuItem['price'] ?? null,
                            'about' => $menuItem['about'] ?? null,
                            'image' => isset($menuItem['image']) ? $menuItem['image']->store('menu_items', 'public') : null,
                        ]);
                    }
                }
            }

            // Save Working Hours
            $listing->workingHours()->create([
                'day_of_week' => 'All',
                'open_time' => json_encode($request->working_hours['open_time']),
                'close_time' => json_encode($request->working_hours['close_time']),
            ]);

            $listing->update(['is_247_open' => $request->is_247_open]);

            $amenityIds = $request->amenities ? (array) $request->amenities : [];
            if ($request->filled('new_amenities')) {
                $names = array_filter(array_map(fn($n) => trim($n), explode(',', $request->input('new_amenities'))));
                foreach ($names as $name) {
                    if ($name !== '') {
                        $amenity = Amenity::firstOrCreate(['name' => $name]);
                        $amenityIds[] = $amenity->id;
                    }
                }
            }
            // Map static checkboxes am1..am25 from create page to amenity names
            $staticAmenities = [
                'Health Score 8.7 / 10',
                'Reservations',
                'Vegetarian Options',
                'Moderate Noise',
                'Good For Kids',
                'Private Lot Parking',
                'Beer & Wine',
                'TV Services',
                'Pets Allow',
                'Offers Delivery',
                'Staff wears masks',
                'Accepts Credit Cards',
                'Offers Catering',
                'Good for Breakfast',
                'Waiter Service',
                'Drive-Thru',
                'Outdoor Seating',
                'Offers Takeout',
                'Vegan Options',
                'Casual',
                'Good for Groups',
                'Brunch, Lunch, Dinner',
                'Free Wi-Fi',
                'Wheelchair Accessible',
                'Happy Hour',
            ];
            foreach ($staticAmenities as $i => $label) {
                $key = 'am' . ($i + 1);
                if ($request->boolean($key)) {
                    $amenity = Amenity::firstOrCreate(['name' => $label]);
                    $amenityIds[] = $amenity->id;
                }
            }

            if (!empty($amenityIds)) {
                $listing->amenities()->sync($amenityIds);
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
            DB::rollBack();
            // Return back with message and old input instead of raw dump/status code
            return redirect()->back()->with(['message' => 'Failed to create listing', 'error' => $e->getMessage()])->withInput();
        }
    }

    public function show($id)
    {
        $listing = Listing::with(['images', 'menuItems', 'workingHours', 'amenities', 'socialLink'])->findOrFail($id);

        return to_route('listing.slug', $listing->slug)->send();
    }

    public function create()
    {
        $data['category'] = Category::where('status', 1)->get();
        $data['all_amenities'] = Amenity::all();
        $data['states'] = Listing::whereNotNull('state')->distinct()->pluck('state')->sort()->values();
        $data['cities'] = Listing::whereNotNull('city')->distinct()->pluck('city')->sort()->values();

        return view('admin.listing.create', compact('data'));
    }

    public function edit($id)
    {
        $data = [];
        $data['listing'] = Listing::with([
            'images',
            'menuItems',
            'workingHours',
            'amenities',
            'socialLink'
        ])->findOrFail($id);
        $data['categories'] = Category::where('status', 1)->get();
        $data['all_amenities'] = Amenity::all();
        $data['states'] = Listing::whereNotNull('state')->distinct()->pluck('state')->sort()->values();
        $data['cities'] = Listing::whereNotNull('city')->distinct()->pluck('city')->sort()->values();
        
        return view('admin.listing.edit', compact('data'));
    }    

    public function update(Request $request, $id)
    {
        // Validate incoming request for update
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'keywords' => 'nullable|string|max:255',
            'about' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'zip_code' => 'required|string|max:50',
            'mobile' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|max:2048',
            'featured' => 'nullable|image|max:4096',
            'gallery' => 'nullable|image|max:4096',
            'menu_items' => 'nullable|array',
            'menu_items.*.item_name' => 'nullable|string|max:255',
            'menu_items.*.category' => 'nullable|string|max:255',
            'menu_items.*.price' => 'nullable|string|max:100',
            'menu_items.*.about' => 'nullable|string',
            'menu_items.*.image' => 'nullable|image|max:4096',
            'working_hours.open_time' => 'required|array',
            'working_hours.close_time' => 'required|array',
            'is_open_24' => 'nullable|boolean',
            'amenities' => 'nullable|array',
            'amenities.*' => 'integer|exists:amenities,id',
            'new_amenities' => 'nullable|string',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);
        DB::beginTransaction();
    
        try {
            $listing = Listing::findOrFail($id);

            // Update Basic Info
            // Update Basic Info
            $slug = Str::slug($request->title);
            if ($listing->slug !== $slug) {
                $count = Listing::where('slug', 'LIKE', "{$slug}%")->where('id', '!=', $id)->count();
                if ($count > 0) {
                    $slug = $slug . '-' . ($count + 1);
                }
            }

            $listing->update([
                'title' => $request->title ?? '',
                'slug' => $slug,
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
                'is_featured' => $request->is_featured ? 1 : 0,
            ]);

            // Upload logo
            if ($request->hasFile('logo')) {
                $listing->images()->where('image_type', 'logo')->delete();

                $logoPath = $request->file('logo')->store("listing_logos/".$listing->id, 'public');
                $listing->images()->create([
                    'image_path' => $logoPath,
                    'image_type' => 'logo'
                ]);
            }
    
            // Upload featured image (accept both 'featured' and 'featured_image')
            if ($request->hasFile('featured')) {
                $listing->images()->where('image_type', 'featured')->delete();

                $featuredPath = $request->file('featured')->store("listing_featured/".$listing->id, 'public');
                $listing->images()->create([
                    'image_path' => $featuredPath,
                    'image_type' => 'featured'
                ]);
            } elseif ($request->hasFile('featured_image')) {
                $listing->images()->where('image_type', 'featured')->delete();

                $featuredPath = $request->file('featured_image')->store("listing_featured/".$listing->id, 'public');
                $listing->images()->create([
                    'image_path' => $featuredPath,
                    'image_type' => 'featured'
                ]);
            }

            // Update gallery
            if ($request->hasFile('gallery')) {
                $listing->images()->where('image_type', 'gallery')->delete();
    
                $galleryPath = $request->file('gallery')->store('listing_gallery/'.$listing->id, 'public');
                $listing->images()->create([
                    'image_path' => $galleryPath,
                    'image_type' => 'gallery'
                ]);
            }

            // Update Menu Items
            if ($request->menu_items) {
                $listing->menuItems()->delete();
    
                foreach ($request->menu_items as $menuItem) {
                    if (!empty($menuItem['item_name'])) {
                        $listing->menuItems()->create([
                            'item_name' => $menuItem['item_name'],
                            'category' => $menuItem['category'] ?? null,
                            'price' => $menuItem['price'] ?? null,
                            'about' => $menuItem['about'] ?? null,
                            'image' => isset($menuItem['image']) ? $menuItem['image']->store('menu_items', 'public') : null,
                        ]);
                    }
                }
            }
    
            // Update Working Hours
            $listing->workingHours()->delete();
            $listing->workingHours()->create([
                'day_of_week' => 'All',
                'open_time' => json_encode($request->working_hours['open_time']),
                'close_time' => json_encode($request->working_hours['close_time']),
            ]);
    
            $listing->update(['is_247_open' => $request->is_247_open]);
    
            $amenityIds = $request->amenities ? (array) $request->amenities : [];
            if ($request->filled('new_amenities')) {
                $names = array_filter(array_map(fn($n) => trim($n), explode(',', $request->input('new_amenities'))));
                foreach ($names as $name) {
                    if ($name !== '') {
                        $amenity = Amenity::firstOrCreate(['name' => $name]);
                        $amenityIds[] = $amenity->id;
                    }
                }
            }
            if (!empty($amenityIds)) {
                $listing->amenities()->sync($amenityIds);
            }
    
            // Update or Create Social Links
            if ($listing->socialLink) {
                $listing->socialLink()->update([
                    'facebook' => $request->facebook ?? '',
                    'twitter' => $request->twitter ?? '',
                    'instagram' => $request->instagram ?? '',
                    'linkedin' => $request->linkedin ?? '',
                ]);
            } else {
                $listing->socialLink()->create([
                    'facebook' => $request->facebook ?? '',
                    'twitter' => $request->twitter ?? '',
                    'instagram' => $request->instagram ?? '',
                    'linkedin' => $request->linkedin ?? '',
                ]);
            }
    
            DB::commit();
    
            return redirect()->back()->with('success', 'Listing updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            // Log error and return friendly response (avoid dd in production)
            return redirect()->back()->with(['message' => 'Failed to update listing', 'error' => $e->getMessage()])->withInput();
        }
    }    

    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);

        // $listing->logoImage()->delete();
        // $listing->featuredImage()->delete();
        // $listing->galleryImages()->delete();
        $listing->menuItems()->delete();
        $listing->workingHours()->delete();
        $listing->socialLink()->delete();
        $listing->amenities()->detach();

        $listing->delete();

        return redirect()->back()->with('success', 'Listing deleted successfully!');
    }
}
