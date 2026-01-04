<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('review');
            $table->unsignedTinyInteger('rating');
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->unsignedTinyInteger('status')->default(0)->comment('0 = pending, 1 = approved, 2 = rejected');
            $table->timestamps();
            
            $table->unique(['listing_id', 'email'], 'listing_email_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listing_reviews');
    }
}