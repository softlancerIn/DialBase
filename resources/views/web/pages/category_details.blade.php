@extends('web.layout.main')

@section('content')
    <!-- ======================= Breadcrumb ======================== -->
    <div class="breadcrumb-wrap" style="background:#f41b3b url({{ asset('assets/img/banner-2.jpg') }}) no-repeat; background-size: 100%;" data-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="breadcrumb_caption text-center py-5">
                        @php
                            $currentLocation = request()->route('location') ?? request('location');
                        @endphp
                        <h1 class="page_title fw-bold fs-1 fs-md-2 fs-lg-1">
                            {{ $data['category']->name ?? 'Category' }}
                            {{ !empty($currentLocation) ? 'In ' . $currentLocation : '' }}
                        </h1>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mt-2" style="color: white;">
                                <li class=""><a href="{{ route('index') }}" style="color: white;">Home </a></li>
                                <li class="active" aria-current="page" style="color: white;"> / {{ $data['category']->name ?? 'Category' }}</li>
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
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                    <div class="bg-white rounded mb-4">
                    
                        <div class="sidebar_header d-flex align-items-center justify-content-between px-4 py-3 br-bottom">
                            <h4 class="ft-medium fs-lg mb-0">Search Filter</h4>
                            <div class="ssh-header">
                                <a href="{{ route('category.slug', $data['category']->slug) }}" class="clear_all ft-medium text-muted">Clear All</a>
                                <a href="#search_open" data-bs-toggle="collapse" aria-expanded="false" role="button" class="collapsed _filter-ico ml-2"><i class="lni lni-text-align-right"></i></a>
                            </div>
                        </div>
                        
                        <!-- Filter Form -->
                        <div class="sidebar-widgets collapse miz_show" id="search_open" data-bs-parent="#search_open">
                            <div class="search-inner">
                                <form method="GET" action="{{ route('category.slug', $data['category']->slug) }}" id="categoryFilterForm">
                                    <div class="side-filter-box">
                                        <div class="side-filter-box-body">

                                            <!-- Open/Close -->
                                            <div class="inner_widget_link">
                                                <h6 class="ft-medium">Availability</h6>
                                                <ul class="no-ul-list filter-list">
                                                    <li>
                                                        <input id="open_now_filter" class="checkbox-custom" name="open_now" type="checkbox" value="1" {{ request('open_now') ? 'checked' : '' }}>
                                                        <label for="open_now_filter" class="checkbox-custom-label">Open Now</label>
                                                    </li>
                                                </ul>
                                            </div>
                                            
                                            <!-- Location -->
                                            @if(!empty($data['locations']) && $data['locations']->count() > 0)
                                            <div class="inner_widget_link">
                                                <h6 class="ft-medium">Location</h6>
                                                <select name="location" class="form-control">
                                                    <option value="">All Locations</option>
                                                    @foreach($data['locations'] as $location)
                                                        <option value="{{ $location }}" {{ ($currentLocation == $location) ? 'selected' : '' }}>{{ $location }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @endif
                                            
                                            <div class="form-group filter_button">
                                                <button type="submit" class="btn theme-bg text-light rounded full-width">Apply Filter</button>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>							
                        </div>
                    </div>
                </div>

                {{-- Ensure form action uses path parameter for location when submitted --}}
                <script>
                    (function () {
                        var form = document.getElementById('categoryFilterForm');
                        if (!form) return;
                        form.addEventListener('submit', function (e) {
                            var select = form.querySelector('select[name="location"]');
                            if (select && select.value) {
                                // Append the selected location to the form action as a path param
                                var action = form.action.replace(/\/+$/, '');
                                form.action = action + '/' + encodeURIComponent(select.value);
                            }
                        });
                    })();
                </script>

                <div class="col-xl-9 col-lg-8 col-md-12">
                    <div class="row">
                        <div>
                            <p class="text-dark fs-md">{{ $data['category']->description ?? '' }}</p>
                        </div>
                        @if ($data['listings'] && $data['listings']->count() > 0)
                            @foreach ($data['listings'] as $listing)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                                    @include('web.components.category_details', ['listing' => $listing])
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center py-5">
                                <h5>No listings found in this category.</h5>
                            </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="row mt-5 mb-5">
                            <div class="col-12">
                                {{ $data['listings']->links('pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================= Category Section End ======================== -->
@endsection
