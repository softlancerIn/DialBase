<?php

namespace Database\Seeders;

use App\Models\Amenity;
use App\Models\Category;
use App\Models\Listing;
use App\Models\ListingImage;
use App\Models\ListingReview;
use App\Models\ListingWorkingHour;
use App\Models\MenuItem;
use App\Models\SocialLink;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListingSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure some amenities exist
        if (Amenity::count() < 10) {
            Amenity::factory()->count(15)->create();
        }

        $amenityIds = Amenity::pluck('id')->all();
        $categoryIds = Category::pluck('id')->all();

        // Create 50 listings
        Listing::factory()->count(50)->create()->each(function (Listing $listing, $index) use ($amenityIds, $categoryIds) {
            // Mark first 10 listings as featured
            if ($index < 10) {
                $listing->status = true;
                $listing->is_featured = true;
                $listing->save();
            }
            // Optionally assign a category if available
            if (!empty($categoryIds)) {
                $listing->category_id = fake()->randomElement($categoryIds);
                $listing->save();
            }

            // Images: 1 logo, 1 featured, 3-6 gallery
            // ListingImage::factory()->for($listing, 'listing')->state([
            //     'image_type' => 'logo',
            // ])->create();

            // ListingImage::factory()->for($listing, 'listing')->state([
            //     'image_type' => 'featured',
            // ])->create();

            // ListingImage::factory()->count(fake()->numberBetween(3, 6))
            //     ->for($listing, 'listing')->state([
            //         'image_type' => 'gallery',
            //     ])->create();

            // Social links
            SocialLink::factory()->for($listing, 'listing')->create();

            // Working hours: either 24/7 or normal 7 days
            if (fake()->boolean(20)) {
                ListingWorkingHour::factory()->for($listing, 'listing')->state([
                    'day_of_week' => 'All',
                    'open_time' => null,
                    'close_time' => null,
                    'is_247_open' => true,
                ])->create();
            } else {
                $days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
                foreach ($days as $d) {
                    ListingWorkingHour::factory()->for($listing, 'listing')->state([
                        'day_of_week' => $d,
                        'open_time' => '09:00',
                        'close_time' => '18:00',
                        'is_247_open' => false,
                    ])->create();
                }
            }

            // Menu items: 3-10
            MenuItem::factory()->count(fake()->numberBetween(3, 10))
                ->for($listing, 'listing')->create();

            // Reviews: 1-5
            ListingReview::factory()->count(fake()->numberBetween(1, 5))
                ->for($listing, 'listing')->create();

            // Attach amenities: 3-8 random
            if (!empty($amenityIds)) {
                $attach = collect($amenityIds)->shuffle()->take(fake()->numberBetween(3, 8))->all();
                $listing->amenities()->syncWithoutDetaching($attach);
            }
        });
    }
}
