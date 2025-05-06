@php
    $category = App\Models\Category::where('status', '1')->get();
@endphp
<section class="space min gray">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center mb-5">
                    <h6 class="mb-0 theme-cl">Popular Categories</h6>
                    <h2 class="ft-bold">Browse Top Categories</h2>
                </div>
            </div>
        </div>

        <!-- row -->
        <div class="row align-items-center">
            @foreach ($category as $c_data)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cats-wrap text-center">
                        <a href="#" class="Goodup-catg-wrap">
                            <div class="Goodup-catg-city">07 Cities</div>
                            <div class="Goodup-catg-icon">
                                {!!$c_data->icon ?? '--' !!}
                            </div>
                            <div class="Goodup-catg-caption">
                                <h4 class="fs-md mb-0 ft-medium m-catrio">{{$c_data->name}}</h4>
                                <span class="text-muted">607 Listings</span>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach

            {{-- <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="cats-wrap text-center">
                    <a href="listing-search-v1.html" class="Goodup-catg-wrap">
                        <div class="Goodup-catg-city">17 Cities</div>
                        <div class="Goodup-catg-icon"><i class="fas fa-building"></i></div>
                        <div class="Goodup-catg-caption">
                            <h4 class="fs-md mb-0 ft-medium m-catrio">IT &amp; Banking</h4>
                            <span class="text-muted">76 Listings</span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="cats-wrap text-center">
                    <a href="listing-search-v1.html" class="Goodup-catg-wrap">
                        <div class="Goodup-catg-city">19 Cities</div>
                        <div class="Goodup-catg-icon"><i class="fas fa-shopping-basket"></i></div>
                        <div class="Goodup-catg-caption">
                            <h4 class="fs-md mb-0 ft-medium m-catrio">Shoppings</h4>
                            <span class="text-muted">112 Listings</span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="cats-wrap text-center">
                    <a href="listing-search-v1.html" class="Goodup-catg-wrap">
                        <div class="Goodup-catg-city">32 Cities</div>
                        <div class="Goodup-catg-icon"><i class="fas fa-screwdriver"></i></div>
                        <div class="Goodup-catg-caption">
                            <h4 class="fs-md mb-0 ft-medium m-catrio">Home Services</h4>
                            <span class="text-muted">322 Listings</span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="cats-wrap text-center">
                    <a href="listing-search-v1.html" class="Goodup-catg-wrap">
                        <div class="Goodup-catg-city">27 Cities</div>
                        <div class="Goodup-catg-icon"><i class="fas fa-basketball-ball"></i></div>
                        <div class="Goodup-catg-caption">
                            <h4 class="fs-md mb-0 ft-medium m-catrio">Active Life</h4>
                            <span class="text-muted">161 Listings</span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="cats-wrap text-center">
                    <a href="listing-search-v1.html" class="Goodup-catg-wrap">
                        <div class="Goodup-catg-city">26 Cities</div>
                        <div class="Goodup-catg-icon"><i class="fas fa-utensils"></i></div>
                        <div class="Goodup-catg-caption">
                            <h4 class="fs-md mb-0 ft-medium m-catrio">Restaurants</h4>
                            <span class="text-muted">172 Listings</span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="cats-wrap text-center">
                    <a href="listing-search-v1.html" class="Goodup-catg-wrap">
                        <div class="Goodup-catg-city">10 Cities</div>
                        <div class="Goodup-catg-icon"><i class="fas fa-book-open"></i></div>
                        <div class="Goodup-catg-caption">
                            <h4 class="fs-md mb-0 ft-medium m-catrio">Education</h4>
                            <span class="text-muted">144 Listings</span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="cats-wrap text-center">
                    <a href="listing-search-v1.html" class="Goodup-catg-wrap">
                        <div class="Goodup-catg-city">24 Cities</div>
                        <div class="Goodup-catg-icon"><i class="fas fa-house-damage"></i></div>
                        <div class="Goodup-catg-caption">
                            <h4 class="fs-md mb-0 ft-medium m-catrio">Real Estate</h4>
                            <span class="text-muted">210 Listings</span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="cats-wrap text-center">
                    <a href="listing-search-v1.html" class="Goodup-catg-wrap">
                        <div class="Goodup-catg-city">18 Cities</div>
                        <div class="Goodup-catg-icon"><i class="fas fa-wine-glass"></i></div>
                        <div class="Goodup-catg-caption">
                            <h4 class="fs-md mb-0 ft-medium m-catrio">Event Palnning</h4>
                            <span class="text-muted">241 Listings</span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="cats-wrap text-center">
                    <a href="listing-search-v1.html" class="Goodup-catg-wrap">
                        <div class="Goodup-catg-city">06 Cities</div>
                        <div class="Goodup-catg-icon"><i class="fas fa-car-alt"></i></div>
                        <div class="Goodup-catg-caption">
                            <h4 class="fs-md mb-0 ft-medium m-catrio">Automotive</h4>
                            <span class="text-muted">52 Listings</span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="cats-wrap text-center">
                    <a href="listing-search-v1.html" class="Goodup-catg-wrap">
                        <div class="Goodup-catg-city">08 Cities</div>
                        <div class="Goodup-catg-icon"><i class="fas fa-pencil-ruler"></i></div>
                        <div class="Goodup-catg-caption">
                            <h4 class="fs-md mb-0 ft-medium m-catrio">Art &amp; Design</h4>
                            <span class="text-muted">97 Listings</span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="cats-wrap text-center">
                    <a href="listing-search-v1.html" class="Goodup-catg-wrap">
                        <div class="Goodup-catg-city">05 Cities</div>
                        <div class="Goodup-catg-icon"><i class="fas fa-plane"></i></div>
                        <div class="Goodup-catg-caption">
                            <h4 class="fs-md mb-0 ft-medium m-catrio">Hotel & Travel</h4>
                            <span class="text-muted">42 Listings</span>
                        </div>
                    </a>
                </div>
            </div> --}}

        </div>
        <!-- row -->

    </div>
</section>
