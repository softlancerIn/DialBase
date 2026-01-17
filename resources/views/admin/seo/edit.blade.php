<x-admin.layout type="seo">
    <div class="page-content">
        <div class="dashboard-tlbar d-block mb-3">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-9">
                    <h1 class="ft-medium">Edit Seo</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="theme-cl">Edit Seo</a></li>
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
                                <label for="inputUrl" class="form-label">Page Url</label>
                                <input type="url" name="url" class="form-control @error('url') is-invalid @enderror placeholder-gray-400"
                                    value="{{ $data['seo']['url'] ?? '' }}" placeholder="www.example.com/page"
                                    id="inputUrl">
                                <input type="hidden" name="id" value="{{ $data['seo']['id'] ?? '0' }}">
                                @error('url')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="inputPageTitle" class="form-label">Page Title (H1)</label>
                                <input type="text" name="page_title" class="form-control @error('page_title') is-invalid @enderror"
                                    value="{{ $data['seo']['page_title'] ?? '' }}" placeholder="Page Title..."
                                    id="inputPageTitle">
                                @error('page_title')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="mytextarea" class="form-label">Page Sort Description</label>
                                <textarea id="mytextarea" name="page_sort_description" class="form-control @error('page_sort_description') is-invalid @enderror"
                                    placeholder="Page Sort Description...">{!! $data['seo']['page_sort_description'] ?? '' !!}</textarea>
                                @error('page_sort_description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="longtextarea" class="form-label">Page Description</label>
                                <textarea id="longtextarea" name="page_description" class="form-control @error('page_description') is-invalid @enderror"
                                    placeholder="Page Description...">{!! $data['seo']['page_description'] ?? '' !!}</textarea>
                                @error('page_description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="inputMetaTitle" class="form-label">Meta Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ $data['seo']['title'] ?? '' }}" placeholder="Meta Title..."
                                    id="inputMetaTitle">
                                @error('title')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="inputKeyword" class="form-label">Meta Keyword</label>
                                <textarea name="keywords" class="form-control @error('keywords') is-invalid @enderror" id="inputKeyword" placeholder="Meta Keyword..." rows="3">{{ $data['seo']['keywords'] ?? '' }}</textarea>
                                @error('keywords')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="inputDescription" class="form-label">Meta Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="inputDescription" placeholder="Meta Description..." rows="4">{{ $data['seo']['description'] ?? '' }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="inputScript" class="form-label">Meta Script</label>
                                <textarea name="script" class="form-control @error('script') is-invalid @enderror" id="inputScript" placeholder="Meta Script..." rows="5">{{ $data['seo']['script'] ?? '' }}</textarea>
                                @error('script')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-2">
                                <button type="submit" class="btn btn-primary px-5">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</x-admin.layout>
