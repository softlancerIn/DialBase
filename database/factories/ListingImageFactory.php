<?php

namespace Database\Factories;

use App\Models\ListingImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<ListingImage> */
class ListingImageFactory extends Factory
{
    protected $model = ListingImage::class;

    public function definition(): array
    {
        return [
            'image_type' => $this->faker->randomElement(['logo', 'featured', 'gallery']),
            'image_path' => $this->faker->imageUrl(800, 600, 'business', true),
        ];
    }
}
