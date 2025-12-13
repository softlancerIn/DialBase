<?php

namespace Database\Seeders;

use App\Models\Enquiry;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class EnquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure we have some listings to attach enquiries to
        $listingIds = Listing::query()->pluck('id')->all();
        if (empty($listingIds)) {
            // If no listings exist, create a few so foreign keys are valid
            $listingIds = Listing::factory()->count(10)->create()->pluck('id')->all();
        }

        // Create 100 enquiries and assign a random listing id
        Enquiry::factory()
            ->count(100)
            ->make()
            ->each(function (Enquiry $enquiry) use ($listingIds) {
                $enquiry->listing_id = $listingIds[array_rand($listingIds)];
                $enquiry->save();
            });
    }
}
