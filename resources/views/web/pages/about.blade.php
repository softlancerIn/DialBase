@extends('web.layout.main')

@section('content')
    <!-- Breadcrumb -->
    <div class="gray py-3">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">/ About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-12">
                    <div class="text-center mb-4">
                        <h1 class="ft-bold mb-3">About Us</h1>
                        <p class="lead text-muted">Connecting businesses globally since 2018</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Who We Are Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-12">
                    <div class="mb-5">
                        <h2 class="ft-bold mb-4">Who We Are</h2>
                        <p class="mb-3">
                            Established in 2018, we are a top B2B directory that connects businesses across sectors and boundaries. Over the last 6 years we've evolved from a basic listing platform to a trusted marketplace that helps more than 10,000 verified companies find opportunities, form partnerships, and accelerate growth.
                        </p>
                        <p>
                            Our aim is to make business networking easy and accessible to businesses across the world. Whether you're a start-up looking for suppliers or a business expanding into new markets, we provide the connections and tools you need to succeed.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Journey Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-12">
                    <h2 class="ft-bold mb-4">Our Journey</h2>
                    <p class="mb-4">What began as a plan to streamline B2B networking has grown into a vibrant global community. Since 2018, we have focused on:</p>
                    
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3">
                            <div class="p-4 bg-white rounded shadow-sm">
                                <div class="mb-3">
                                    <i class="ti-check-box text-success" style="font-size: 2.5rem;"></i>
                                </div>
                                <h5 class="ft-medium mb-2">Building Trust</h5>
                                <p class="mb-0">Every business on our site is verified to ensure you connect with trustworthy, legitimate companies.</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="p-4 bg-white rounded shadow-sm">
                                <div class="mb-3">
                                    <i class="ti-rocket text-primary" style="font-size: 2.5rem;"></i>
                                </div>
                                <h5 class="ft-medium mb-2">Enabling Growth</h5>
                                <p class="mb-0">We have facilitated thousands of business alliances across continents, helping companies expand into new markets.</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="p-4 bg-white rounded shadow-sm">
                                <div class="mb-3">
                                    <i class="ti-light-bulb text-warning" style="font-size: 2.5rem;"></i>
                                </div>
                                <h5 class="ft-medium mb-2">Always Innovating</h5>
                                <p class="mb-0">Our platform continuously improves with features that help you find and connect with the right partners faster.</p>
                            </div>
                        </div>
                    </div>

                    <p>
                        Today, we serve companies across major industries—from manufacturing and engineering to logistics and professional services—creating an ecosystem where diverse opportunities flourish.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- What Sets Us Apart Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="text-center mb-5">
                        <h6 class="mb-2 theme-cl text-uppercase">Working Process</h6>
                        <h2 class="ft-bold">What Sets Us Apart</h2>
                    </div>
                </div>
            </div>
        
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="text-center p-4">
                                <div class="mb-3">
                                    <i class="ti-map-alt text-success" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="ft-medium mb-2">Global Reach, Local Understanding</h5>
                                <p class="text-muted">Global exposure with localized understanding of industry needs.</p>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="text-center p-4">
                                <div class="mb-3">
                                    <i class="ti-user theme-cl" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="ft-medium mb-2">Verified &amp; Trusted</h5>
                                <p class="text-muted">Rigorous screening of listed companies.</p>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="text-center p-4">
                                <div class="mb-3">
                                    <i class="ti-shield text-sky" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="ft-medium mb-2">Industry Diversity</h5>
                                <p class="text-muted">From traditional manufacturing to cutting-edge tech startups.</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="text-center p-4">
                                <div class="mb-3">
                                    <i class="ti-target text-info" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="ft-medium mb-2">User‑First Approach</h5>
                                <p class="text-muted">Intuitive platform for fast discovery and direct connections.</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="text-center p-4">
                                <div class="mb-3">
                                    <i class="ti-headphone-alt text-danger" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="ft-medium mb-2">Continuous Support</h5>
                                <p class="text-muted">Dedicated team to help maximize your presence.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Impact Numbers Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-12">
                    <h2 class="ft-bold mb-4 text-center">Our Impact in Numbers</h2>
                    
                    <div class="row text-center">
                        <div class="col-md-4 mb-4">
                            <div class="p-4">
                                <h1 class="ft-bold theme-cl mb-2">6+</h1>
                                <p class="mb-0">Years of connecting businesses globally</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="p-4">
                                <h1 class="ft-bold theme-cl mb-2">10,000+</h1>
                                <p class="mb-0">Verified businesses in our network</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="p-4">
                                <h1 class="ft-bold theme-cl mb-2">150+</h1>
                                <p class="mb-0">Countries represented</p>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center text-center">
                        <div class="col-md-6 mb-3">
                            <div class="p-3">
                                <i class="ti-briefcase text-success mb-2" style="font-size: 2rem;"></i>
                                <p class="mb-0 ft-medium">All major industries covered</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="p-3">
                                <i class="ti-stats-up text-primary mb-2" style="font-size: 2rem;"></i>
                                <p class="mb-0 ft-medium">Thousands of successful business partnerships</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 col-md-12">
                    <div class="text-center">
                        <h2 class="ft-bold mb-4">Our Vision</h2>
                        <p class="lead mb-3">We imagine a world where geographic boundaries do not limit business potential.</p>
                        <p class="text-muted">We're more than a directory—we're building a global business ecosystem where trust, transparency, and potential drive every interaction.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-12">
                    <h2 class="ft-bold mb-4">Why Businesses Choose Us</h2>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex">
                                <div class="mr-3">
                                    <i class="ti-check text-success" style="font-size: 1.5rem;"></i>
                                </div>
                                <div>
                                    <p class="mb-0">Complete listings with comprehensive company profiles and contact details</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex">
                                <div class="mr-3">
                                    <i class="ti-check text-success" style="font-size: 1.5rem;"></i>
                                </div>
                                <div>
                                    <p class="mb-0">Advanced search with powerful filters</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex">
                                <div class="mr-3">
                                    <i class="ti-check text-success" style="font-size: 1.5rem;"></i>
                                </div>
                                <div>
                                    <p class="mb-0">Direct connections with decision-makers—no intermediaries</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex">
                                <div class="mr-3">
                                    <i class="ti-check text-success" style="font-size: 1.5rem;"></i>
                                </div>
                                <div>
                                    <p class="mb-0">Verified partners, authenticity assured</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex">
                                <div class="mr-3">
                                    <i class="ti-check text-success" style="font-size: 1.5rem;"></i>
                                </div>
                                <div>
                                    <p class="mb-0">Industry insights to track the latest news and trends</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex">
                                <div class="mr-3">
                                    <i class="ti-check text-success" style="font-size: 1.5rem;"></i>
                                </div>
                                <div>
                                    <p class="mb-0">Flexible plans for businesses of all sizes and budgets</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="text-center mb-5">
                        <h6 class="mb-2 theme-cl text-uppercase">Core Principles</h6>
                        <h2 class="ft-bold">Our Values</h2>
                    </div>
                </div>
            </div>
        
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="text-center p-4 bg-white rounded shadow-sm">
                                <div class="mb-3">
                                    <i class="ti-lock text-success" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="ft-medium mb-2">Integrity</h5>
                                <p class="text-muted mb-0">Transparency and honesty in all interactions.</p>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="text-center p-4 bg-white rounded shadow-sm">
                                <div class="mb-3">
                                    <i class="ti-settings theme-cl" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="ft-medium mb-2">Technology</h5>
                                <p class="text-muted mb-0">Continuous platform improvements.</p>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="text-center p-4 bg-white rounded shadow-sm">
                                <div class="mb-3">
                                    <i class="ti-world text-info" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="ft-medium mb-2">Inclusion</h5>
                                <p class="text-muted mb-0">Open to all sizes, industries, and locations.</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="text-center p-4 bg-white rounded shadow-sm">
                                <div class="mb-3">
                                    <i class="ti-star text-warning" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="ft-medium mb-2">Quality</h5>
                                <p class="text-muted mb-0">Exceptional value and service.</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="text-center p-4 bg-white rounded shadow-sm">
                                <div class="mb-3">
                                    <i class="ti-hand-open text-danger" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="ft-medium mb-2">Partnership</h5>
                                <p class="text-muted mb-0">Your success is our success.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 col-md-12">
                    <div class="text-center">
                        <h2 class="ft-bold mb-3">Join Our Growing Community</h2>
                        <p class="lead mb-4">Whether you want to expand your supplier base, find potential customers, or explore partnerships, we're here to help you achieve your goals.</p>
                        <p class="text-muted mb-4">Join thousands of businesses using our platform to grow globally.</p>
                        <a href="#" class="btn btn-md theme-bg text-light">Get Started Today</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="space bg-cover" style="background:#03343b url(assets/img/landing-bg.png) no-repeat;">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="text-center mb-5">
                        <h6 class="text-light mb-2 text-uppercase">Subscribe Now</h6>
                        <h2 class="ft-bold text-light">Get All Updates &amp; Advance Offers</h2>
                    </div>
                </div>
            </div>

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-7 col-lg-10 col-md-12">
                    <form class="bg-white rounded p-1">
                        <div class="row no-gutters">
                            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-8">
                                <div class="form-group mb-0 position-relative">
                                    <input type="email" class="form-control b-0" placeholder="Enter Your Email Address">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4">
                                <div class="form-group mb-0 position-relative">
                                    <button class="btn full-width btn-height theme-bg text-light fs-md" type="submit">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection