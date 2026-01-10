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
                                <li class="active" aria-current="page" style="color: white;"> /
                                    {{ $data['category']->name ?? 'Category' }}</li>
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
                            <a href="{{ route('category.slug', $data['category']->slug) }}"
                                class="ft-medium text-danger">Clear Filter</a>
                        </div>

                        <!-- Filter Form -->
                        <div class="sidebar-widgets">
                            <form method="GET" action="{{ route('category.slug', $data['category']->slug) }}">
                                <div class="side-filter-box-body px-3 py-3">
                                    <div class="form-group mb-3">
                                        <label class="small">Name</label>
                                        <input name="name" value="{{ request('name') }}" class="form-control" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="small">State</label>
                                        <select name="state" id="state" class="form-control"
                                            onchange="updateCities()">
                                            <option value="">All States</option>
                                            @if (!empty($data['states']) && $data['states']->count() > 0)
                                                @foreach ($data['states'] as $state)
                                                    <option value="{{ $state }}"
                                                        {{ request('state') == $state ? 'selected' : '' }}>
                                                        {{ $state }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="small">City</label>
                                        <select name="city" id="city" class="form-control">
                                            <option value="">All Cities</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input id="open_now" class="checkbox-custom" name="open_now" type="checkbox"
                                            value="1" {{ request('open_now') ? 'checked' : '' }}>
                                        <label for="open_now" class="checkbox-custom-label">Open Now</label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input id="featured" class="checkbox-custom" name="featured" type="checkbox"
                                            value="1" {{ request('featured') ? 'checked' : '' }}>
                                        <label for="featured" class="checkbox-custom-label">Featured</label>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn theme-bg text-light full-width">Apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

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
                        <div class="col-12">
                            {{ $data['listings']->links('pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================= Category Section End ======================== -->
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cities data map from controller
            const citiesMap = @json($data['cities'] ?? []);
            const currentCity = "{{ request('city') }}";

            // Update cities dropdown based on selected state
            window.updateCities = function() {
                const stateSelect = document.getElementById('state');
                const citySelect = document.getElementById('city');
                const selectedState = stateSelect.value;

                // Clear cities dropdown
                citySelect.innerHTML = '<option value="">All Cities</option>';

                if (selectedState && citiesMap[selectedState]) {
                    citiesMap[selectedState].forEach(city => {
                        const option = document.createElement('option');
                        option.value = city;
                        option.textContent = city;
                        if (city === currentCity) {
                            option.selected = true;
                        }
                        citySelect.appendChild(option);
                    });
                }
            }

            // Initialize cities on page load if state is already selected
            const stateSelect = document.getElementById('state');
            if (stateSelect && stateSelect.value) {
                updateCities();
            }
        });
    </script>
@endsection
