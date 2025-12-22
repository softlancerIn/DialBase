@extends('web.layout.main')

@section('content')
    <!-- ======================= Breadcrumb ======================== -->
    <div class="breadcrumb-wrap" style="background:#f41b3b url({{ asset('assets/img/banner-2.jpg') }}) no-repeat;" data-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="breadcrumb_caption text-center py-5">
                        <h1 class="page_title ft-bold mb-4" style="font-size: 3rem;">{{ $data['category']->name ?? 'Cities' }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mt-2" style="color: white;">
                                <li class=""><a href="{{ route('index') }}" style="color: white;">Home </a></li>
                                <li class="active" aria-current="page" style="color: white;"> / {{ $data['category']->name ?? 'Cities' }}</li>
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
            <div class="row">
            @if(isset($data['city_listings']) && count($data['city_listings']) > 0)
                @foreach($data['city_listings'] as $city)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="cats-wrap text-center">
                        {{-- Link to category with location as path parameter --}}
                        <a href="{{ route('category.slug', [$data['category']->slug, $city->city]) }}" class="Goodup-catg-wrap">
                            <div class="Goodup-catg-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="Goodup-catg-caption">
                                <h4 class="fs-md mb-0 ft-medium m-catrio">{{$city->city}}</h4>
                                <span class="text-muted">{{$city->listing_count}} Listings</span>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12">
                <p class="text-center">No cities found.</p>
                </div>
            @endif
            </div>
        </div>
    </section>
    <!-- ======================= Category Section End ======================== -->
@endsection
