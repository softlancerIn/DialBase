<x-admin.layout>
    <div class="goodup-dashboard-content p-0">
        <div class="dashboard-tlbar d-block mb-3">
            <div class="row">
                <div class="colxl-10 col-lg-10 col-md-10">
                    <h1 class="ft-medium">Manage Listings</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="theme-cl">Manage Listings</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-2">
                    <div class="btn-group float-end mt-2">
                        <a href="{{route('listing-data.create')}}">
                            <button type="button" class="btn btn-primary">
                                Add Listing
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <hr />

        <div class="row mb-3">
            <div class="col-12">
                <form action="{{ route('listing-data.index') }}" method="GET" class="row g-3">
                    <div class="col-md-4">
                        <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach(\App\Models\Category::where('status', '1')->get() as $cat)
                                <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="state" class="form-control" placeholder="State" value="{{ request('state') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="city" class="form-control" placeholder="City" value="{{ request('city') }}">
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </form>
            </div>
        </div>

        <hr />

        <div class="dashboard-widg-bar d-block">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="dashboard-list-wraps bg-white rounded mb-4">
                        <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                            <div class="dashboard-list-wraps-flx">
                                <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-file-alt me-2 theme-cl fs-sm"></i>My
                                    Listings</h4>
                            </div>
                        </div>

                        <div class="dashboard-list-wraps-body py-3 px-3">
                            <div class="dashboard-listing-wraps">

                                <!-- Single Listing Item -->
                                @foreach($listings as $key => $data)
                                    <div class="dsd-single-listing-wraps">
                                        <div class="dsd-single-lst-thumb"><img src="assets/img/listing/l-1.jpg"
                                                class="img-fluid" alt="" /></div>
                                        <div class="dsd-single-lst-caption">
                                            <div class="dsd-single-lst-title">
                                                <h5>{{$data->title}}</h5>
                                            </div>
                                            <span class="agd-location"><i
                                                    class="lni lni-map-marker me-1"></i>{{$data->address}}</span>
                                            <div class="ico-content">
                                                <div class="Goodup-ft-first">
                                                    <div class="Goodup-rating">
                                                        <div class="Goodup-rates">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="Goodup-price-range">
                                                        <span class="ft-medium">34 Reviews</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dsd-single-lst-footer">
                                                <a href="{{route('listing-data.edit', $data->id)}}"
                                                    class="btn btn-edit mr-1"><i class="fas fa-edit me-1"></i>Edit</a>
                                                <a href="{{route('listing-data.show', $data->id)}}"
                                                    class="btn btn-view mr-1"><i class="fas fa-eye me-1"></i>View</a>
                                                <form action="{{ route('listing-data.destroy', $data->id) }}" method="POST" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this listing?')">
                                                        <i class="fas fa-trash me-1"></i>Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    {{ $listings->links('pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>