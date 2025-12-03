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
                    </div>
                    <div class="sidebar-widgets">
                        <form method="GET" action="{{ route('search') }}">
                            <div class="side-filter-box-body px-3 py-3">
                                <div class="form-group mb-3">
                                    <label class="small">Name</label>
                                    <input name="name" value="{{ request('name') }}" class="form-control" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="small">Location</label>
                                    <select name="address" class="form-control">
                                        <option value="">All Locations</option>
                                        @if(!empty($data['locations']) && $data['locations']->count() > 0)
                                            @foreach($data['locations'] as $loc)
                                                <option value="{{ $loc }}" {{ request('address') == $loc ? 'selected' : '' }}>{{ $loc }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="checkbox-custom">Open Now
                                        <input type="checkbox" name="open_now" value="1" {{ request('open_now') ? 'checked' : '' }}>
                                    </label>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="checkbox-custom">Featured
                                        <input type="checkbox" name="featured" value="1" {{ request('featured') ? 'checked' : '' }}>
                                    </label>
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
                                <p class="text-muted">Showing results for {{ request('name') }} in {{ request('address') }}</p>
                            @else
                                <p class="text-muted">Showing results for {{ request('name') }}</p>
                            @endif
                        @elseif (request()->has('address') && !empty(request('address')))
                            <p class="text-muted">Showing results for {{ request('address') }}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    @if(isset($data['listings']) && $data['listings']->count() > 0)
                        @foreach($data['listings'] as $listing)
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
                    <div class="col-12 d-flex justify-content-center mt-4">
                        @if(isset($data['listings']))
                            {{ $data['listings']->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======================= Search Results End ======================== -->
@endsection
