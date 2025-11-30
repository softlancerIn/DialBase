<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Enquiry;
use App\Models\Listing;
use App\Models\Amenity;
use DB;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->query('name');
        $address = $request->query('address');

        $data['category'] = Category::where('status', '1')->get();

        $query = Listing::with('images');

        if (! empty($name)) {
            $query->where('title', 'like', "%{$name}%");
        }

        if (! empty($address)) {
            $query->where(function ($q) use ($address) {
                $q->where('city', 'like', "%{$address}%")->orWhere('state', 'like', "%{$address}%");
            });
        }

        $data['listing'] = $query->get();

        return view('web.index', compact('data'));
    }

    public function category_detail(Request $request, $slug)
    {
        $address = $request->query('address');
        $amenities = $request->query('amenities', []);
        $open_now = $request->boolean('open_now');
        $featured = $request->boolean('featured');
        $location = $request->query('location');

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

        $all_listings_for_locations = Listing::where('category_id', $data['category']->id)->get();
        $data['locations'] = $all_listings_for_locations->pluck('city')->unique()->sort()->values();

        return view('web.pages.category_details', compact('data'));
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

    public function blogs()
    {
        $data['blogs'] = Blog::where('is_deleted', '0')->orderBy('id', 'desc')->paginate(3);

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
        $data['category'] = Category::where('cat_id', '0')->get();

        return view('web.pages.product', compact('data'));
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
}
