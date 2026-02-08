@extends('web.layout.main')

@section('page_title', 'Site Map')

@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">Site Map</h2>
                    <span class="ipn-subtitle">Explore all pages of our website</span>
                </div>
            </div>
        </div>
    </div>

    <section class="gray-simple">
        <div class="container">
            <div class="row">

                <!-- Static Pages -->
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 py-3">
                            <h4 class="mb-0 text-primary"><i class="ti-layers mr-2"></i>Main Pages</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-2"><a href="{{ route('index') }}">Home</a></div>
                                <div class="col-md-3 mb-2"><a href="{{ route('all_listings') }}">All Listings</a></div>
                                <div class="col-md-3 mb-2"><a href="{{ route('all_categories') }}">All Categories</a></div>
                                <div class="col-md-3 mb-2"><a href="{{ route('all_blogs') }}">Blogs</a></div>
                                <div class="col-md-3 mb-2"><a href="{{ route('about') }}">About Us</a></div>
                                <div class="col-md-3 mb-2"><a href="{{ route('contact') }}">Contact Us</a></div>
                                <div class="col-md-3 mb-2"><a href="{{ route('privacy_policy') }}">Privacy Policy</a></div>
                                <div class="col-md-3 mb-2"><a href="{{ route('terms_and_condition') }}">Terms &
                                        Conditions</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Categories -->
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 py-3">
                            <h4 class="mb-0 text-primary"><i class="ti-tag mr-2"></i>Categories</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($data['categories'] as $category)
                                    <div class="col-md-3 mb-2">
                                        <a href="{{ route('category.slug', $category->slug) }}">{{ $category->name }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cities -->
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 py-3">
                            <h4 class="mb-0 text-primary"><i class="ti-location-pin mr-2"></i>Cities</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($data['cities'] as $city)
                                    <div class="col-md-2 mb-2">
                                        <a
                                            href="{{ route('search', ['city' => $city]) }}">{{ str_replace('-', ' ', $city) }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Listings -->
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 py-3">
                            <h4 class="mb-0 text-primary"><i class="ti-list mr-2"></i>Listings</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($data['listings'] as $listing)
                                    <div class="col-md-4 mb-2">
                                        <a href="{{ route('listing.slug', $listing->slug) }}">{{ $listing->title }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blogs -->
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 py-3">
                            <h4 class="mb-0 text-primary"><i class="ti-pencil-alt mr-2"></i>Blogs</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($data['blogs'] as $blog)
                                    <div class="col-md-4 mb-2">
                                        <a href="{{ route('web_blog_details', $blog->slug) }}">{{ $blog->name }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products -->
                @if ($data['products']->count() > 0)
                    <div class="col-lg-12 col-md-12 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white border-0 py-3">
                                <h4 class="mb-0 text-primary"><i class="ti-package mr-2"></i>Products</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($data['products'] as $product)
                                        <div class="col-md-4 mb-2">
                                            <a href="{{ route('products', $product->slug) }}">{{ $product->name }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>

    <style>
        .card {
            border-radius: 10px;
        }

        .card-header h4 {
            font-size: 18px;
            font-weight: 600;
        }

        .card-body a {
            color: #546e7a;
            transition: all 0.3s ease;
            display: block;
            padding: 5px 0;
        }

        .card-body a:hover {
            color: #ff5722;
            padding-left: 5px;
        }

        .ipt-title {
            color: #ffffff;
            font-size: 35px;
            font-weight: 700;
        }

        .ipn-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 16px;
        }

        .page-title {
            background: #0b1c38;
            padding: 60px 0;
            text-align: center;
        }
    </style>
@endsection
