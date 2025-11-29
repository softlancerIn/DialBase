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
        $listings = Listing::with(['menuItems', 'workingHours', 'socialLink', 'amenities'])->get();

        return view('admin.listing.index', compact('listings'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // Save Basic Listing Info
            $listing = Listing::create([
                'title' => $request->title ?? '',
                'slug' => Str::slug($request->title),
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
                    'image_type' => 'logo'
                ]);
            }

            // Upload featured image
            if ($request->hasFile('featured_image')) {
                $featuredPath = $request->file('featured_image')->store('listing_featured', 'public');
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
        $listing = Listing::with(['images', 'menuItems', 'workingHours', 'amenities', 'socialLink'])->findOrFail($id);

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
        $data['listing'] = Listing::with([
            'images',
            'menuItems',
            'workingHours',
            'amenities',
            'socialLink'
        ])->findOrFail($id);
    
        $data['categories'] = Category::where('status', 1)->get();
        $data['all_amenities'] = Amenity::all(); 
        return view('admin.listing.edit', compact('data'));
    }    

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
    
        try {
            $listing = Listing::findOrFail($id);

            // Update Basic Info
            $listing->update([
                'title' => $request->title ?? '',
                'slug' => Str::slug($request->title),
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
                $listing->images()->where('image_type', 'logo')->delete();

                $logoPath = $request->file('logo')->store("listing_logos/".$listing->id, 'public');
                $listing->images()->create([
                    'image_path' => $logoPath,
                    'image_type' => 'logo'
                ]);
            }
    
            // Upload featured image
            if ($request->hasFile('featured')) {
                $listing->images()->where('image_type', 'featured')->delete();

                $featuredPath = $request->file('featured')->store("listing_featured/".$listing->id, 'public');
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
                    $listing->menuItems()->create([
                        'item_name' => $menuItem['item_name'],
                        'category' => $menuItem['category'],
                        'price' => $menuItem['price'],
                        'about' => $menuItem['about'],
                        'image' => isset($menuItem['image']) ? $menuItem['image']->store('menu_items', 'public') : null,
                    ]);
                }
            }
    
            // Update Working Hours
            $listing->workingHours()->delete();
            $listing->workingHours()->create([
                'day_of_week' => 'All',
                'open_time' => json_encode($request->working_hours['open_time']),
                'close_time' => json_encode($request->working_hours['close_time']),
            ]);
    
            $listing->update(['is_open_24' => $request->is_open_24]);
    
            // Sync Amenities
            if ($request->amenities) {
                $listing->amenities()->sync($request->amenities);
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
            dd($e->getMessage());
            return response()->json(['message' => 'Failed to update listing', 'error' => $e->getMessage()], 500);
        }
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
