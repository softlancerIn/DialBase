@extends('web.layout.main')

@section('content')
    <!-- ======================= Search Results ======================== -->
    <section class="gray py-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                    <div class="bg-white rounded mb-4">
                        <div class="sidebar_header d-flex align-items-center justify-content-between px-4 py-3 br-bottom">
                            <h4 class="ft-medium fs-lg mb-0">Search Filter</h4>
                            <a href="{{ route('search') }}" class="ft-medium text-danger">Clear Filter</a>
                        </div>
                        <div class="sidebar-widgets">
                            <form method="GET" action="{{ route('search') }}">
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
                    <div class="row mb-4">
                        <div class="col-12">
                            <h4 class="mb-0">Search Results</h4>
                            @if (request()->has('name') && !empty(request('name')))
                                @if (request()->has('address') && !empty(request('address')))
                                    <p class="text-muted">Showing results for {{ request('name') }} in
                                        {{ request('address') }}</p>
                                @else
                                    <p class="text-muted">Showing results for {{ request('name') }}</p>
                                @endif
                            @elseif (request()->has('address') && !empty(request('address')))
                                <p class="text-muted">Showing results for {{ request('address') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        @if (isset($data['listings']) && $data['listings']->count() > 0)
                            @foreach ($data['listings'] as $listing)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                                    @include('web.components.category_details', ['listing' => $listing])
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center py-5">
                                <h5>No results found.</h5>
                            </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="row">
                            <div class="col-12">
                                {{ $data['listings']->links('pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================= Search Results End ======================== -->
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cities data map from controller
            const citiesMap = @json($data['cities']);
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
            if (stateSelect.value) {
                updateCities();
            }
        });
    </script>
@endsection
