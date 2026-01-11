<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Helpers\StateData;
use App\Models\State;
use App\Models\City;

class StatesCitiesSeeder extends Seeder
{
    public function run(): void
    {
        $states = StateData::get();

        foreach ($states as $s) {
            $state = State::firstOrCreate([
                'name' => $s['name']
            ], [
                'state_code' => $s['state_code'] ?? null
            ]);

            foreach ($s['cities'] ?? [] as $cityName) {
                City::firstOrCreate([
                    'state_id' => $state->id,
                    'name' => $cityName
                ]);
            }
        }
    }
}
