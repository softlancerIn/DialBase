<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/** @extends Factory<Listing> */
class ListingFactory extends Factory
{
    protected $model = Listing::class;

    public function definition(): array
    {
        $title = $this->faker->unique()->company();
        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . Str::random(5),
            'category_id' => null,
            'keywords' => implode(', ', $this->faker->words(6)),
            'about' => $this->faker->paragraphs(3, true),
            'latitude' => (string) $this->faker->latitude(),
            'longitude' => (string) $this->faker->longitude(),
            'state' => $this->faker->state(),
            'city' => $this->faker->city(),
            'address' => $this->faker->address(),
            'zip_code' => $this->faker->postcode(),
            'mobile' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'website' => $this->faker->url(),
            'is_247_open' => false,
        ];
    }
}
