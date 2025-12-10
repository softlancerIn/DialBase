<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            if (!Schema::hasColumn('blogs', 'short_description')) {
                $table->string('short_description', 255)->nullable()->after('image');
            }
            if (!Schema::hasColumn('blogs', 'category_id')) {
                $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete()->after('short_description');
            }
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            if (Schema::hasColumn('blogs', 'category_id')) {
                $table->dropConstrainedForeignId('category_id');
            }
            if (Schema::hasColumn('blogs', 'short_description')) {
                $table->dropColumn('short_description');
            }
        });
    }
};
