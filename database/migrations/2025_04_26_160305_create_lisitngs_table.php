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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug', '255')->unique()->index();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->boolean('status')->default(0)->comment(comment: 'Indicates listing status: 0 = Inactive, 1 = Active');
            $table->text('keywords')->nullable();
            $table->longText('about')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->boolean('is_featured')->default(0)->comment('Indicates if the listing is featured');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_247_open')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lisitngs');
    }
};
