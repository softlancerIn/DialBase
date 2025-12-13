<?php

namespace Database\Factories;

use App\Models\Enquiry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Enquiry>
 */
class EnquiryFactory extends Factory
{
    protected $model = Enquiry::class;

    public function definition(): array
    {
        return [
            // 'listing_id' will be set in the seeder to an existing listing
            'name' => $this->faker->name(),
            'phone' => $this->faker->e164PhoneNumber(),
            'email' => $this->faker->safeEmail(),
            'subject' => $this->faker->sentence(6, true),
            'message' => $this->faker->paragraphs(2, true),
            'created_at' => now()->subDays(rand(0, 60))->subMinutes(rand(0, 1440)),
            'updated_at' => now(),
        ];
    }
}
