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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
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
                                                    placeholder="Decathlon Sport House" name="title" />
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
                                                        <option value="{{ $c_data->id }}">{{ $c_data->name }}</option>
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
                                                <input type="text" class="form-control rounded" name="keywords"
                                                    placeholder="Type keywords by comma's" />
                                                @error('keywords')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">About Listing</label>
                                                <textarea class="form-control rounded ht-150" name="about" placeholder="Describe your self"></textarea>
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
                                                <input id="latitude" type="text" class="form-control rounded" name="latitude"
                                                    placeholder="8054256" value="{{ old('latitude') }}" />
                                                @error('latitude')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Longitude</label>
                                                <input id="longitude" type="text" class="form-control rounded" name="longitude"
                                                    placeholder="-7254625" value="{{ old('longitude') }}" />
                                                @error('longitude')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Map location (drag pin to update coords)</label>
                                                <div class="d-flex mb-2 gap-2">
                                                    <button type="button" id="use-location-btn" class="btn btn-sm btn-outline-primary">Use my location</button>
                                                    <div id="map-error" class="alert alert-warning mb-0" style="display:none; padding: .35rem .5rem;">Map failed to load</div>
                                                </div>
                                                <div id="listing-map" style="width:100%;height:300px;border:1px solid #e6e6e6;border-radius:4px"></div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">State</label>
                                                <select id="state" class="form-control @error('state') is-invalid @enderror" name="state" onchange="updateCities()">
                                                    <option value="" disabled selected>Select State</option>
                                                    @foreach ($data['states'] as $state)
                                                        <option value="{{ $state }}" {{ old('state') == $state ? 'selected' : '' }}>{{ $state }}</option>
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
                                                <select id="city" class="form-control @error('city') is-invalid @enderror" name="city">
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
                                                <input type="text" class="form-control rounded" name="address"
                                                    placeholder="USA 20TH Berlin Market NY" />
                                                @error('address')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Zip Code</label>
                                                <input type="text" class="form-control rounded" name="zip_code"
                                                    placeholder="HQ125478" />
                                                @error('zip_code')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Mobile</label>
                                                <input type="text" class="form-control rounded" name="mobile"
                                                    placeholder="91 256 584 7895" />
                                                @error('mobile')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Email</label>
                                                <input type="text" class="form-control rounded" name="email"
                                                    placeholder="kumarsrikan@gmail.com" />
                                                @error('email')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">Website</label>
                                                <input type="text" class="form-control rounded" name="website"
                                                    placeholder="https://www.kuamrsrikant.com/" />
                                                @error('website')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Is Featured Checkbox -->
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group mt-4">
                                                <input id="is_featured" class="checkbox-custom" name="is_featured" type="checkbox" value="1">
                                                <label for="is_featured" class="checkbox-custom-label">Mark as Featured</label>
                                                <small class="form-text text-muted">If checked, this listing will be marked as featured.</small>
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
                                            <label class="smart-text">Maximum file size: 2 MB.</label>
                                        </div>

                                        <!-- Featured Image -->
                                        <div class="col-lg-4 col-md-6">
                                            <label class="mb-1">Featured Image</label>
                                            <input type="file" name="featured_image" class="form-control rounded">
                                        </div>

                                        <!-- Gallery -->
                                        <div class="col-lg-4 col-md-12">
                                            <label class="mb-1">logo</label>
                                            <input type="file" name="logo" class="form-control rounded">
                                        </div>
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
                                    <div class="form-group">
                                        <div class="row align-items-center">
                                            <label class="control-label col-lg-2 col-md-2">Monday</label>
                                            <div class="col-lg-5 col-md-5">
                                                <select class="form-control chosen-select"
                                                    name="working_hours[open_time][]">
                                                    <option>Opening Time</option>
                                                    <option>1 :00 AM</option>
                                                    <option>2 :00 AM</option>
                                                    <option>3 :00 AM</option>
                                                    <option>4 :00 AM</option>
                                                    <option>5 :00 AM</option>
                                                    <option>6 :00 AM</option>
                                                    <option>7 :00 AM</option>
                                                    <option>8 :00 AM</option>
                                                    <option>9 :00 AM</option>
                                                    <option>10 :00 AM</option>
                                                    <option>11 :00 AM</option>
                                                    <option>12 :00 AM</option>
                                                    <option>1 :00 PM</option>
                                                    <option>2 :00 PM</option>
                                                    <option>3 :00 PM</option>
                                                    <option>4 :00 PM</option>
                                                    <option>5 :00 PM</option>
                                                    <option>6 :00 PM</option>
                                                    <option>7 :00 PM</option>
                                                    <option>8 :00 PM</option>
                                                    <option>9 :00 PM</option>
                                                    <option>10 :00 PM</option>
                                                    <option>11 :00 PM</option>
                                                    <option>12 :00 PM</option>
                                                    <option>Closed</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-5 col-md-5">
                                                <select class="form-control" name="working_hours[close_time][]">
                                                        <option>Closing Time</option>
                                                        <option>1 :00 AM</option>
                                                        <option>2 :00 AM</option>
                                                        <option>3 :00 AM</option>
                                                        <option>4 :00 AM</option>
                                                        <option>5 :00 AM</option>
                                                        <option>6 :00 AM</option>
                                                        <option>7 :00 AM</option>
                                                        <option>8 :00 AM</option>
                                                        <option>9 :00 AM</option>
                                                        <option>10 :00 AM</option>
                                                        <option>11 :00 AM</option>
                                                        <option>12 :00 AM</option>
                                                        <option>1 :00 PM</option>
                                                        <option>2 :00 PM</option>
                                                        <option>3 :00 PM</option>
                                                        <option>4 :00 PM</option>
                                                        <option>5 :00 PM</option>
                                                        <option>6 :00 PM</option>
                                                        <option>7 :00 PM</option>
                                                        <option>8 :00 PM</option>
                                                        <option>9 :00 PM</option>
                                                        <option>10 :00 PM</option>
                                                        <option>11 :00 PM</option>
                                                        <option>12 :00 PM</option>
                                                        <option>Closed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row align-items-center">
                                                <label class="control-label col-lg-2 col-md-2">Tuesday</label>
                                                <div class="col-lg-5 col-md-5">
                                                    <select class="form-control chosen-select"
                                                        name="working_hours[open_time][]">
                                                        <option>Opening Time</option>
                                                        <option>1 :00 AM</option>
                                                        <option>2 :00 AM</option>
                                                        <option>3 :00 AM</option>
                                                        <option>4 :00 AM</option>
                                                        <option>5 :00 AM</option>
                                                        <option>6 :00 AM</option>
                                                        <option>7 :00 AM</option>
                                                        <option>8 :00 AM</option>
                                                        <option>9 :00 AM</option>
                                                        <option>10 :00 AM</option>
                                                        <option>11 :00 AM</option>
                                                        <option>12 :00 AM</option>
                                                        <option>1 :00 PM</option>
                                                        <option>2 :00 PM</option>
                                                        <option>3 :00 PM</option>
                                                        <option>4 :00 PM</option>
                                                        <option>5 :00 PM</option>
                                                        <option>6 :00 PM</option>
                                                        <option>7 :00 PM</option>
                                                        <option>8 :00 PM</option>
                                                        <option>9 :00 PM</option>
                                                        <option>10 :00 PM</option>
                                                        <option>11 :00 PM</option>
                                                        <option>12 :00 PM</option>
                                                        <option>Closed</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-5 col-md-5">
                                                    <select class="form-control" name="working_hours[close_time][]">
                                                        <option>Closing Time</option>
                                                        <option>1 :00 AM</option>
                                                        <option>2 :00 AM</option>
                                                        <option>3 :00 AM</option>
                                                        <option>4 :00 AM</option>
                                                        <option>5 :00 AM</option>
                                                        <option>6 :00 AM</option>
                                                        <option>7 :00 AM</option>
                                                        <option>8 :00 AM</option>
                                                        <option>9 :00 AM</option>
                                                        <option>10 :00 AM</option>
                                                        <option>11 :00 AM</option>
                                                        <option>12 :00 AM</option>
                                                        <option>1 :00 PM</option>
                                                        <option>2 :00 PM</option>
                                                        <option>3 :00 PM</option>
                                                        <option>4 :00 PM</option>
                                                        <option>5 :00 PM</option>
                                                        <option>6 :00 PM</option>
                                                        <option>7 :00 PM</option>
                                                        <option>8 :00 PM</option>
                                                        <option>9 :00 PM</option>
                                                        <option>10 :00 PM</option>
                                                        <option>11 :00 PM</option>
                                                        <option>12 :00 PM</option>
                                                        <option>Closed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row align-items-center">
                                                <label class="control-label col-lg-2 col-md-2">Wednesday</label>
                                                <div class="col-lg-5 col-md-5">
                                                    <select class="form-control chosen-select"
                                                        name="working_hours[open_time][]">
                                                        <option>Opening Time</option>
                                                        <option>1 :00 AM</option>
                                                        <option>2 :00 AM</option>
                                                        <option>3 :00 AM</option>
                                                        <option>4 :00 AM</option>
                                                        <option>5 :00 AM</option>
                                                        <option>6 :00 AM</option>
                                                        <option>7 :00 AM</option>
                                                        <option>8 :00 AM</option>
                                                        <option>9 :00 AM</option>
                                                        <option>10 :00 AM</option>
                                                        <option>11 :00 AM</option>
                                                        <option>12 :00 AM</option>
                                                        <option>1 :00 PM</option>
                                                        <option>2 :00 PM</option>
                                                        <option>3 :00 PM</option>
                                                        <option>4 :00 PM</option>
                                                        <option>5 :00 PM</option>
                                                        <option>6 :00 PM</option>
                                                        <option>7 :00 PM</option>
                                                        <option>8 :00 PM</option>
                                                        <option>9 :00 PM</option>
                                                        <option>10 :00 PM</option>
                                                        <option>11 :00 PM</option>
                                                        <option>12 :00 PM</option>
                                                        <option>Closed</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-5 col-md-5">
                                                    <select class="form-control" name="working_hours[close_time][]">
                                                        <option>Closing Time</option>
                                                        <option>1 :00 AM</option>
                                                        <option>2 :00 AM</option>
                                                        <option>3 :00 AM</option>
                                                        <option>4 :00 AM</option>
                                                        <option>5 :00 AM</option>
                                                        <option>6 :00 AM</option>
                                                        <option>7 :00 AM</option>
                                                        <option>8 :00 AM</option>
                                                        <option>9 :00 AM</option>
                                                        <option>10 :00 AM</option>
                                                        <option>11 :00 AM</option>
                                                        <option>12 :00 AM</option>
                                                        <option>1 :00 PM</option>
                                                        <option>2 :00 PM</option>
                                                        <option>3 :00 PM</option>
                                                        <option>4 :00 PM</option>
                                                        <option>5 :00 PM</option>
                                                        <option>6 :00 PM</option>
                                                        <option>7 :00 PM</option>
                                                        <option>8 :00 PM</option>
                                                        <option>9 :00 PM</option>
                                                        <option>10 :00 PM</option>
                                                        <option>11 :00 PM</option>
                                                        <option>12 :00 PM</option>
                                                        <option>Closed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row align-items-center">
                                                <label class="control-label col-lg-2 col-md-2">Thursday</label>
                                                <div class="col-lg-5 col-md-5">
                                                    <select class="form-control chosen-select"
                                                        name="working_hours[open_time][]">
                                                        <option>Opening Time</option>
                                                        <option>1 :00 AM</option>
                                                        <option>2 :00 AM</option>
                                                        <option>3 :00 AM</option>
                                                        <option>4 :00 AM</option>
                                                        <option>5 :00 AM</option>
                                                        <option>6 :00 AM</option>
                                                        <option>7 :00 AM</option>
                                                        <option>8 :00 AM</option>
                                                        <option>9 :00 AM</option>
                                                        <option>10 :00 AM</option>
                                                        <option>11 :00 AM</option>
                                                        <option>12 :00 AM</option>
                                                        <option>1 :00 PM</option>
                                                        <option>2 :00 PM</option>
                                                        <option>3 :00 PM</option>
                                                        <option>4 :00 PM</option>
                                                        <option>5 :00 PM</option>
                                                        <option>6 :00 PM</option>
                                                        <option>7 :00 PM</option>
                                                        <option>8 :00 PM</option>
                                                        <option>9 :00 PM</option>
                                                        <option>10 :00 PM</option>
                                                        <option>11 :00 PM</option>
                                                        <option>12 :00 PM</option>
                                                        <option>Closed</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-5 col-md-5">
                                                    <select class="form-control" name="working_hours[close_time][]">
                                                        <option>Closing Time</option>
                                                        <option>1 :00 AM</option>
                                                        <option>2 :00 AM</option>
                                                        <option>3 :00 AM</option>
                                                        <option>4 :00 AM</option>
                                                        <option>5 :00 AM</option>
                                                        <option>6 :00 AM</option>
                                                        <option>7 :00 AM</option>
                                                        <option>8 :00 AM</option>
                                                        <option>9 :00 AM</option>
                                                        <option>10 :00 AM</option>
                                                        <option>11 :00 AM</option>
                                                        <option>12 :00 AM</option>
                                                        <option>1 :00 PM</option>
                                                        <option>2 :00 PM</option>
                                                        <option>3 :00 PM</option>
                                                        <option>4 :00 PM</option>
                                                        <option>5 :00 PM</option>
                                                        <option>6 :00 PM</option>
                                                        <option>7 :00 PM</option>
                                                        <option>8 :00 PM</option>
                                                        <option>9 :00 PM</option>
                                                        <option>10 :00 PM</option>
                                                        <option>11 :00 PM</option>
                                                        <option>12 :00 PM</option>
                                                        <option>Closed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row align-items-center">
                                                <label class="control-label col-lg-2 col-md-2">Friday</label>
                                                <div class="col-lg-5 col-md-5">
                                                    <select class="form-control chosen-select"
                                                        name="working_hours[open_time][]">
                                                        <option>Opening Time</option>
                                                        <option>1 :00 AM</option>
                                                        <option>2 :00 AM</option>
                                                        <option>3 :00 AM</option>
                                                        <option>4 :00 AM</option>
                                                        <option>5 :00 AM</option>
                                                        <option>6 :00 AM</option>
                                                        <option>7 :00 AM</option>
                                                        <option>8 :00 AM</option>
                                                        <option>9 :00 AM</option>
                                                        <option>10 :00 AM</option>
                                                        <option>11 :00 AM</option>
                                                        <option>12 :00 AM</option>
                                                        <option>1 :00 PM</option>
                                                        <option>2 :00 PM</option>
                                                        <option>3 :00 PM</option>
                                                        <option>4 :00 PM</option>
                                                        <option>5 :00 PM</option>
                                                        <option>6 :00 PM</option>
                                                        <option>7 :00 PM</option>
                                                        <option>8 :00 PM</option>
                                                        <option>9 :00 PM</option>
                                                        <option>10 :00 PM</option>
                                                        <option>11 :00 PM</option>
                                                        <option>12 :00 PM</option>
                                                        <option>Closed</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-5 col-md-5">
                                                    <select class="form-control" name="working_hours[close_time][]">
                                                        <option>Closing Time</option>
                                                        <option>1 :00 AM</option>
                                                        <option>2 :00 AM</option>
                                                        <option>3 :00 AM</option>
                                                        <option>4 :00 AM</option>
                                                        <option>5 :00 AM</option>
                                                        <option>6 :00 AM</option>
                                                        <option>7 :00 AM</option>
                                                        <option>8 :00 AM</option>
                                                        <option>9 :00 AM</option>
                                                        <option>10 :00 AM</option>
                                                        <option>11 :00 AM</option>
                                                        <option>12 :00 AM</option>
                                                        <option>1 :00 PM</option>
                                                        <option>2 :00 PM</option>
                                                        <option>3 :00 PM</option>
                                                        <option>4 :00 PM</option>
                                                        <option>5 :00 PM</option>
                                                        <option>6 :00 PM</option>
                                                        <option>7 :00 PM</option>
                                                        <option>8 :00 PM</option>
                                                        <option>9 :00 PM</option>
                                                        <option>10 :00 PM</option>
                                                        <option>11 :00 PM</option>
                                                        <option>12 :00 PM</option>
                                                        <option>Closed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row align-items-center">
                                                <label class="control-label col-lg-2 col-md-2">Saturday</label>
                                                <div class="col-lg-5 col-md-5">
                                                    <select class="form-control chosen-select"
                                                        name="working_hours[open_time][]">
                                                        <option>Opening Time</option>
                                                        <option>1 :00 AM</option>
                                                        <option>2 :00 AM</option>
                                                        <option>3 :00 AM</option>
                                                        <option>4 :00 AM</option>
                                                        <option>5 :00 AM</option>
                                                        <option>6 :00 AM</option>
                                                        <option>7 :00 AM</option>
                                                        <option>8 :00 AM</option>
                                                        <option>9 :00 AM</option>
                                                        <option>10 :00 AM</option>
                                                        <option>11 :00 AM</option>
                                                        <option>12 :00 AM</option>
                                                        <option>1 :00 PM</option>
                                                        <option>2 :00 PM</option>
                                                        <option>3 :00 PM</option>
                                                        <option>4 :00 PM</option>
                                                        <option>5 :00 PM</option>
                                                        <option>6 :00 PM</option>
                                                        <option>7 :00 PM</option>
                                                        <option>8 :00 PM</option>
                                                        <option>9 :00 PM</option>
                                                        <option>10 :00 PM</option>
                                                        <option>11 :00 PM</option>
                                                        <option>12 :00 PM</option>
                                                        <option>Closed</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-5 col-md-5">
                                                    <select class="form-control" name="working_hours[close_time][]">
                                                        <option>Closing Time</option>
                                                        <option>1 :00 AM</option>
                                                        <option>2 :00 AM</option>
                                                        <option>3 :00 AM</option>
                                                        <option>4 :00 AM</option>
                                                        <option>5 :00 AM</option>
                                                        <option>6 :00 AM</option>
                                                        <option>7 :00 AM</option>
                                                        <option>8 :00 AM</option>
                                                        <option>9 :00 AM</option>
                                                        <option>10 :00 AM</option>
                                                        <option>11 :00 AM</option>
                                                        <option>12 :00 AM</option>
                                                        <option>1 :00 PM</option>
                                                        <option>2 :00 PM</option>
                                                        <option>3 :00 PM</option>
                                                        <option>4 :00 PM</option>
                                                        <option>5 :00 PM</option>
                                                        <option>6 :00 PM</option>
                                                        <option>7 :00 PM</option>
                                                        <option>8 :00 PM</option>
                                                        <option>9 :00 PM</option>
                                                        <option>10 :00 PM</option>
                                                        <option>11 :00 PM</option>
                                                        <option>12 :00 PM</option>
                                                        <option>Closed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row align-items-center">
                                                <label class="control-label col-lg-2 col-md-2">Sunday</label>
                                                <div class="col-lg-5 col-md-5">
                                                    <select class="form-control chosen-select"
                                                        name="working_hours[open_time][]">
                                                        <option>Opening Time</option>
                                                        <option>1 :00 AM</option>
                                                        <option>2 :00 AM</option>
                                                        <option>3 :00 AM</option>
                                                        <option>4 :00 AM</option>
                                                        <option>5 :00 AM</option>
                                                        <option>6 :00 AM</option>
                                                        <option>7 :00 AM</option>
                                                        <option>8 :00 AM</option>
                                                        <option>9 :00 AM</option>
                                                        <option>10 :00 AM</option>
                                                        <option>11 :00 AM</option>
                                                        <option>12 :00 AM</option>
                                                        <option>1 :00 PM</option>
                                                        <option>2 :00 PM</option>
                                                        <option>3 :00 PM</option>
                                                        <option>4 :00 PM</option>
                                                        <option>5 :00 PM</option>
                                                        <option>6 :00 PM</option>
                                                        <option>7 :00 PM</option>
                                                        <option>8 :00 PM</option>
                                                        <option>9 :00 PM</option>
                                                        <option>10 :00 PM</option>
                                                        <option>11 :00 PM</option>
                                                        <option>12 :00 PM</option>
                                                        <option>Closed</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-5 col-md-5">
                                                    <select class="form-control" name="working_hours[close_time][]">
                                                        <option>Closing Time</option>
                                                        <option>1 :00 AM</option>
                                                        <option>2 :00 AM</option>
                                                        <option>3 :00 AM</option>
                                                        <option>4 :00 AM</option>
                                                        <option>5 :00 AM</option>
                                                        <option>6 :00 AM</option>
                                                        <option>7 :00 AM</option>
                                                        <option>8 :00 AM</option>
                                                        <option>9 :00 AM</option>
                                                        <option>10 :00 AM</option>
                                                        <option>11 :00 AM</option>
                                                        <option>12 :00 AM</option>
                                                        <option>1 :00 PM</option>
                                                        <option>2 :00 PM</option>
                                                        <option>3 :00 PM</option>
                                                        <option>4 :00 PM</option>
                                                        <option>5 :00 PM</option>
                                                        <option>6 :00 PM</option>
                                                        <option>7 :00 PM</option>
                                                        <option>8 :00 PM</option>
                                                        <option>9 :00 PM</option>
                                                        <option>10 :00 PM</option>
                                                        <option>11 :00 PM</option>
                                                        <option>12 :00 PM</option>
                                                        <option>Closed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mt-4">
                                            <input id="t24" class="checkbox-custom" name="is_247_open"
                                                type="checkbox" value="1">
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
                                                    <li>
                                                        <input id="am1" class="checkbox-custom" name="am1"
                                                            type="checkbox">
                                                        <label for="am1" class="checkbox-custom-label">Health
                                                            Score 8.7
                                                            /
                                                            10</label>
                                                    </li>
                                                    <li>
                                                        <input id="am2" class="checkbox-custom" name="am2"
                                                            type="checkbox">
                                                        <label for="am2"
                                                            class="checkbox-custom-label">Reservations</label>
                                                    </li>
                                                    <li>
                                                        <input id="am3" class="checkbox-custom" name="am3"
                                                            type="checkbox">
                                                        <label for="am3" class="checkbox-custom-label">Vegetarian
                                                            Options</label>
                                                    </li>
                                                    <li>
                                                        <input id="am4" class="checkbox-custom" name="am4"
                                                            type="checkbox">
                                                        <label for="am4" class="checkbox-custom-label">Moderate
                                                            Noise</label>
                                                    </li>
                                                    <li>
                                                        <input id="am5" class="checkbox-custom" name="am5"
                                                            type="checkbox">
                                                        <label for="am5" class="checkbox-custom-label">Good For
                                                            Kids</label>
                                                    </li>
                                                    <li>
                                                        <input id="am6" class="checkbox-custom" name="am6"
                                                            type="checkbox">
                                                        <label for="am6" class="checkbox-custom-label">Private
                                                            Lot
                                                            Parking</label>
                                                    </li>
                                                    <li>
                                                        <input id="am7" class="checkbox-custom" name="am7"
                                                            type="checkbox">
                                                        <label for="am7" class="checkbox-custom-label">Beer &
                                                            Wine</label>
                                                    </li>
                                                    <li>
                                                        <input id="am8" class="checkbox-custom" name="am8"
                                                            type="checkbox">
                                                        <label for="am8" class="checkbox-custom-label">TV
                                                            Services</label>
                                                    </li>
                                                    <li>
                                                        <input id="am9" class="checkbox-custom" name="am9"
                                                            type="checkbox">
                                                        <label for="am9" class="checkbox-custom-label">Pets
                                                            Allow</label>
                                                    </li>
                                                    <li>
                                                        <input id="am10" class="checkbox-custom" name="am10"
                                                            type="checkbox">
                                                        <label for="am10" class="checkbox-custom-label">Offers
                                                            Delivery</label>
                                                    </li>
                                                    <li>
                                                        <input id="am11" class="checkbox-custom" name="am11"
                                                            type="checkbox">
                                                        <label for="am11" class="checkbox-custom-label">Staff
                                                            wears
                                                            masks</label>
                                                    </li>
                                                    <li>
                                                        <input id="am12" class="checkbox-custom" name="am12"
                                                            type="checkbox">
                                                        <label for="am12" class="checkbox-custom-label">Accepts
                                                            Credit
                                                            Cards</label>
                                                    </li>
                                                    <li>
                                                        <input id="am13" class="checkbox-custom" name="am13"
                                                            type="checkbox">
                                                        <label for="am13" class="checkbox-custom-label">Offers
                                                            Catering</label>
                                                    </li>
                                                    <li>
                                                        <input id="am14" class="checkbox-custom" name="am14"
                                                            type="checkbox">
                                                        <label for="am14" class="checkbox-custom-label">Good for
                                                            Breakfast</label>
                                                    </li>
                                                    <li>
                                                        <input id="am15" class="checkbox-custom" name="am15"
                                                            type="checkbox">
                                                        <label for="am15" class="checkbox-custom-label">Waiter
                                                            Service</label>
                                                    </li>
                                                    <li>
                                                        <input id="am16" class="checkbox-custom" name="am16"
                                                            type="checkbox">
                                                        <label for="am16"
                                                            class="checkbox-custom-label">Drive-Thru</label>
                                                    </li>
                                                    <li>
                                                        <input id="am17" class="checkbox-custom" name="am17"
                                                            type="checkbox">
                                                        <label for="am17" class="checkbox-custom-label">Outdoor
                                                            Seating</label>
                                                    </li>
                                                    <li>
                                                        <input id="am18" class="checkbox-custom" name="am18"
                                                            type="checkbox">
                                                        <label for="am18" class="checkbox-custom-label">Offers
                                                            Takeout</label>
                                                    </li>
                                                    <li>
                                                        <input id="am19" class="checkbox-custom" name="am19"
                                                            type="checkbox">
                                                        <label for="am19" class="checkbox-custom-label">Vegan
                                                            Options</label>
                                                    </li>
                                                    <li>
                                                        <input id="am20" class="checkbox-custom" name="am20"
                                                            type="checkbox">
                                                        <label for="am20"
                                                            class="checkbox-custom-label">Casual</label>
                                                    </li>
                                                    <li>
                                                        <input id="am21" class="checkbox-custom" name="am21"
                                                            type="checkbox">
                                                        <label for="am21" class="checkbox-custom-label">Good for
                                                            Groups</label>
                                                    </li>
                                                    <li>
                                                        <input id="am22" class="checkbox-custom" name="am22"
                                                            type="checkbox">
                                                        <label for="am22" class="checkbox-custom-label">Brunch,
                                                            Lunch,
                                                            Dinner</label>
                                                    </li>
                                                    <li>
                                                        <input id="am23" class="checkbox-custom" name="am23"
                                                            type="checkbox">
                                                        <label for="am23" class="checkbox-custom-label">Free
                                                            Wi-Fi</label>
                                                    </li>
                                                    <li>
                                                        <input id="am24" class="checkbox-custom" name="am24"
                                                            type="checkbox">
                                                        <label for="am24" class="checkbox-custom-label">Wheelchair
                                                            Accessible</label>
                                                    </li>
                                                    <li>
                                                        <input id="am25" class="checkbox-custom" name="am25"
                                                            type="checkbox">
                                                        <label for="am25" class="checkbox-custom-label">Happy
                                                            Hour</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn theme-bg rounded text-light">Add Listing</button>
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
            document.addEventListener('DOMContentLoaded', function () {
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

                    const marker = L.marker([lat, lng], { draggable: true }).addTo(map);

                    // When marker dragged, update inputs
                    marker.on('dragend', function () {
                        const pos = marker.getLatLng();
                        latInput.value = pos.lat.toFixed(6);
                        lngInput.value = pos.lng.toFixed(6);
                    });

                    // Click on map to move marker
                    map.on('click', function (e) {
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
                    useBtn.addEventListener('click', function () {
                        if (!navigator.geolocation) {
                            showMapError('Geolocation not supported');
                            return;
                        }
                        navigator.geolocation.getCurrentPosition(function (pos) {
                            const pLat = pos.coords.latitude;
                            const pLng = pos.coords.longitude;
                            marker.setLatLng([pLat, pLng]);
                            map.setView([pLat, pLng], 13);
                            latInput.value = pLat.toFixed(6);
                            lngInput.value = pLng.toFixed(6);
                        }, function (err) {
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

                // Cities data map from controller
                const citiesMap = @json($data['cities']);

                // Update cities dropdown based on selected state
                function updateCities() {
                    const stateSelect = document.getElementById('state');
                    const citySelect = document.getElementById('city');
                    const selectedState = stateSelect.value;

                    // Clear cities dropdown
                    citySelect.innerHTML = '<option value="" disabled selected>Select City</option>';

                    if (selectedState && citiesMap[selectedState]) {
                        citiesMap[selectedState].forEach(city => {
                            const option = document.createElement('option');
                            option.value = city;
                            option.textContent = city;
                            option.selected = city === '{{ old("city") }}' ? true : false;
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
</x-admin.layout>
