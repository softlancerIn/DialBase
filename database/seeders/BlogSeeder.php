<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('status', 1)->first();

        $items = [
            [
                'name' => 'Welcome to Our Blog',
                'short_description' => 'Introducing our new blog section with updates and tips.',
                'description' => 'This is the beginning of our blog journey. Stay tuned for more updates.',
            ],
            [
                'name' => 'How To Get Listed',
                'short_description' => 'Step-by-step guide to list your business.',
                'description' => 'We walk you through creating a compelling listing that converts.',
            ],
            [
                'name' => 'Top 10 Local SEO Tips',
                'short_description' => 'Boost your local visibility with these practical tips.',
                'description' => 'Local SEO matters. Here are 10 tips you can apply today.',
            ],
        ];

        foreach ($items as $data) {
            $slug = Str::slug($data['name']);
            $base = $slug; $i = 1;
            while (Blog::where('slug', $slug)->exists()) { $slug = $base.'-'.$i++; }

            Blog::updateOrCreate(
                ['slug' => $slug],
                [
                    'name' => $data['name'],
                    'slug' => $slug,
                    'short_description' => $data['short_description'] ?? null,
                    'description' => $data['description'] ?? null,
                    'long_description' => $data['long_description'] ?? null,
                    'status' => 1,
                    'category_id' => $category?->id,
                ]
            );
        }
    }
}
