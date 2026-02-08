<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\Category;
use App\Models\Listing;
use App\Models\Blog;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
    public function index()
    {
        $states = State::orderBy('name')->get();
        return view('admin.setting.index', compact('states'));
    }

    public function saveState(Request $request)
    {
        $name = preg_replace('/[\s-]+/', '-', trim($request->name));
        $request->merge(['name' => $name]);

        $request->validate(['name' => 'required|string|max:255|unique:states,name']);

        State::firstOrCreate(['name' => $request->name]);

        return redirect()->back()->with('success', 'State created successfully');
    }

    public function saveCity(Request $request)
    {
        $name = preg_replace('/[\s-]+/', '-', trim($request->name));
        $request->merge(['name' => $name]);

        $request->validate([
            'state_id' => 'required|exists:states,id',
            'name' => 'required|string|max:255'
        ]);

        City::firstOrCreate([
            'state_id' => $request->state_id,
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', 'City created successfully');
    }

    public function generateSitemap()
    {
        $baseUrl = url('/');
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        // Static Pages
        $staticPages = ['', 'about', 'contact', 'listings', 'blogs', 'all-categories', 'terms-and-condition', 'privacy-policy', 'faq'];
        foreach ($staticPages as $page) {
            $xml .= '  <url>' . PHP_EOL;
            $xml .= '    <loc>' . $baseUrl . ($page ? '/' . $page : '') . '</loc>' . PHP_EOL;
            $xml .= '    <lastmod>' . date('Y-m-d') . '</lastmod>' . PHP_EOL;
            $xml .= '    <changefreq>weekly</changefreq>' . PHP_EOL;
            $xml .= '    <priority>0.8</priority>' . PHP_EOL;
            $xml .= '  </url>' . PHP_EOL;
        }

        // Categories
        $categories = Category::where('status', 1)->get();
        foreach ($categories as $category) {
            $xml .= '  <url>' . PHP_EOL;
            $xml .= '    <loc>' . route('category.slug', $category->slug) . '</loc>' . PHP_EOL;
            $xml .= '    <lastmod>' . $category->updated_at->format('Y-m-d') . '</lastmod>' . PHP_EOL;
            $xml .= '    <changefreq>weekly</changefreq>' . PHP_EOL;
            $xml .= '    <priority>0.7</priority>' . PHP_EOL;
            $xml .= '  </url>' . PHP_EOL;
        }

        // Listings
        $listings = Listing::where('status', 1)->get();
        foreach ($listings as $listing) {
            $xml .= '  <url>' . PHP_EOL;
            $xml .= '    <loc>' . route('listing.slug', $listing->slug) . '</loc>' . PHP_EOL;
            $xml .= '    <lastmod>' . $listing->updated_at->format('Y-m-d') . '</lastmod>' . PHP_EOL;
            $xml .= '    <changefreq>monthly</changefreq>' . PHP_EOL;
            $xml .= '    <priority>0.6</priority>' . PHP_EOL;
            $xml .= '  </url>' . PHP_EOL;
        }

        // Blogs
        $blogs = Blog::where('status', 1)->get();
        foreach ($blogs as $blog) {
            $xml .= '  <url>' . PHP_EOL;
            $xml .= '    <loc>' . route('web_blog_details', $blog->slug) . '</loc>' . PHP_EOL;
            $xml .= '    <lastmod>' . $blog->updated_at->format('Y-m-d') . '</lastmod>' . PHP_EOL;
            $xml .= '    <changefreq>monthly</changefreq>' . PHP_EOL;
            $xml .= '    <priority>0.5</priority>' . PHP_EOL;
            $xml .= '  </url>' . PHP_EOL;
        }

        $xml .= '</urlset>';

        $path = public_path('sitemap.xml');
        File::put($path, $xml);

        return redirect()->back()->with('success', 'Sitemap.xml generated successfully in root directory.');
    }
}
