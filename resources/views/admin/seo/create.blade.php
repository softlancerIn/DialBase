<x-admin.layout type="seo">
    <div class="page-content">
        <div class="dashboard-tlbar d-block mb-3">
            <div class="row">
                <div class="colxl-9 col-lg-9 col-md-9">
                    <h1 class="ft-medium">Create Seo</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="theme-cl">Create Seo</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="btn-group float-end mt-2">
                        <div class="form-group">
                            <button class="btn btn-primary rounded text-light">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr />
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <form action="{{ route('save_seo') }}" method="POST" class="row g-3"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label for="inputFirstName" class="form-label">Page Url</label>
                                <input type="text" name="url" class="form-control @error('url') is-invalid @enderror"
                                    value="{{ old('url', '') }}" placeholder="http://localhost/DialBas"
                                    id="inputFirstName">
                                <input type="hidden" name="id" value="0">
                                @error('url')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="inputTitle" class="form-label">Page Title (H1)</label>
                                <input type="text" name="page_title" class="form-control @error('page_title') is-invalid @enderror"
                                    value="{{ old('page_title', '') }}" placeholder="Page Title..."
                                    id="inputTitle">
                                @error('page_title')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="inputTitle" class="form-label">Page Sort Description</label>
                                <textarea id="mytextarea" name="page_sort_description" class="form-control @error('page_sort_description') is-invalid @enderror"
                                    value="{{ old('page_sort_description', '') }}" placeholder="Page Sort Description..."
                                    id="inputTitle"></textarea>
                                @error('page_sort_description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="inputTitle" class="form-label">Page Description</label>
                                <textarea id="longtextarea" name="page_description" class="form-control"
                                    value="{{ old('page_description', '') }}" placeholder="Page Description..."
                                    id="inputTitle"></textarea>
                                    @error('page_description')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="col-12">
                                <label for="inputTitle" class="form-label">Meta Title</label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', '') }}" placeholder="Meta Title..."
                                    id="inputTitle">
                                @error('title')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-12">
                                <label for="inputKeyword" class="form-label">Meta Keywords</label>
                                <textarea name="keywords" class="form-control" id="inputKeyword" placeholder="Meta Keywords..." rows="3">{{ old('keywords', '') }}</textarea>
                                @error('keywords')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="inputDescription" class="form-label">Meta Description</label>
                                <textarea name="description" class="form-control" id="inputDescription" placeholder="Meta Description..." rows="5">{{ old('description', '') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="inputScript" class="form-label">Meta Script</label>
                                <textarea name="script" class="form-control" id="inputScript" placeholder="Meta Script..." rows="5">{{ old('script', '') }}</textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</x-admin.layout>
