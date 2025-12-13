<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seo;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            [
                'url' => '/',
                'title' => 'DialBase - Home',
                'keywords' => 'dialbase, directory, listings',
                'description' => 'Welcome to DialBase, discover and list top local businesses.',
                'script' => '',
            ],
            [
                'url' => 'about',
                'title' => 'About Us - DialBase',
                'keywords' => 'about, dialbase',
                'description' => 'Learn more about DialBase and our mission.',
                'script' => '',
            ],
            [
                'url' => 'blogs',
                'title' => 'Blogs - DialBase',
                'keywords' => 'blogs, news, updates',
                'description' => 'Read the latest blogs and updates on DialBase.',
                'script' => '',
            ],
            [
                'url' => 'listing/sample-listing',
                'title' => 'Sample Listing - DialBase',
                'keywords' => 'listing, sample',
                'description' => 'Sample listing SEO data placeholder. Update via Admin when creating a listing.',
                'script' => '',
            ],
        ];

        foreach ($rows as $row) {
            Seo::updateOrCreate(['url' => $row['url']], $row);
        }
    }
}
