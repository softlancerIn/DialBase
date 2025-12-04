<?php

namespace Database\Factories;

use App\Models\ListingReview;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<ListingReview> */
class ListingReviewFactory extends Factory
{
    protected $model = ListingReview::class;

    public function definition(): array
    {
        return [
            'user_id' => null,
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'rating' => $this->faker->numberBetween(1, 5),
            'review' => $this->faker->paragraph(3),
            'status' => 1,
        ];
    }
}
