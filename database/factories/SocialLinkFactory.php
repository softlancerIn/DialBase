<?php

namespace Database\Factories;

use App\Models\SocialLink;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<SocialLink> */
class SocialLinkFactory extends Factory
{
    protected $model = SocialLink::class;

    public function definition(): array
    {
        return [
            'facebook' => 'https://facebook.com/' . $this->faker->userName(),
            'twitter' => 'https://twitter.com/' . $this->faker->userName(),
            'instagram' => 'https://instagram.com/' . $this->faker->userName(),
            'linkedin' => 'https://linkedin.com/in/' . $this->faker->userName(),
        ];
    }
}
