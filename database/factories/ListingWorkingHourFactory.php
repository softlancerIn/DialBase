<?php

namespace Database\Factories;

use App\Models\ListingWorkingHour;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<ListingWorkingHour> */
class ListingWorkingHourFactory extends Factory
{
    protected $model = ListingWorkingHour::class;

    public function definition(): array
    {
        return [
            'day_of_week' => $this->faker->randomElement(['Mon','Tue','Wed','Thu','Fri','Sat','Sun']),
            'open_time' => '09:00',
            'close_time' => '18:00',
            'is_247_open' => false,
        ];
    }
}
