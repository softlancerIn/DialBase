@extends('web.layout.main')

@section('content')
    <div class="gray py-3">
        <div class="container">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="middle">
        <div class="container">
            <div class="row align-items-center justify-content-between">
            
                <div class="col-xl-11 col-lg-12 col-md-6 col-sm-12">
                    <div class="abt_caption">
                        <h2 class="ft-medium mb-4">About Us</h2>

                        <h4 class="ft-medium heading">Who We Are</h4>
                        <p>
                        Established in 2018, we are a top B2B directory that connects businesses across sectors and boundaries. Over the last 6 years we've evolved from a basic listing platform to a trusted marketplace that helps more than 10,000 verified companies find opportunities, form partnerships, and accelerate growth.
                        </p>
                        <p>
                        Our aim is to make business networking easy and accessible to businesses across the world. Whether you're a start-up looking for suppliers or a business expanding into new markets, we provide the connections and tools you need to succeed.
                        </p>

                        <h4 class="ft-medium heading">Our Journey</h3>
                        <p>What began as a plan to streamline B2B networking has grown into a vibrant global community. Since 2018, we have focused on:</p>
                        <ul>
                        <li><strong>Building Trust:</strong> Every business on our site is verified to ensure you connect with trustworthy, legitimate companies.</li>
                        <li><strong>Enabling Growth:</strong> We have facilitated thousands of business alliances across continents, helping companies expand into new markets.</li>
                        <li><strong>Always Innovating:</strong> Our platform continuously improves with features that help you find and connect with the right partners faster.</li>
                        </ul>
                        <p>
                        Today, we serve companies across major industries—from manufacturing and engineering to logistics and professional services—creating an ecosystem where diverse opportunities flourish.
                        </p>

                        <h4 class="ft-medium heading">What Sets Us Apart</h3>
                        <ul>
                        <li><strong>Global Reach, Local Understanding:</strong> Global exposure with localized understanding of industry needs.</li>
                        <li><strong>Verified &amp; Trusted:</strong> Rigorous screening of listed companies.</li>
                        <li><strong>Industry Diversity:</strong> From traditional manufacturing to cutting-edge tech startups.</li>
                        <li><strong>User‑First Approach:</strong> Intuitive platform for fast discovery and direct connections.</li>
                        <li><strong>Continuous Support:</strong> Dedicated team to help maximize your presence.</li>
                        </ul>

                        <h4 class="ft-medium heading">Our Impact in Numbers</h3>
                        <ul>
                        <li>6+ years of connecting businesses globally</li>
                        <li>10,000+ verified businesses in our network</li>
                        <li>150+ countries represented</li>
                        <li>All major industries covered</li>
                        <li>Thousands of successful business partnerships</li>
                        </ul>

                        <h4 class="ft-medium heading">Our Vision</h3>
                        <p>We imagine a world where geographic boundaries do not limit business potential.</p>
                        <p>We’re more than a directory—we’re building a global business ecosystem where trust, transparency, and potential drive every interaction.</p>

                        <h4 class="ft-medium heading">Why Businesses Choose Us</h3>
                        <ul>
                        <li>Complete listings with comprehensive company profiles and contact details</li>
                        <li>Advanced search with powerful filters</li>
                        <li>Direct connections with decision-makers—no intermediaries</li>
                        <li>Verified partners, authenticity assured</li>
                        <li>Industry insights to track the latest news and trends</li>
                        <li>Flexible plans for businesses of all sizes and budgets</li>
                        </ul>

                        <h4 class="ft-medium heading">Join Our Growing Community</h3>
                        <p>Whether you want to expand your supplier base, find potential customers, or explore partnerships, we’re here to help you achieve your goals. Join thousands of businesses using our platform to grow globally.</p>

                        <h4 class="ft-medium heading">Our Values</h3>
                        <ul>
                        <li><strong>Integrity:</strong> Transparency and honesty in all interactions.</li>
                        <li><strong>Technology:</strong> Continuous platform improvements.</li>
                        <li><strong>Inclusion:</strong> Open to all sizes, industries, and locations.</li>
                        <li><strong>Quality:</strong> Exceptional value and service.</li>
                        <li><strong>Partnership:</strong> Your success is our success.</li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
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