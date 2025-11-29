<x-admin.layout>
    <div class="goodup-dashboard-content p-0">
        <div class="dashboard-tlbar d-block mb-5">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <h1 class="ft-medium">Edit Listing</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                            <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="theme-cl">Edit Listing</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="dashboard-widg-bar d-block">
            <div class="row">
                <div class="col-xl-12 col-lg-2 col-md-12 col-sm-12">
                    <form action="{{ route('listing-data.update', $data['listing']->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="submit-form">
                            <!-- Listing Info -->
                            <div class="dashboard-list-wraps bg-white rounded mb-4">
                                <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                    <div class="dashboard-list-wraps-flx">
                                        <h4 class="mb-0 ft-medium fs-md"><i
                                                class="fa fa-file me-2 theme-cl fs-sm"></i>Listing Info</h4>
                                    </div>
                                </div>
                                <div class="dashboard-list-wraps-body py-3 px-3">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Listing Tile</label>
                                                <input type="text" class="form-control rounded"
                                                    placeholder="Decathlon Sport House" name="title" value="{{ old('title', $data['listing']->title) }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Categories</label>
                                                <select class="form-control" name="category_id">
                                                    <option value="" selected disabled>Select Category</option>
                                                    @foreach ($data['categories'] as $c_data)
                                                        <option value="{{ $c_data->id }}" {{ $data['listing']->category_id == $c_data->id ? 'selected' : '' }}>{{ $c_data->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Keywords</label>
                                                <input type="text" class="form-control rounded" name="keywords"
                                                    placeholder="Type keywords by comma's" value="{{ old('keywords', $data['listing']->keywords) }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">About Listing</label>
                                                <textarea class="form-control rounded ht-150" name="about"
                                                    placeholder="Describe your self">{{ old('about', $data['listing']->about) }}</textarea>
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
                                                <input type="text" class="form-control rounded" name="latitude"
                                                    placeholder="8054256" value="{{ old('latitude', $data['listing']->latitude) }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Longitude</label>
                                                <input type="text" class="form-control rounded" name="longitude"
                                                    placeholder="-7254625" value="{{ old('longitude', $data['listing']->longitude) }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27437.803590312993!2d76.75937213955079!3d30.726117899999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390feda9761bdc2f%3A0x5e764f7f18edc390!2sMidpoint%20Cafe!5e0!3m2!1sen!2sin!4v1649569611177!5m2!1sen!2sin"
                                                    class="full-width" height="300" style="border:0;" allowfullscreen=""
                                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">State</label>
                                                <select class="form-control" id="state" name="state">
                                                    <option value="" disabled>Select State</option>
                                                    @if(old('state', $data['listing']->state))
                                                        <option value="{{ old('state', $data['listing']->state) }}" selected>{{ old('state', $data['listing']->state) }}</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">City</label>
                                                <select class="form-control" id="city" name="city">
                                                    <option value="" disabled>Select City</option>
                                                    @if(old('city', $data['listing']->city))
                                                        <option value="{{ old('city', $data['listing']->city) }}" selected>{{ old('city', $data['listing']->city) }}</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Address</label>
                                                <input type="text" value="{{ old('address', $data['listing']->address) }}" class="form-control rounded" name="address"
                                                    placeholder="USA 20TH Berlin Market NY" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Zip Code</label>
                                                <input type="text" value="{{ old('zip_code', $data['listing']->zip_code) }}" class="form-control rounded" name="zip_code"
                                                    placeholder="HQ125478" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Mobile</label>
                                                <input type="text" class="form-control rounded"  value="{{ old('mobile', $data['listing']->mobile) }}" name="mobile"
                                                    placeholder="91 256 584 7895" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Email</label>
                                                <input type="text" class="form-control rounded"  value="{{ old('email', $data['listing']->email) }}" name="email"
                                                    placeholder="kumarsrikan@gmail.com" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Website</label>
                                                <input type="text" class="form-control rounded" value="{{ old('webiste', $data['listing']->webiste) }}" name="webiste"
                                                    placeholder="https://www.kuamrsrikant.com/" />
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
                                                class="fa fa-camera me-2 theme-cl fs-sm"></i>Image & Gallery Option</h4>
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
                                            <label class="smart-text">Maximum file size: 2 MB.</label>
                                        </div>

                                        @php
                                            $featuredImage = $data['listing']->images?->where('image_type', 'featured')->first() ?? null;
                                            $logoImage = $data['listing']->images?->where('image_type', 'logo')->first() ?? null;
                                        @endphp

                                        <!-- Featured Image -->
                                        <div class="col-lg-4 col-md-6">
                                            <label class="mb-1">Featured Image</label>
                                            @if($featuredImage)
                                                <div class="mb-3">
                                                    <img src="{{ asset('storage/' . $featuredImage->image_path) }}" alt="Gallery Image" style="max-width: 100px; max-height: 100px;">
                                                </div>
                                            @endif
                                            <input type="file" name="featured" class="form-control rounded">
                                        </div>

                                        <!-- Gallery -->
                                        <div class="col-lg-4 col-md-12">
                                            <label class="mb-1">Image Gallery</label>
                                            @if($logoImage)
                                                <div class="mb-3">
                                                    <img src="{{ asset('storage/' . $logoImage->image_path) }}" alt="Gallery Image" style="max-width: 100px; max-height: 100px;">
                                                </div>
                                            @endif
                                            <input type="file" name="gallery" class="form-control rounded">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Items -->
                            <div class="dashboard-list-wraps bg-white rounded mb-4">
                                <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                    <div class="dashboard-list-wraps-flx">
                                        <h4 class="mb-0 ft-medium fs-md"><i
                                                class="fas fa-utensils me-2 theme-cl fs-sm"></i>Menu Items</h4>
                                    </div>
                                </div>

                                <div class="dashboard-list-wraps-body py-3 px-3">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Item Name</label>
                                                <input type="text" class="form-control rounded" name="item_name"
                                                    placeholder="Spicy Brunchi Burger" />
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Category</label>
                                                <input type="text" class="form-control rounded" name="category"
                                                    placeholder="Fast Food" />
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Price</label>
                                                <input type="text" class="form-control rounded" name="price"
                                                    placeholder="ex. 49 USD" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">About Item</label>
                                                <textarea class="form-control rounded ht-80" name="about_item"
                                                    placeholder="Describe your Item"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                                                                <label for="formFileLg" class="form-label">Upload Item Image</label>
                                                <input class="form-control rounded" id="formFileLg" type="file"
                                                    name="item_image">
                                            </div>
                                        </div>
                                        {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <button type="button"
                                                    class="btn theme-cl rounded theme-bg-light ft-medium">Add
                                                    New</button>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                            <!-- Working hours -->
                            <div class="dashboard-list-wraps bg-white rounded mb-4">
                                <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                    <div class="dashboard-list-wraps-flx">
                                        <h4 class="mb-0 ft-medium fs-md"><i
                                        class="fa fa-clock me-2 theme-cl fs-sm"></i>Working Hours</h4>
                                    </div>
                                </div>

                                <div class="dashboard-list-wraps-body py-3 px-3">
                                    @php
                                        $wh = $data['listing']->workingHours->first();
                                        $open_times = $wh ? json_decode($wh->open_time, true) : [];
                                        $close_times = $wh ? json_decode($wh->close_time, true) : [];
                                        $days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
                                        $times = ['','1 :00 AM','2 :00 AM','3 :00 AM','4 :00 AM','5 :00 AM','6 :00 AM','7 :00 AM','8 :00 AM','9 :00 AM','10 :00 AM','11 :00 AM','12 :00 AM','1 :00 PM','2 :00 PM','3 :00 PM','4 :00 PM','5 :00 PM','6 :00 PM','7 :00 PM','8 :00 PM','9 :00 PM','10 :00 PM','11 :00 PM','12 :00 PM','Closed'];
                                    @endphp
                                    <div class="row">
                                        @foreach($days as $dIndex => $day)
                                            <div class="form-group w-100">
                                                <div class="row align-items-center">
                                                    <label class="control-label col-lg-2 col-md-2">{{ $day }}</label>
                                                    <div class="col-lg-5 col-md-5">
                                                        <select class="form-control chosen-select" name="working_hours[open_time][]">
                                                            <option value="">Opening Time</option>
                                                            @foreach($times as $t)
                                                                <option value="{{ $t }}" {{ (isset($open_times[$dIndex]) && $open_times[$dIndex] === $t) ? 'selected' : '' }}>{{ $t ?: 'Opening Time' }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-5 col-md-5">
                                                        <select class="form-control" name="working_hours[close_time][]">
                                                            <option value="">Closing Time</option>
                                                            @foreach($times as $t)
                                                                <option value="{{ $t }}" {{ (isset($close_times[$dIndex]) && $close_times[$dIndex] === $t) ? 'selected' : '' }}>{{ $t ?: 'Closing Time' }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        @php
                                            $wh = $data['listing']->workingHours->first();
                                            $open_times = $wh ? json_decode($wh->open_time, true) : [];
                                            $close_times = $wh ? json_decode($wh->close_time, true) : [];
                                        @endphp
                                        <div class="form-group mt-4">
                                            <input id="t24" class="checkbox-custom" name="t24" type="checkbox" value="1" {{ $data['listing']->t24 ? 'checked' : '' }}>
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
                                                class="lni lni-coffee-cup me-2 theme-cl fs-sm"></i>Amenties Options</h4>
                                    </div>
                                </div>

                                <div class="dashboard-list-wraps-body py-3 px-3">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="Goodup-all-features-list">
                                                <ul>
                                                    @php
                                                        $staticAmenities = [
                                                            'Health Score 8.7 / 10',
                                                            'Reservations',
                                                            'Vegetarian Options',
                                                            'Moderate Noise',
                                                            'Good For Kids',
                                                            'Private Lot Parking',
                                                            'Beer & Wine',
                                                            'TV Services',
                                                            'Pets Allow',
                                                            'Offers Delivery',
                                                            'Staff wears masks',
                                                            'Accepts Credit Cards',
                                                            'Offers Catering',
                                                            'Good for Breakfast',
                                                            'Waiter Service',
                                                            'Drive-Thru',
                                                            'Outdoor Seating',
                                                            'Offers Takeout',
                                                            'Vegan Options',
                                                            'Casual',
                                                            'Good for Groups',
                                                            'Brunch, Lunch, Dinner',
                                                            'Free Wi-Fi',
                                                            'Wheelchair Accessible',
                                                            'Happy Hour',
                                                        ];
                                                    @endphp

                                                    @foreach($staticAmenities as $index => $label)
                                                        <li>
                                                            <input id="am{{ $index+1 }}" class="checkbox-custom" name="am{{ $index+1 }}" type="checkbox">
                                                            <label for="am{{ $index+1 }}" class="checkbox-custom-label">{{ $label }}</label>
                                                        </li>
                                                    @endforeach
                                                </ul>
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
                                                    placeholder="https://facebook.com/" value="{{ old('facebook', optional($data['listing']->socialLink)->facebook) }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1"><i
                                                        class="ti-twitter theme-cl me-1"></i>Twitter</label>
                                                <input type="text" class="form-control rounded" name="twitter"
                                                    placeholder="https://twitter.com/" value="{{ old('twitter', optional($data['listing']->socialLink)->twitter) }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1"><i
                                                        class="ti-instagram theme-cl me-1"></i>Instagram</label>
                                                <input type="text" class="form-control rounded" name="instagram"
                                                    placeholder="https://instagram.com/" value="{{ old('instagram', optional($data['listing']->socialLink)->instagram) }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1"><i
                                                        class="ti-linkedin theme-cl me-1"></i>Linkedin</label>
                                                <input type="text" class="form-control rounded" name="linkedin"
                                                    placeholder="https://linkedin.com/" value="{{ old('linkedin', optional($data['listing']->socialLink)->linkedin) }}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn theme-bg rounded text-light">Update</button>
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
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const stateDropdown = document.getElementById('state');
                const cityDropdown = document.getElementById('city');

                // Fetch states from GeoNames API
                fetch('https://api.countrystatecity.in/v1/countries/IN/states', {
                    headers: {
                        "X-CSCAPI-KEY": "demo"
                    }
                })
                .then(response => response.json())
                .then(states => {
                    states.forEach(state => {
                        const option = document.createElement('option');
                        option.value = state.iso2;
                        option.textContent = state.name;
                        stateDropdown.appendChild(option);
                    });
                });

                // Fetch cities based on selected state
                stateDropdown.addEventListener('change', function () {
                    const selectedState = this.value;

                    // Clear previous cities
                    cityDropdown.innerHTML = '<option value="" selected disabled>Select City</option>';

                    fetch(`https://api.countrystatecity.in/v1/countries/IN/states/${selectedState}/cities`, {
                        headers: {
                            "X-CSCAPI-KEY": "demo"
                        }
                    })
                    .then(response => response.json())
                    .then(cities => {
                        cities.forEach(city => {
                            const option = document.createElement('option');
                            option.value = city.name;
                            option.textContent = city.name;
                            cityDropdown.appendChild(option);
                        });
                    });
                });
            });
        </script>
</x-admin.layout>