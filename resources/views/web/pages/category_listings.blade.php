@extends('web.layout.main')

@section('content')
    <!-- ======================= Breadcrumb ======================== -->
    <div class="breadcrumb-wrap"
        style="background:#f41b3b url({{ asset('assets/img/banner-2.jpg') }}) no-repeat; background-size: 100%;"
        data-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="breadcrumb_caption text-center py-5">
                        <h1 class="page_title fw-bold fs-1 fs-md-2 fs-lg-1">All Categories</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mt-2" style="color: white;">
                                <li class=""><a href="{{ route('index') }}" style="color: white;">Home </a></li>
                                <li class="active" aria-current="page" style="color: white;"> / All Categories</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Breadcrumb End ======================== -->

    <!-- ======================= Category Section ======================== -->
    <section class="gray py-5">
        <div class="container">
            <div class="row align-items-center">
                @foreach ($all_category as $c_data)
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="cats-wrap text-center">
                            <a href="{{ route('city.slug', $c_data->slug) }}" class="Goodup-catg-wrap">
                                @php
                                    $listing_count = App\Models\Listing::where('category_id', $c_data->id)
                                        ->where('status', '1')
                                        ->groupBy('city')
                                        ->get();
                                @endphp
                                <div class="Goodup-catg-city">{{ $listing_count->count() }} Cities</div>
                                <div class="Goodup-catg-icon">
                                    {!! $c_data->icon ?? '--' !!}
                                </div>
                                <div class="Goodup-catg-caption">
                                    <h4 class="fs-md mb-0 ft-medium m-catrio">{{ $c_data->name }}</h4>
                                    <span class="text-muted">{{ $c_data->listing_count }} Listings</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ======================= Category Section End ======================== -->
@endsection
