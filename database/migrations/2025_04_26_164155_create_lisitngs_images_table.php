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
        Schema::create('lisitngs_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id');
            $table->enum('image_type', ['logo', 'featured', 'gallery']);
            $table->string('image_path');
            $table->timestamps();
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lisitngs_images');
    }
};
