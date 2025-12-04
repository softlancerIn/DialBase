<?php

namespace Database\Factories;

use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<MenuItem> */
class MenuItemFactory extends Factory
{
    protected $model = MenuItem::class;

    public function definition(): array
    {
        return [
            'item_name' => ucfirst($this->faker->words(3, true)),
            'category' => $this->faker->randomElement(['Food', 'Beverage', 'Service', 'Product']),
            'price' => $this->faker->randomFloat(2, 5, 200),
            'about_item' => $this->faker->sentence(12),
            'item_image' => $this->faker->imageUrl(600, 400, 'food', true),
        ];
    }
}
