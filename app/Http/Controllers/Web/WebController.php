<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Enquiry;
use App\Models\Listing;
use App\Models\Amenity;
use App\Models\ListingReview;
use App\Models\Blog;
use App\Models\Product;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(Request $request)
    {
        $data['category'] = Category::where('status', '1')->withCount('listing')->take(12)->get();

        $query = Listing::with(['images', 'workingHours', 'amenities', 'category', 'reviews.user']);

        $data['listing'] = $query->where('is_featured', 1)->take(12)->get();

        foreach ($data['listing'] as $listing) {
            $listing->reviews_count = $listing->reviews->where('status', 1)->count();
            $listing->average_rating = $listing->reviews->where('status', 1)->avg('rating');
        }

        $data['homeBlogs'] = Blog::where('status', 1)->with('category')->latest('created_at')->take(3)->get();

        return view('web.index', compact('data'));
    }

    /**
     * Accepts GET `name` and `address` (and optional filters) from home search form.
     */
    public function search(Request $request)
    {
        $name = $request->query('name');
        $address = $request->query('address');
        $open_now = $request->boolean('open_now');
        $featured = $request->boolean('featured');

        $data['category'] = Category::where('status', '1')->get();
        $data['all_amenities'] = Amenity::all();

        $query = Listing::with(['images', 'workingHours', 'amenities', 'category']);

        if (! empty($name)) {
            $query->where('title', 'like', "%{$name}%");
        }

        if (! empty($address)) {
            $tokens = preg_split('/[\s,]+/', trim($address));
            $query->where(function ($q) use ($tokens) {
                foreach ($tokens as $token) {
                    $token = trim($token);
                    if ($token === '') {
                        continue;
                    }
                    $t = mb_strtolower($token);
                    $q->orWhereRaw('LOWER(city) LIKE ?', ["%{$t}%"]) ->orWhereRaw('LOWER(state) LIKE ?', ["%{$t}%"]);
                }
            });
        }

        if ($featured) {
            $query->where('is_featured', 1);
        }

        $data['listings'] = $query->paginate(12)->withQueryString();

        if ($open_now) {
            $collection = $data['listings']->getCollection()->filter(function ($listing) {
                return ! empty($listing->is_247_open);
            });
            $data['listings']->setCollection($collection->values());
        }

        $data['locations'] = Listing::whereNotNull('city')->pluck('city')->unique()->sort()->values();

        return view('web.pages.search_results', compact('data'));
    }

    public function category_detail(Request $request, $slug, $location = null)
    {
        $address = $request->query('address');
        $amenities = $request->query('amenities', []);
        $open_now = $request->boolean('open_now');
        $featured = $request->boolean('featured');
        // Support location coming from query string (old style) or path parameter (new style)
        $location = $location ?? $request->query('location');

        $data['category'] = Category::where('slug', $slug)->where('status', '1')->first();

        if (! $data['category']) {
            return redirect()->route('index');
        }

        $data['all_categories'] = Category::where('status', '1')->get();
        $data['all_amenities'] = Amenity::all();

        $query = Listing::where('category_id', $data['category']->id)->with('images');

        if (! empty($address)) {
            $tokens = preg_split('/[\s,]+/', trim($address));
            $query->where(function ($q) use ($tokens) {
                foreach ($tokens as $token) {
                    $token = trim($token);
                    if ($token === '') {
                        continue;
                    }
                    $t = mb_strtolower($token);
                    $q->orWhereRaw('LOWER(city) LIKE ?', ["%{$t}%"]) ->orWhereRaw('LOWER(state) LIKE ?', ["%{$t}%"]);
                }
            });
        }

        if (! empty($amenities) && is_array($amenities)) {
            $query->whereHas('amenities', function ($q) use ($amenities) {
                $q->whereIn('amenities.id', $amenities);
            });
        }

        if ($open_now) {
            $query->where('is_247_open', 1);
        }

        if ($featured) {
            $query->where('is_featured', 1);
        }

        if (! empty($location)) {
            $query->where('city', $location);
        }

        $data['listings'] = $query->paginate(12)->withQueryString();

        foreach ($data['listings'] as $listing) {
            $listing->reviews_count = $listing->reviews->where('status', 1)->count();
            $listing->average_rating = $listing->reviews->where('status', 1)->avg('rating');
        }

        $all_listings_for_locations = Listing::where('category_id', $data['category']->id)->get();
        $data['locations'] = $all_listings_for_locations->pluck('city')->unique()->sort()->values();

        return view('web.pages.category_details', compact('data'));
    }

    public function city_listing(Request $request, $slug)
    {
        $data['category'] = Category::where('slug', $slug)->where('status', '1')->first();

        if (! $data['category']) {
            return redirect()->route('index');
        }
        $data['city_listings'] = Listing::where('category_id', $data['category']->id)
            ->selectRaw('city, COUNT(*) as listing_count')
            ->groupBy('city')
            ->get();

        return view('web.pages.city_listings', compact('data'));
    }

    public function about()
    {
        return view('web.pages.about');
    }

    public function mission_vision()
    {
        return view('web.pages.mission_vision');
    }

    public function quality()
    {
        return view('web.pages.quality');
    }

    public function our_strength()
    {
        return view('web.pages.our_strength');
    }

    public function promoters()
    {
        return view('web.pages.promoters');
    }

    public function all_listings() {
        $listings = Listing::paginate(12);
        $allLocations = Listing::whereNotNull('city')->pluck('city')->unique()->sort()->values();

        return view('web.pages.listings', compact('listings', 'allLocations'));
    }

    public function listing_detail($slug)
    {
        $data['listing'] = Listing::where('slug', $slug)->with(['images', 'workingHours', 'amenities', 'socialLink', 'category', 'reviews' => function ($query) {$query->where('status', 1);}, 'reviews.user'])->first();

        if ($data['listing']) {
            $data['listing']->reviews_count = $data['listing']->reviews->count();
            $data['listing']->average_rating = $data['listing']->reviews->avg('rating');
        }

        if (! $data['listing']) {
            return redirect()->route('index');
        }

        $data['category'] = $data['listing']->category() ? $data['listing']->category()->first() : null;
        $data['featured_image'] = $data['listing']->images->where('type', 'featured')->first();
        $data['logo_image'] = $data['listing']->images->where('type', 'logo')->first();

        return view('web.pages.listing_details', compact('data'));
    }

    public function contact()
    {
        return view('web.pages.contact');
    }

    public function certificate()
    {
        return view('web.pages.certificate');
    }

    public function save_enquiry(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'city' => 'required',
            'state' => 'required',
            'message' => 'required',
        ]);
        $save_data = Enquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'state' => $request->state,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        if (! empty($save_data)) {
            return ['success', ' -> Enquiry Send Successfully!'];
        } else {
            return ['error', ' -> Something went wrong!'];
        }
    }

    public function save_listing_enquiry(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $listing = Listing::where('slug', $slug)->firstOrFail();

        $enquiry = new Enquiry();
        $enquiry->listing_id = $listing->id;
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->phone = $request->phone;
        $enquiry->subject = $request->subject;
        $enquiry->message = $request->message;
        $enquiry->save();

        return redirect()->back()->with('success', 'Enquiry submitted successfully! We will contact you soon.');
    }

    public function blogs()
    {
        $data['blogs'] = Blog::where('status', 1)->orderBy('id', 'desc')->paginate(6);

        return view('web.pages.blogs', compact('data'));
    }

    public function blog_details($slug)
    {
        $data['blog'] = Blog::where('slug', $slug)->first();
        $data['blogs'] = Blog::get();

        return view('web.pages.blog-details', compact('data'));
    }

    public function all_categories()
    {
        $all_category = Category::where('cat_id', '0')->withCount('listing')->get();

        return view('web.pages.category_listings', compact('all_category'));
    }

    public function all_blogs()
    {
        $all_blogs = Blog::paginate(12);

        return view('web.pages.blog_listings', compact('all_blogs'));
    }

    public function master_function($slug)
    {
        $data['product'] = Product::where('slug', $slug)->first();
        $data['category'] = Category::where('slug', $slug)->where('cat_id', '0')->first();
        $data['subcategory'] = Category::where('slug', $slug)->where('cat_id', '!=', '0')->first();

        if ($data['product']) {
            $data['heading'] = $data['product']->name;
            $data['products'] = Product::where('sub_cat_id', $data['product']->sub_cat_id)->get();
            $data['pro_specification'] = DB::table('specifications')->where('product_id', $data['product']->id)->get();
            $data['product']['images'] = DB::table('images')->where('product_id', $data['product']->id)->take(5)->latest()->get();

            return view('web.pages.product-details', compact('data'));
        } elseif ($data['subcategory']) {
            $data['heading'] = $data['subcategory']->name;
            $data['paragraph'] = $data['subcategory']->description;
            $data['products'] = Product::where('sub_cat_id', $data['subcategory']->id)->get();
            foreach ($data['products'] as $key => $product) {
                $image = DB::table('images')->where('product_id', $product->id)->latest()->first('name');
                if ($image) {
                    $data['products'][$key]['image'] = DB::table('images')->where('product_id', $product->id)->latest()->first()->name;
                }
            }

            return view('web.pages.sub_categories', compact('data'));
        } elseif ($data['category']) {
            $data['heading'] = $data['category']->name;
            $data['paragraph'] = $data['category']->description;
            $subCategory = Category::where('cat_id', '!=', '0')->get();
            foreach ($subCategory as $category) {
                if (in_array($data['category']->id, explode(',', $category->cat_id))) {
                    $data['subcategory'][] = $category;
                }
                $product = Product::where('sub_cat_id', $category->id)->first();
                if ($product) {
                    $data['relatedProducts'][] = $product;
                }
            }

            return view('web.pages.categories', compact('data'));
        } else {
            return redirect()->route('home');
        }
    }

    public function saveReview(Request $request, $slug) {
        $request->validate([
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'email' => 'required|email',
            'name' => 'nullable|string',
        ]);

        $listing = Listing::where('slug', $slug)->firstOrFail();

        $existing = ListingReview::where('listing_id', $listing->id)
            ->where('email', $request->email)
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'You have already submitted a review for this listing.');
        }

        $review = new ListingReview();
        $review->listing_id = $listing->id;
        $review->user_id = auth()->id() ?: null;
        $review->name = $request->name;
        $review->email = $request->email;
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->status = 0;
        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully! Your review will appear after approval.');
    }

    public function termsAndCondition()
    {
        return view('web.pages.terms_and_condition');
    }

    public function privacyPolicy()
    {
        return view('web.pages.privacy_policy');
    }

    public function seo_listing_detail($country, $category_slug, $city, $slug)
    {
        $listing = Listing::where('slug', $slug)
            ->where('country', $country)
            ->where('city', $city)
            ->with(['images', 'workingHours', 'amenities', 'socialLink', 'category', 'reviews.user'])
            ->first();

        if (!$listing) {
            // Fallback: try finding by slug only if strict path fails, or redirect
            $listing = Listing::where('slug', $slug)->first();
            if (!$listing) {
                return redirect()->route('index');
            }
            // Optional: Redirect to correct URL if found but path mismatch?
        }

        $data['listing'] = $listing;
        $data['category'] = $listing->category;
        $data['featured_image'] = $listing->images->where('type', 'featured')->first();
        $data['logo_image'] = $listing->images->where('type', 'logo')->first();

        return view('web.pages.listing_details', compact('data'));
    }

    public function seo_city_category($country, $category_slug, $city)
    {
        $category = Category::where('slug', $category_slug)->first();
        if (!$category) {
            return redirect()->route('index');
        }

        $data['category'] = $category;
        $data['all_categories'] = Category::where('status', '1')->get();
        $data['all_amenities'] = Amenity::all();

        $query = Listing::where('category_id', $category->id)
            ->where('country', $country)
            ->where('city', $city)
            ->with('images');

        $data['listings'] = $query->paginate(12);
        
        // Populate locations for filter (maybe just this city?)
        $data['locations'] = collect([$city]);

        return view('web.pages.category_details', compact('data'));
    }
}
