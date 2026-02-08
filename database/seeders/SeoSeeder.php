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
                'url' => 'https://www.aboutfirms.com',
                'title' => 'Aboutfirms - Home',
                'keywords' => 'Aboutfirms, directory, listings',
                'description' => 'Welcome to Aboutfirms, discover and list top local businesses.',
                'script' => '',
            ],
            [
                'url' => 'https://www.aboutfirms.com/about',
                'title' => 'About Us - Aboutfirms',
                'keywords' => 'about, Aboutfirms',
                'description' => 'Learn more about Aboutfirms and our mission.',
                'script' => '',
            ],
            [
                'url' => 'https://www.aboutfirms.com/blogs',
                'title' => 'Blogs - Aboutfirms',
                'keywords' => 'blogs, news, updates',
                'description' => 'Read the latest blogs and updates on Aboutfirms.',
                'script' => '',
            ],
            [
                'url' => 'https://www.aboutfirms.com/listing/sample-listing',
                'title' => 'Sample Listing - Aboutfirms',
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
