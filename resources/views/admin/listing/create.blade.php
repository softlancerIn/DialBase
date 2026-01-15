<x-admin.layout>
    <div class="goodup-dashboard-content p-0">
        <div class="dashboard-tlbar d-block mb-5">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <h1 class="ft-medium">Add Listing</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                            <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="theme-cl">Add Listing</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dashboard-widg-bar d-block">
            <div class="row">
                <div class="col-xl-12 col-lg-2 col-md-12 col-sm-12">
                    <form action="{{ route('listing-data.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if (session('message') || session('error'))
                            <div class="alert alert-warning">{{ session('message') ?? session('error') }}</div>
                        @endif
                        <div class="submit-form">
                            <!-- Listing Info -->
                            <div class="dashboard-list-wraps bg-white rounded mb-4">
                                <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                    <div class="dashboard-list-wraps-flx">
                                        <h4 class="mb-0 ft-medium fs-md">
                                            <i class="fa fa-file me-2 theme-cl fs-sm"></i>Listing Info
                                        </h4>
                                    </div>
                                </div>
                                <div class="dashboard-list-wraps-body py-3 px-3">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Listing Tile</label>
                                                <input type="text"
                                                    class="form-control rounded @error('title') is-invalid @enderror"
                                                    placeholder="Decathlon Sport House" name="title"
                                                    value="{{ old('title') }}" />
                                                @error('title')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Categories</label>
                                                <select class="form-control @error('category_id') is-invalid @enderror"
                                                    name="category_id">
                                                    <option value="" selected disabled>Select Category</option>
                                                    @foreach ($data['category'] as $c_data)
                                                        <option value="{{ $c_data->id }}"
                                                            {{ old('category_id') == $c_data->id ? 'selected' : '' }}>
                                                            {{ $c_data->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Keywords</label>
                                                <input type="text"
                                                    class="form-control rounded @error('keywords') is-invalid @enderror"
                                                    name="keywords" placeholder="Type keywords by comma's"
                                                    value="{{ old('keywords') }}" />
                                                @error('keywords')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">About Listing</label>
                                                <textarea class="form-control rounded ht-150 @error('about') is-invalid @enderror" name="about"
                                                    placeholder="Describe your self">{{ old('about') }}</textarea>
                                                @error('about')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Sort Order -->
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Sort Order</label>
                                                <input type="number" class="form-control rounded" name="sort_order"
                                                    placeholder="Sort Order (Higher goes first)" />
                                                @error('sort_order')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group mt-4">
                                                <input id="status" class="checkbox-custom" name="status"
                                                    type="checkbox" value="1" checked>
                                                <label for="status" class="checkbox-custom-label">Status</label>
                                                <small class="form-text text-muted">Enable to make listing
                                                    active.</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Location Info -->
                            <div class="dashboard-list-wraps bg-white rounded mb-4">
                                <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                    <div class="dashboard-list-wraps-flx">
                                        <h4 class="mb-0 ft-medium fs-md"><i
                                                class="fas fa-map-marker-alt me-2 theme-cl fs-sm"></i>Location Info</h4>
                                    </div>
                                </div>

                                <div class="dashboard-list-wraps-body py-3 px-3">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Latitude</label>
                                                <input id="latitude" type="text"
                                                    class="form-control rounded @error('latitude') is-invalid @enderror"
                                                    name="latitude" placeholder="8054256" step="any"
                                                    value="{{ old('latitude') }}" />
                                                @error('latitude')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Longitude</label>
                                                <input id="longitude" type="text"
                                                    class="form-control rounded @error('longitude') is-invalid @enderror"
                                                    name="longitude" placeholder="-7254625" step="any"
                                                    value="{{ old('longitude') }}" />
                                                @error('longitude')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Map location (drag pin to update coords)</label>
                                                <div class="d-flex mb-2 gap-2">
                                                    <button type="button" id="use-location-btn"
                                                        class="btn btn-sm btn-outline-primary">Use my location</button>
                                                    <div id="map-error" class="alert alert-warning mb-0"
                                                        style="display:none; padding: .35rem .5rem;">Map failed to load
                                                    </div>
                                                </div>
                                                <div id="listing-map"
                                                    style="width:100%;height:300px;border:1px solid #e6e6e6;border-radius:4px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">State</label>
                                                <select id="state"
                                                    class="form-control @error('state') is-invalid @enderror"
                                                    name="state" onchange="updateCities()">
                                                    <option value="" disabled selected>Select State</option>
                                                    @foreach ($data['states'] as $state)
                                                        <option value="{{ $state }}"
                                                            {{ old('state') == $state ? 'selected' : '' }}>
                                                            {{ $state }}</option>
                                                    @endforeach
                                                </select>
                                                @error('state')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">City</label>
                                                <select id="city"
                                                    class="form-control @error('city') is-invalid @enderror"
                                                    name="city">
                                                    <option value="" disabled selected>Select City</option>
                                                </select>
                                                @error('city')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Address</label>
                                                <input type="text" value="{{ old('address') }}"
                                                    class="form-control rounded @error('address') is-invalid @enderror"
                                                    name="address" placeholder="USA 20TH Berlin Market NY" />
                                                @error('address')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Zip Code</label>
                                                <input type="text" value="{{ old('zip_code') }}"
                                                    class="form-control rounded @error('zip_code') is-invalid @enderror"
                                                    name="zip_code" placeholder="HQ125478" />
                                                @error('zip_code')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Mobile</label>
                                                <input type="text"
                                                    class="form-control rounded @error('mobile') is-invalid @enderror"
                                                    value="{{ old('mobile') }}" name="mobile"
                                                    placeholder="91 256 584 7895" />
                                                @error('mobile')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Email</label>
                                                <input type="email"
                                                    class="form-control rounded @error('email') is-invalid @enderror"
                                                    value="{{ old('email') }}" name="email"
                                                    placeholder="kumarsrikan@gmail.com" />
                                                @error('email')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Website</label>
                                                <input type="url"
                                                    class="form-control rounded @error('website') is-invalid @enderror"
                                                    value="{{ old('website') }}" name="website"
                                                    placeholder="https://www.kuamrsrikant.com/" />
                                                @error('website')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Is Featured Checkbox -->
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group mt-4">
                                                <input id="is_featured" class="checkbox-custom" name="is_featured"
                                                    type="checkbox" value="1"
                                                    {{ old('is_featured') ? 'checked' : '' }}>
                                                <label for="is_featured" class="checkbox-custom-label">Mark as
                                                    Featured</label>
                                                <small class="form-text text-muted">If checked, this listing will be
                                                    marked as featured.</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Image & Gallery Option -->
                            <div class="dashboard-list-wraps bg-white rounded mb-4">
                                <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                    <div class="dashboard-list-wraps-flx">
                                        <h4 class="mb-0 ft-medium fs-md"><i
                                                class="fa fa-camera me-2 theme-cl fs-sm"></i>Image & Gallery Option
                                        </h4>
                                    </div>
                                </div>

                                <div class="dashboard-list-wraps-body py-3 px-3">
                                    <div class="row">
                                        <!-- Logo -->
                                        <div class="col-lg-4 col-md-6">
                                            <label class="mb-1">Upload Logo</label>
                                            <form action="https://shreethemes.net/file-upload" class="dropzone"
                                                id="single-logo">
                                                <i class="fas fa-upload"></i>
                                            </form>
                                            @error('logo')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                            <label class="smart-text">Maximum file size: 2 MB.</label>
                                        </div>

                                        <!-- Featured Image -->
                                        <div class="col-lg-4 col-md-6">
                                            <label class="mb-1">Featured Image</label>
                                            <input type="file" name="featured"
                                                class="form-control rounded @error('featured') is-invalid @enderror"
                                                accept="image/*">
                                            @error('featured')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Gallery -->
                                        <div class="col-lg-4 col-md-12">
                                            <label class="mb-1">Image Gallery</label>
                                            <input type="file" name="gallery"
                                                class="form-control rounded @error('gallery') is-invalid @enderror"
                                                accept="image/*">
                                            @error('gallery')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Working hours -->
                            <div class="dashboard-list-wraps bg-white rounded mb-4">
                                <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                    <div class="dashboard-list-wraps-flx">
                                        <h4 class="mb-0 ft-medium fs-md">
                                            <i class="fa fa-clock me-2 theme-cl fs-sm"></i>Working Hours
                                        </h4>
                                    </div>
                                </div>

                                <div class="dashboard-list-wraps-body py-3 px-3">
                                    @php
                                        $open_times = old('working_hours.open_time', []);
                                        $close_times = old('working_hours.close_time', []);
                                        $days = [
                                            'Monday',
                                            'Tuesday',
                                            'Wednesday',
                                            'Thursday',
                                            'Friday',
                                            'Saturday',
                                            'Sunday',
                                        ];
                                        $times = [
                                            '1 :00 AM',
                                            '2 :00 AM',
                                            '3 :00 AM',
                                            '4 :00 AM',
                                            '5 :00 AM',
                                            '6 :00 AM',
                                            '7 :00 AM',
                                            '8 :00 AM',
                                            '9 :00 AM',
                                            '10 :00 AM',
                                            '11 :00 AM',
                                            '12 :00 AM',
                                            '1 :00 PM',
                                            '2 :00 PM',
                                            '3 :00 PM',
                                            '4 :00 PM',
                                            '5 :00 PM',
                                            '6 :00 PM',
                                            '7 :00 PM',
                                            '8 :00 PM',
                                            '9 :00 PM',
                                            '10 :00 PM',
                                            '11 :00 PM',
                                            '12 :00 PM',
                                            'Closed',
                                        ];
                                    @endphp

                                    <div class="row gap-y-3">
                                        @foreach ($days as $dIndex => $day)
                                            <div class="form-group w-100">
                                                <div class="row align-items-center">
                                                    <label
                                                        class="control-label col-lg-2 col-md-2">{{ $day }}</label>
                                                    <div class="col-lg-5 col-md-5">
                                                        <select class="form-control chosen-select"
                                                            name="working_hours[open_time][]">
                                                            <option value="">Opening Time</option>
                                                            @foreach ($times as $t)
                                                                <option value="{{ $t }}"
                                                                    {{ isset($open_times[$dIndex]) && $open_times[$dIndex] === $t ? 'selected' : '' }}>
                                                                    {{ $t ?: 'Opening Time' }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-5 col-md-5">
                                                        <select class="form-control"
                                                            name="working_hours[close_time][]">
                                                            <option value="">Closing Time</option>
                                                            @foreach ($times as $t)
                                                                <option value="{{ $t }}"
                                                                    {{ isset($close_times[$dIndex]) && $close_times[$dIndex] === $t ? 'selected' : '' }}>
                                                                    {{ $t ?: 'Closing Time' }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="form-group mt-4">
                                            <input id="t24" class="checkbox-custom" name="is_247_open"
                                                type="checkbox" value="1"
                                                {{ old('is_247_open') ? 'checked' : '' }}>
                                            <label for="t24" class="checkbox-custom-label">This Business open
                                                7x24</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Amenties Options -->
                            <div class="dashboard-list-wraps bg-white rounded mb-4">
                                <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                    <div class="dashboard-list-wraps-flx">
                                        <h4 class="mb-0 ft-medium fs-md"><i
                                                class="lni lni-coffee-cup me-2 theme-cl fs-sm"></i>Amenties Options
                                        </h4>
                                    </div>
                                </div>

                                <div class="dashboard-list-wraps-body py-3 px-3">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="Goodup-all-features-list">
                                                <ul>
                                                    @php $selectedAmenityIds = old('amenities', []); @endphp
                                                    @foreach ($data['all_amenities'] as $amenity)
                                                        <li>
                                                            <input id="amenity-{{ $amenity->id }}"
                                                                class="checkbox-custom" name="amenities[]"
                                                                type="checkbox" value="{{ $amenity->id }}"
                                                                {{ in_array($amenity->id, $selectedAmenityIds) ? 'checked' : '' }}>
                                                            <label for="amenity-{{ $amenity->id }}"
                                                                class="checkbox-custom-label">{{ $amenity->name }}</label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label class="mb-1">Add New Amenities (comma-separated)</label>
                                                <input type="text" class="form-control rounded"
                                                    name="new_amenities" placeholder="e.g. Free Parking, Live Music"
                                                    value="{{ old('new_amenities') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Social Links -->
                            <div class="dashboard-list-wraps bg-white rounded mb-4">
                                <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                    <div class="dashboard-list-wraps-flx">
                                        <h4 class="mb-0 ft-medium fs-md"><i
                                                class="fa fa-user-friends me-2 theme-cl fs-sm"></i>Social Links</h4>
                                    </div>
                                </div>

                                <div class="dashboard-list-wraps-body py-3 px-3">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1"><i
                                                        class="ti-facebook theme-cl me-1"></i>Facebook</label>
                                                <input type="text" class="form-control rounded" name="facebook"
                                                    placeholder="https://facebook.com/" />
                                            </div>
                                        </div>
                                        {{-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1"><i
                                                        class="ti-twitter theme-cl me-1"></i>Twitter</label>
                                                <input type="text" class="form-control rounded" name="twitter"
                                                    placeholder="https://twitter.com/" />
                                            </div>
                                        </div> --}}
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1"><i
                                                        class="ti-instagram theme-cl me-1"></i>Instagram</label>
                                                <input type="text" class="form-control rounded" name="instagram"
                                                    placeholder="https://instagram.com/" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1"><i
                                                        class="ti-linkedin theme-cl me-1"></i>Linkedin</label>
                                                <input type="text" class="form-control rounded" name="linkedin"
                                                    placeholder="https://linkedin.com/" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1"><i
                                                        class="ti-youtube theme-cl me-1"></i>Youtube</label>
                                                <input type="text" class="form-control rounded" name="youtube"
                                                    placeholder="https://youtube.com/" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn theme-bg rounded text-light">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- Leaflet CSS/JS for interactive map -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize the interactive map and sync with lat/lng inputs
                const latInput = document.getElementById('latitude');
                const lngInput = document.getElementById('longitude');

                const defaultLat = 20.5937; // India center fallback
                const defaultLng = 78.9629;

                const lat = parseFloat(latInput.value) || defaultLat;
                const lng = parseFloat(lngInput.value) || defaultLng;

                try {
                    if (typeof L === 'undefined') throw new Error('Leaflet not loaded');

                    const map = L.map('listing-map').setView([lat, lng], 13);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; OpenStreetMap contributors'
                    }).addTo(map);

                    const marker = L.marker([lat, lng], {
                        draggable: true
                    }).addTo(map);

                    // When marker dragged, update inputs
                    marker.on('dragend', function() {
                        const pos = marker.getLatLng();
                        latInput.value = pos.lat.toFixed(6);
                        lngInput.value = pos.lng.toFixed(6);
                    });

                    // Click on map to move marker
                    map.on('click', function(e) {
                        marker.setLatLng(e.latlng);
                        latInput.value = e.latlng.lat.toFixed(6);
                        lngInput.value = e.latlng.lng.toFixed(6);
                    });

                    // When inputs change, update marker
                    function updateMarkerFromInputs() {
                        const newLat = parseFloat(latInput.value);
                        const newLng = parseFloat(lngInput.value);
                        if (!isNaN(newLat) && !isNaN(newLng)) {
                            marker.setLatLng([newLat, newLng]);
                            map.setView([newLat, newLng]);
                        }
                    }

                    latInput.addEventListener('change', updateMarkerFromInputs);
                    lngInput.addEventListener('change', updateMarkerFromInputs);

                    // Use browser geolocation
                    const useBtn = document.getElementById('use-location-btn');
                    useBtn.addEventListener('click', function() {
                        if (!navigator.geolocation) {
                            showMapError('Geolocation not supported');
                            return;
                        }
                        navigator.geolocation.getCurrentPosition(function(pos) {
                            const pLat = pos.coords.latitude;
                            const pLng = pos.coords.longitude;
                            marker.setLatLng([pLat, pLng]);
                            map.setView([pLat, pLng], 13);
                            latInput.value = pLat.toFixed(6);
                            lngInput.value = pLng.toFixed(6);
                        }, function(err) {
                            showMapError('Unable to get location: ' + (err.message || err.code));
                        });
                    });
                } catch (err) {
                    console.error('Map init error', err);
                    showMapError(err.message || 'Map initialization failed');
                }

                function showMapError(msg) {
                    const el = document.getElementById('map-error');
                    if (el) {
                        el.style.display = 'block';
                        el.textContent = 'Map failed to load: ' + msg;
                    } else {
                        alert('Map failed to load: ' + msg);
                    }
                }

                // Cities data map from controller (global scope)
                const citiesMap = @json($data['cities']);

                // Update cities dropdown based on selected state (global scope)
                function updateCities() {
                    const stateSelect = document.getElementById('state');
                    const citySelect = document.getElementById('city');
                    const selectedState = stateSelect ? stateSelect.value : null;

                    // Clear cities dropdown
                    if (!citySelect) return;
                    citySelect.innerHTML = '<option value="" disabled selected>Select City</option>';

                    if (selectedState && citiesMap[selectedState]) {
                        citiesMap[selectedState].forEach(city => {
                            const option = document.createElement('option');
                            option.value = city;
                            option.textContent = city;
                            option.selected = city === '{{ old('city') }}' ? true : false;
                            citySelect.appendChild(option);
                        });
                    }
                }

                // Expose updater globally so inline handlers work
                window.updateCities = updateCities;

                // Initialize cities on page load if state is already selected
                const stateSelect = document.getElementById('state');
                if (stateSelect && stateSelect.value) {
                    updateCities();
                }
                if (stateSelect) stateSelect.addEventListener('change', updateCities);
            });
        </script>
</x-admin.layout>
