<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateListingWorkingHoursTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create the new listing_working_hours table
        Schema::create('listing_working_hours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id')->index();
            $table->string('day_of_week');
            $table->text('open_time')->nullable();
            $table->text('close_time')->nullable();
            $table->boolean('is_247_open')->default(false);
            $table->timestamps();

            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');
        });

        // If the old working_hours table exists, migrate its data into the new table
        if (Schema::hasTable('working_hours')) {
            $rows = DB::table('working_hours')->get();
            foreach ($rows as $row) {
                DB::table('listing_working_hours')->insert([
                    'listing_id' => $row->listing_id,
                    'day_of_week' => $row->day_of_week ?? ($row->day ?? 'All'),
                    'open_time' => is_null($row->open_time) ? null : (string) $row->open_time,
                    'close_time' => is_null($row->close_time) ? null : (string) $row->close_time,
                    'is_247_open' => property_exists($row, 'is_247_open') ? $row->is_247_open : false,
                    'created_at' => $row->created_at ?? now(),
                    'updated_at' => $row->updated_at ?? now(),
                ]);
            }

            // Drop the old table after migrating
            Schema::dropIfExists('working_hours');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Recreate old working_hours table if needed and move data back
        if (Schema::hasTable('listing_working_hours')) {
            Schema::create('working_hours', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('listing_id');
                $table->string('day_of_week');
                $table->time('open_time')->nullable();
                $table->time('close_time')->nullable();
                $table->timestamps();
                $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');
            });

            $rows = DB::table('listing_working_hours')->get();
            foreach ($rows as $row) {
                DB::table('working_hours')->insert([
                    'listing_id' => $row->listing_id,
                    'day_of_week' => $row->day_of_week,
                    'open_time' => $row->open_time,
                    'close_time' => $row->close_time,
                    'created_at' => $row->created_at,
                    'updated_at' => $row->updated_at,
                ]);
            }

            Schema::dropIfExists('listing_working_hours');
        }
    }
}
