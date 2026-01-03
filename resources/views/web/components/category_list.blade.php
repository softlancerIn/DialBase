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
            @foreach ($data['category'] as $c_data)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cats-wrap text-center">
                        <a href="{{ route('city.slug', $c_data->slug) }}" class="Goodup-catg-wrap">
                            @php
                                $listing_count = App\Models\Listing::where('category_id', $c_data->id)->groupBy('city')->get();
                            @endphp
                            <div class="Goodup-catg-city">{{$listing_count->count()}} Cities</div>
                            <div class="Goodup-catg-icon">
                                {!!$c_data->icon ?? '--' !!}
                            </div>
                            <div class="Goodup-catg-caption">
                                <h4 class="fs-md mb-0 ft-medium m-catrio">{{$c_data->name}}</h4>
                                <span class="text-muted">{{$c_data->listing_count}} Listings</span>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row justify-content-center md:mt-4">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
                <a href="{{ route('all_categories') }}" class="btn btn-md theme-bg rounded text-light">More Categories</a>
            </div>
        </div>
    </div>
</section>
