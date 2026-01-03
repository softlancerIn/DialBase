@extends('web.layout.main')
@section('content')
    <!-- ======================= Home Banner ======================== -->
    <div class="home-banner margin-bottom-0" style="background:#f41b3b url(assets/img/banner-2.jpg) no-repeat;"
        data-overlay="5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-11 col-lg-12 col-md-12 col-sm-12 col-12">

                    <div class="banner_caption text-center">
                        <h1 class="banner_title ft-bold mb-1">Find & Connect with Verified B2B Companies Worldwide</h1>
                        <p class="fs-lg ft-light">Connecting businesses across industries, globally</p>
                    </div>

                    <form class="main-search-wrap fl-wrap half-column" method="GET" action="{{ route('search') }}">
                        <div class="main-search-item">
                            <span class="search-tag">Find</span>
                            <input name="name" type="text" class="form-control radius"
                                placeholder="Nail salons, plumbers, takeout..." value="{{ request('name') }}" />
                        </div>
                        <div class="main-search-item">
                            <span class="search-tag">Where</span>
                            <input name="address" type="text" class="form-control" placeholder="San Francisco, CA" value="{{ request('address') }}" />
                        </div>
                        <div class="main-search-button">
                            <button class="btn full-width theme-bg text-white" type="submit">Search<i
                                    class="fas fa-search"></i></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Home Banner ======================== -->

    <!-- ======================= Listing Categories ======================== -->
    @include('web.components.category_list')
    <!-- ======================= Listing Categories End ======================== -->

    <!-- ======================= All Types Listing ======================== -->
    <section class="space min">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sec_title position-relative text-center mb-5">
                        <h6 class="theme-cl mb-0">Featured Listings</h6>
                        <h2 class="ft-bold">Goodup in Los Angeles</h2>
                    </div>
                </div>
            </div>

            <!-- row -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="tab-content" id="myTabContent">

                    <!-- Places -->
                    <div class="tab-pane fade show active" id="places" role="tabpanel" aria-labelledby="places-tab">
                        <div class="row justify-content-center">
                            @foreach ($data['listing'] as $list)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    @include('web.components.category_details', ['listing' => $list])
                                </div>
                            @endforeach
                        </div>
                        <div class="row justify-content-center md:mt-4">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
                                <a href="{{ route('all_listings') }}" class="btn btn-md theme-bg rounded text-light">More Listings</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->

        </div>
    </section>
    <!-- ======================= All Types Listing ======================== -->

    <!-- ======================= Our Partner Start ============================ -->
    <section class="gray">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-7 col-md-9 col-sm-12">
                    <div class="sec_title position-relative text-center mb-5">
                        <h6 class="text-muted mb-0">Our Partners</h6>
                        <h2 class="ft-bold">We Have Worked with <span class="theme-cl">10,000+</span> Trusted Companies</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="empl-thumb text-center px-3 py-4">
                        <img src="{{asset('assets/img/l-9.png')}}" class="img-fluid mx-auto" alt="" />
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="empl-thumb text-center px-3 py-4">
                        <img src="{{asset('assets/img/l-10.png')}}" class="img-fluid mx-auto" alt="" />
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="empl-thumb text-center px-3 py-4">
                        <img src="{{asset('assets/img/l-11.png')}}" class="img-fluid mx-auto" alt="" />
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="empl-thumb text-center px-3 py-4">
                        <img src="{{asset('assets/img/l-12.png')}}" class="img-fluid mx-auto" alt="" />
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="empl-thumb text-center px-3 py-4">
                        <img src="{{asset('assets/img/l-13.png')}}" class="img-fluid mx-auto" alt="" />
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="empl-thumb text-center px-3 py-4">
                        <img src="{{asset('assets/img/l-14.png')}}" class="img-fluid mx-auto" alt="" />
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="empl-thumb text-center px-3 py-4">
                        <img src="{{asset('assets/img/l-15.png')}}" class="img-fluid mx-auto" alt="" />
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="empl-thumb text-center px-3 py-4">
                        <img src="{{asset('assets/img/l-16.png')}}" class="img-fluid mx-auto" alt="" />
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="empl-thumb text-center px-3 py-4">
                        <img src="{{asset('assets/img/l-17.png')}}" class="img-fluid mx-auto" alt="" />
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="empl-thumb text-center px-3 py-4">
                        <img src="{{asset('assets/img/l-18.png')}}" class="img-fluid mx-auto" alt="" />
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ======================= Our Partner Start ============================ -->


    <!-- ======================= Blog Start ============================ -->
    @if (count($data['homeBlogs']) > 0)
        <section class="space min pt-0">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="sec_title position-relative text-center mb-4">
                            <h6 class="theme-cl mb-0">Latest News</h6>
                            <h2 class="ft-bold">Pickup New Updates</h2>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    @foreach(($data['homeBlogs'] ?? []) as $blog)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="gup_blg_grid_box">
                                <div class="gup_blg_grid_thumb">
                                    <a href="{{ route('web_blog_details', $blog->slug) }}">
                                        <img src="{{ $blog->image ? asset('upload_image/blog/'.$blog->image) : asset('assets/img/b-4.jpg') }}" class="img-fluid"
                                            alt="{{ $blog->name }}" style="width:100%;aspect-ratio:16/9;object-fit:cover;display:block;">
                                    </a>
                                </div>
                                <div class="gup_blg_grid_caption">
                                    <div class="blg_tag"><span>{{ optional($blog->category)->name ?? 'Blog' }}</span></div>
                                    <div class="blg_title">
                                        <h4><a href="{{ route('web_blog_details', $blog->slug) }}">{{ $blog->name }}</a></h4>
                                    </div>
                                    <div class="blg_desc">
                                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 120) }}</p>
                                    </div>
                                </div>
                                <div class="crs_grid_foot">
                                    <div class="crs_flex d-flex align-items-center justify-content-between br-top px-3 py-2">
                                        <div class="crs_fl_first">
                                            <div class="crs_tutor">
                                                <div class="crs_tutor_thumb"><a href="javascript:void(0);"><img src="{{ asset('assets/img/team-2.jpg') }}" class="img-fluid circle" width="35" alt="Admin"></a></div>
                                            </div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="foot_list_info">
                                                <ul>
                                                    <li>
                                                        <div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div>
                                                        <div class="elsio_tx">{{ optional($blog->created_at)->format('d M Y') }}</div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row justify-content-center md:mt-4">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
                        <a href="{{ route('all_blogs') }}" class="btn btn-md theme-bg rounded text-light">More Blogs</a>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- ======================= Blog Start ============================ -->

    <!-- ============================ Pricing Start ==================================== -->
    <section class="space min gray">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-7 col-md-9 col-sm-12">
                    <div class="sec_title position-relative text-center mb-5">
                        <h6 class="theme-cl mb-0">Our Cost</h6>
                        <h2 class="ft-bold">Choose Your Growth Path</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="Goodup-price-wrap">
                        <div class="Goodup-author-header">
                            <div class="Goodup-price-currency">
                                <h3><span class="Goodup-new-price">$<del>0</del></span>
                                    <!-- <span class="Goodup-old-price">$<del>149</del></span> -->
                                </h3>
                            </div>
                            <div class="Goodup-price-title">
                                <div class="Goodup-price-tlt">
                                    <h4>Basic / Starter</h4>
                                </div>
                                <!-- <div class="Goodup-price-ribbon"><span class="Goodup-ribbon-offer all">50% Off</span></div> -->
                            </div>
                            <div class="Goodup-price-subtitle">Best for Small businesses & startups </div>
                        </div>
                        <div class="Goodup-price-body">
                            <ul class="price__features">
                                <li><i class="fa fa-angle-right"></i>Basic company listing</li>
                                <li><i class="fa fa-angle-right"></i>Company profile with logo</li>
                                <li><i class="fa fa-angle-right"></i>Contact details display</li>
                                <li><i class="fa fa-angle-right"></i>Search visibility</li>
                                <li><i class="fa fa-angle-right"></i>5 product/service listings</li>
                                <li><i class="fa fa-angle-right"></i>Standard support</li>
                            </ul>
                        </div>
                        <div class="Goodup-price-bottom">
                            <a class="Goodup-price-btn" href="#"><i class="fas fa-shopping-basket"></i> Purchase Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="Goodup-price-wrap">
                        <div class="Goodup-author-header">
                            <div class="Goodup-price-currency">
                                <h3><span class="Goodup-new-price theme-cl">$<del>49</del></span>
                                    <!-- <span class="Goodup-old-price">$<del>199</del></span> -->
                                </h3>
                            </div>
                            <div class="Goodup-price-title">
                                <div class="Goodup-price-tlt">
                                    <h4>Professional / Growth ⭐ Most Popular</h4>
                                </div>
                                <!-- <div class="Goodup-price-ribbon"><span class="Goodup-ribbon-offer">50% Off</span></div> -->
                            </div>
                            <div class="Goodup-price-subtitle">Best for Growing businesses </div>
                        </div>
                        <div class="Goodup-price-body">
                            <ul class="price__features">
                                <li><i class="fa fa-angle-right"></i>Everything in Basic, plus:</li>
                                <li><i class="fa fa-angle-right"></i>Featured listing badge</li>
                                <li><i class="fa fa-angle-right"></i>Priority in search results</li>
                                <li><i class="fa fa-angle-right"></i>Unlimited product/service listings</li>
                                <li><i class="fa fa-angle-right"></i>Photo & video gallery (up to 20)</li>
                                <li><i class="fa fa-angle-right"></i>Lead inquiry notifications</li>
                                <li><i class="fa fa-angle-right"></i>Verified company badge</li>
                                <li><i class="fa fa-angle-right"></i>Priority customer support</li>
                                <li><i class="fa fa-angle-right"></i>Detailed analytics dashboard</li>
                                <li><i class="fa fa-angle-right"></i>Social media integration</li>
                            </ul>
                        </div>
                        <div class="Goodup-price-bottom">
                            <a class="Goodup-price-btn active" href="#"><i class="fas fa-shopping-basket"></i> Purchase
                                Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="Goodup-price-wrap">
                        <div class="Goodup-author-header">
                            <div class="Goodup-price-currency">
                                <h3><span class="Goodup-new-price">$<del>149</del></span>
                                    <!-- <span class="Goodup-old-price">$<del>249</del></span> -->
                                </h3>
                            </div>
                            <div class="Goodup-price-title">
                                <div class="Goodup-price-tlt">
                                    <h4>Enterprise / Premium</h4>
                                </div>
                                <!-- <div class="Goodup-price-ribbon"><span class="Goodup-ribbon-offer all">50% Off</span></div> -->
                            </div>
                            <div class="Goodup-price-subtitle">Best for Established companies & market leaders </div>
                        </div>
                        <div class="Goodup-price-body">
                            <ul class="price__features">
                                <li><i class="fa fa-angle-right"></i>Everything in Professional, plus:</li>
                                <li><i class="fa fa-angle-right"></i>Homepage featured spotlight</li>
                                <li><i class="fa fa-angle-right"></i>Category page prominence</li>
                                <li><i class="fa fa-angle-right"></i>Unlimited media uploads</li>
                                <li><i class="fa fa-angle-right"></i>Custom company page URL</li>
                                <li><i class="fa fa-angle-right"></i>Advanced SEO optimization</li>
                                <li><i class="fa fa-angle-right"></i>Dedicated account manager</li>
                                <li><i class="fa fa-angle-right"></i>API access for integration</li>
                                <li><i class="fa fa-angle-right"></i>Remove competitor listings from your page</li>
                                <li><i class="fa fa-angle-right"></i>Quarterly business review</li>
                                <li><i class="fa fa-angle-right"></i>Custom branding options</li>
                                <li><i class="fa fa-angle-right"></i>Premium badge & trust markers</li>
                            </ul>
                        </div>
                        <div class="Goodup-price-bottom">
                            <a class="Goodup-price-btn" href="#"><i class="fas fa-shopping-basket"></i> Purchase Now</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ============================ Pricing End ==================================== -->


    <!-- ========================== Download App Section =============================== -->
    <section class="py-md-5">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_2 pr-3 py-4">
                        <div class="content-box">
                            <div class="sec-title light">
                                <!-- <p class="theme-cl px-3 py-1 rounded bg-light-danger d-inline-flex">About Us</p> -->
                                <h2 class="ft-bold">About Us</h2>
                            </div>
                            <div class="text fw-2 mb-3">
                                <p>We connect companies around the world through our extensive B2B directory. With more than 10,000 verified businesses across all sectors We make it easier for businesses to locate reliable partners, suppliers or service suppliers. Our platform facilitates global trade by offering transparent listings, trusted connections as well as growth possibilities for businesses of all sizes.</p>
                            </div>
                            <!-- <div class="position-relative row">
                                <div class="col-lg-4 col-md-4 col-4">
                                    <h3 class="ft-bold theme-cl mb-0"><span class="count">10</span>k+</h3>
                                    <p class="ft-medium">Active Jobs</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-4">
                                    <h3 class="ft-bold theme-cl mb-0"><span class="count">12</span>k+</h3>
                                    <p class="ft-medium">Resumes</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-4">
                                    <h3 class="ft-bold theme-cl mb-0"><span class="count">07</span>k+</h3>
                                    <p class="ft-medium">Employers</p>
                                </div>
                            </div> -->
                            <!-- <div class="btn-box clearfix mt-5">
                                <a href="index.html" class="download-btn play-store me-1 d-inline-flex"><img
                                        src="{{asset('assets/img/ios.png')}}" width="200" alt="" /></a>
                                <a href="index.html" class="download-btn play-store ms-2 mb-1 d-inline-flex"><img
                                        src="{{asset('assets/img/and.png')}}" width="200" alt="" /></a>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 col-sm-12 image-column">
                    <div class="image-box">
                        <figure class="image"><img src="{{asset('assets/img/app.png')}}" class="img-fluid" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================== Download App Section =============================== -->


    <!-- ======================= Newsletter Start ============================ -->
    <section class="space bg-cover" style="background:#03343b url(assets/img/landing-bg.png) no-repeat;">
        <div class="container py-5">

            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sec_title position-relative text-center mb-5">
                        <h6 class="text-light mb-0">Subscribr Now</h6>
                        <h2 class="ft-bold text-light">Get All Updates & Advance Offers</h2>
                    </div>
                </div>
            </div>

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12 col-12">
                    <form class="bg-white rounded p-1">
                        <div class="row no-gutters">
                            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-8">
                                <div class="form-group mb-0 position-relative">
                                    <input type="text" class="form-control b-0" placeholder="Enter Your Email Address">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4">
                                <div class="form-group mb-0 position-relative">
                                    <button class="btn full-width btn-height theme-bg text-light fs-md"
                                        type="button">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <!-- ======================= Newsletter Start ============================ -->
@endsection
