<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'cat_id' => '0',
                'name' => 'Hotel & Spa',
                'image' => null,
                'icon' => null,
                'description' => 'Hotel & Spa',
                'status' => 0,
                'created_at' => '2025-05-01 12:54:20',
                'updated_at' => '2025-05-01 12:54:20',
            ],
            [
                'id' => 2,
                'cat_id' => '0',
                'name' => 'Dentists',
                'image' => 'dentists.png',
                'icon' => '<i class="fas fa-stethoscope"></i>',
                'description' => '607 Listings in 07 Cities',
                'status' => 1,
                'created_at' => '2025-05-01 12:54:20',
                'updated_at' => '2025-05-01 12:54:20',
            ],
            [
                'id' => 3,
                'cat_id' => '0',
                'name' => 'IT & Banking',
                'image' => 'it_banking.png',
                'icon' => '<i class="fas fa-building"></i>',
                'description' => '76 Listings in 17 Cities',
                'status' => 1,
                'created_at' => '2025-05-01 12:54:20',
                'updated_at' => '2025-05-01 12:54:20',
            ],
            [
                'id' => 4,
                'cat_id' => '0',
                'name' => 'Shoppings',
                'image' => 'shoppings.png',
                'icon' => '<i class="fas fa-shopping-basket"></i>',
                'description' => '112 Listings in 19 Cities',
                'status' => 1,
                'created_at' => '2025-05-01 12:54:20',
                'updated_at' => '2025-05-01 12:54:20',
            ],
            [
                'id' => 5,
                'cat_id' => '0',
                'name' => 'Home Services',
                'image' => 'home_services.png',
                'icon' => '<i class="fas fa-screwdriver"></i>',
                'description' => '322 Listings in 32 Cities',
                'status' => 1,
                'created_at' => '2025-05-01 12:54:20',
                'updated_at' => '2025-05-01 12:54:20',
            ],
            [
                'id' => 6,
                'cat_id' => '0',
                'name' => 'Active Life',
                'image' => 'active_life.png',
                'icon' => '<i class="fas fa-basketball-ball"></i>',
                'description' => '161 Listings in 27 Cities',
                'status' => 1,
                'created_at' => '2025-05-01 12:54:20',
                'updated_at' => '2025-05-01 12:54:20',
            ],
            [
                'id' => 7,
                'cat_id' => '0',
                'name' => 'Restaurants',
                'image' => 'restaurants.png',
                'icon' => '<i class="fas fa-utensils"></i>',
                'description' => '172 Listings in 26 Cities',
                'status' => 1,
                'created_at' => '2025-05-01 12:54:20',
                'updated_at' => '2025-05-01 12:54:20',
            ],
            [
                'id' => 8,
                'cat_id' => '0',
                'name' => 'Education',
                'image' => 'education.png',
                'icon' => '<i class="fas fa-book-open"></i>',
                'description' => '144 Listings in 10 Cities',
                'status' => 1,
                'created_at' => '2025-05-01 12:54:20',
                'updated_at' => '2025-05-01 12:54:20',
            ],
            [
                'id' => 9,
                'cat_id' => '0',
                'name' => 'Real Estate',
                'image' => 'real_estate.png',
                'icon' => '<i class="fas fa-house-damage"></i>',
                'description' => '210 Listings in 24 Cities',
                'status' => 1,
                'created_at' => '2025-05-01 12:54:20',
                'updated_at' => '2025-05-01 12:54:20',
            ],
            [
                'id' => 10,
                'cat_id' => '0',
                'name' => 'Event Palnning',
                'image' => 'event_planning.png',
                'icon' => '<i class="fas fa-wine-glass"></i>',
                'description' => '241 Listings in 18 Cities',
                'status' => 1,
                'created_at' => '2025-05-01 12:54:20',
                'updated_at' => '2025-05-01 12:54:20',
            ],
            [
                'id' => 11,
                'cat_id' => '0',
                'name' => 'Automotive',
                'image' => 'automotive.png',
                'icon' => '<i class="fas fa-car-alt"></i>',
                'description' => '52 Listings in 06 Cities',
                'status' => 1,
                'created_at' => '2025-05-01 12:54:20',
                'updated_at' => '2025-05-01 12:54:20',
            ],
            [
                'id' => 12,
                'cat_id' => '0',
                'name' => 'Art & Design',
                'image' => 'art_design.png',
                'icon' => '<i class="fas fa-pencil-ruler"></i>',
                'description' => '97 Listings in 08 Cities',
                'status' => 1,
                'created_at' => '2025-05-01 12:54:20',
                'updated_at' => '2025-05-01 12:54:20',
            ],
            [
                'id' => 13,
                'cat_id' => '0',
                'name' => 'Hotel & Travel',
                'image' => 'hotel_travel.png',
                'icon' => '<i class="fas fa-plane"></i>',
                'description' => '42 Listings in 05 Cities',
                'status' => 1,
                'created_at' => '2025-05-01 12:54:20',
                'updated_at' => '2025-05-01 12:54:20',
            ],
        ]);
    }
}
