<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateListingReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listing_reviews', function (Blueprint $table) {
            // make user_id nullable
            if (Schema::hasColumn('listing_reviews', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->change();
            }

            // add name and email fields
            if (! Schema::hasColumn('listing_reviews', 'email')) {
                $table->string('email')->after('user_id');
            }

            if (! Schema::hasColumn('listing_reviews', 'name')) {
                $table->string('name')->nullable()->after('email');
            }

            // add status: 0 = pending, 1 = approved, 2 = rejected
            if (! Schema::hasColumn('listing_reviews', 'status')) {
                $table->unsignedTinyInteger('status')->default(0)->after('rating');
            }

            // unique constraint per listing + email to prevent duplicate reviews by same email
            if (! Schema::hasColumn('listing_reviews', 'listing_email_unique')) {
                $table->unique(['listing_id', 'email'], 'listing_email_unique');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listing_reviews', function (Blueprint $table) {
            if (Schema::hasColumn('listing_reviews', 'listing_email_unique')) {
                $table->dropUnique('listing_email_unique');
            }

            if (Schema::hasColumn('listing_reviews', 'status')) {
                $table->dropColumn('status');
            }

            if (Schema::hasColumn('listing_reviews', 'name')) {
                $table->dropColumn('name');
            }

            if (Schema::hasColumn('listing_reviews', 'email')) {
                $table->dropColumn('email');
            }

            // Revert user_id to not nullable if needed (keep as-is otherwise)
        });
    }
}
