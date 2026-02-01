<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->foreignId('state_id')->nullable()->after('longitude')->constrained('states')->onDelete('set null');
            $table->foreignId('city_id')->nullable()->after('state_id')->constrained('cities')->onDelete('set null');
        });

        // Data migration: sync state_id and city_id from legacy string columns
        $listings = \App\Models\Listing::all();
        foreach ($listings as $listing) {
            if ($listing->state) {
                $state = \App\Models\State::where('name', $listing->state)->first();
                if ($state) {
                    $listing->state_id = $state->id;
                }
            }
            if ($listing->city) {
                $city = \App\Models\City::where('name', $listing->city)->first();
                if ($city) {
                    $listing->city_id = $city->id;
                }
            }
            $listing->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->dropForeign(['listings_state_id_foreign']);
            $table->dropForeign(['listings_city_id_foreign']);
            $table->dropColumn(['state_id', 'city_id']);
        });
    }
};
