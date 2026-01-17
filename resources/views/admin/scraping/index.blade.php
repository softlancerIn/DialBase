<x-admin.layout>
    <div class="dashboard-widg-bar d-block">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="_dashboard_content bg-white rounded mb-4">
                    <div class="_dashboard_content_header br-bottom py-3 px-3">
                        <div class="_dashboard__header_flex">
                            <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-globe me-2 theme-cl fs-sm"></i>Scrape Website
                            </h4>
                        </div>
                    </div>

                    <div class="_dashboard_content_body py-3 px-3">
                        <form action="{{ route('scrape_website.post') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-1">Select Category</label>
                                        <select name="category_id" class="form-control rounded" required>
                                            <option value="">-- Select Category --</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label class="mb-1">Website URL (JustDial Category URL)</label>
                                        <input type="text" name="url" class="form-control rounded"
                                            placeholder="https://www.justdial.com/..." required>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn theme-bg text-light rounded">Scrape & Add
                                            Listings</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger mt-3">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>
