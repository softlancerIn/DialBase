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
                'description' => '<h2>How to Calculate Average Ratings Out of 5</h2>

                <p>
                Customer reviews play a crucial role in building trust and helping users make informed decisions.
                Understanding how to calculate the average rating correctly ensures transparency and accuracy.
                </p>

                <p>
                When you have multiple reviews, each rated out of <strong>5 stars</strong>, the average rating is
                calculated by adding all individual ratings together and dividing the total by the number of reviews.
                </p>

                <h3>Example Calculation</h3>

                <p>
                If you have <strong>10 reviews</strong> with a combined total rating score of <strong>37</strong>,
                the average rating is calculated as follows:
                </p>

                <ul>
                <li>Total ratings: 37</li>
                <li>Number of reviews: 10</li>
                <li>Average rating: <strong>3.7 out of 5</strong></li>
                </ul>

                <p>
                Displaying accurate average ratings helps improve credibility, enhances user experience,
                and allows customers to quickly evaluate the quality of a product or service.
                </p>

                <p>
                Whether you are running an e-commerce store, a review platform, or a service-based website,
                properly calculated ratings can significantly impact customer trust and engagement.
                </p>
',
            ],
            [
                'name' => 'How To Get Listed',
                'description' => '<h2>How to Calculate Average Ratings Out of 5</h2>

                <p>
                Customer reviews play a crucial role in building trust and helping users make informed decisions.
                Understanding how to calculate the average rating correctly ensures transparency and accuracy.
                </p>

                <p>
                When you have multiple reviews, each rated out of <strong>5 stars</strong>, the average rating is
                calculated by adding all individual ratings together and dividing the total by the number of reviews.
                </p>

                <h3>Example Calculation</h3>

                <p>
                If you have <strong>10 reviews</strong> with a combined total rating score of <strong>37</strong>,
                the average rating is calculated as follows:
                </p>

                <ul>
                <li>Total ratings: 37</li>
                <li>Number of reviews: 10</li>
                <li>Average rating: <strong>3.7 out of 5</strong></li>
                </ul>

                <p>
                Displaying accurate average ratings helps improve credibility, enhances user experience,
                and allows customers to quickly evaluate the quality of a product or service.
                </p>

                <p>
                Whether you are running an e-commerce store, a review platform, or a service-based website,
                properly calculated ratings can significantly impact customer trust and engagement.
                </p>
',
            ],
            [
                'name' => 'Top 10 Local SEO Tips',
                'description' => '<h2>How to Calculate Average Ratings Out of 5</h2>

                <p>
                Customer reviews play a crucial role in building trust and helping users make informed decisions.
                Understanding how to calculate the average rating correctly ensures transparency and accuracy.
                </p>

                <p>
                When you have multiple reviews, each rated out of <strong>5 stars</strong>, the average rating is
                calculated by adding all individual ratings together and dividing the total by the number of reviews.
                </p>

                <h3>Example Calculation</h3>

                <p>
                If you have <strong>10 reviews</strong> with a combined total rating score of <strong>37</strong>,
                the average rating is calculated as follows:
                </p>

                <ul>
                <li>Total ratings: 37</li>
                <li>Number of reviews: 10</li>
                <li>Average rating: <strong>3.7 out of 5</strong></li>
                </ul>

                <p>
                Displaying accurate average ratings helps improve credibility, enhances user experience,
                and allows customers to quickly evaluate the quality of a product or service.
                </p>

                <p>
                Whether you are running an e-commerce store, a review platform, or a service-based website,
                properly calculated ratings can significantly impact customer trust and engagement.
                </p>
',
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
                    'description' => $data['description'] ?? null,
                    'status' => 1,
                    'category_id' => $category?->id,
                ]
            );
        }
    }
}
