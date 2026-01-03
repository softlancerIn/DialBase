@extends('web.layout.main')

@section('content')
    <!-- ======================= Breadcrumb ======================== -->
    <div class="breadcrumb-wrap" style="background:#f41b3b url({{ asset('assets/img/banner-2.jpg') }}) no-repeat;" data-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="breadcrumb_caption text-center py-5">
                        <h1 class="page_title fw-bold fs-1 fs-md-2 fs-lg-1">All Listings</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mt-2" style="color: white;">
                                <li class=""><a href="{{ route('index') }}" style="color: white;">Home </a></li>
                                <li class="active" aria-current="page" style="color: white;"> / All Listings</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Breadcrumb End ======================== -->

    <!-- ======================= Listings Section ======================== -->
    <section class="gray py-5">
        <div class="container">
            <div class="row justify-content-center">
                @foreach(($listings ?? []) as $listing)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="gup_blg_grid_box">
                            
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="row mt-5 mb-5">
        <div class="col-12">
            {{ $listings>links('pagination.custom') }}
        </div>
    </div>
    <!-- ======================= Category Section End ======================== -->
@endsection
