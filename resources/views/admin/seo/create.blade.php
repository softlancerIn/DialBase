<x-admin.layout type="seo">
    <style>
        .preview {
            display: inline-block;
            margin: 10px;
        }

        .preview img {
            width: 100px;
            height: 100px;
            margin-right: 10px;
        }
    </style>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Seo</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Create Seo
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr />
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <form action="{{ route('save_seo') }}" method="POST" class="row g-3"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label for="inputFirstName" class="form-label">Page Url ()</label>
                                <input type="url" name="url" class="form-control"
                                    value="{{ old('url', '') }}" placeholder="Page Url..."
                                    id="inputFirstName">
                                <input type="hidden" name="id" value="0">
                            </div>

                            <div class="col-12">
                                <label for="inputTitle" class="form-label">Page Title (H1)</label>
                                <input type="text" name="page_title" class="form-control"
                                    value="{{ old('page_title', '') }}" placeholder="Page Title..."
                                    id="inputTitle">
                            </div>

                            <div class="col-12">
                                <label for="inputTitle" class="form-label">Page Sort Description</label>
                                <textarea id="mytextarea" name="page_sort_description" class="form-control"
                                    value="{{ old('page_sort_description', '') }}" placeholder="Page Sort Description..."
                                    id="inputTitle"></textarea>
                            </div>

                            <div class="col-12">
                                <label for="inputTitle" class="form-label">Page Description</label>
                                <textarea id="longtextarea" name="page_description" class="form-control"
                                    value="{{ old('page_description', '') }}" placeholder="Page Description..."
                                    id="inputTitle"></textarea>
                            </div>

                            <div class="col-12">
                                <label for="inputTitle" class="form-label">Meta Title</label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', '') }}" placeholder="Meta Title..."
                                    id="inputTitle">
                            </div>
                            
                            <div class="col-12">
                                <label for="inputKeyword" class="form-label">Meta Keyword</label>
                                <textarea name="keywords" class="form-control" id="inputKeyword" placeholder="Meta Keyword..." rows="3">{{ old('keywords', '') }}</textarea>
                            </div>

                            <div class="col-12">
                                <label for="inputDescription" class="form-label">Meta Description</label>
                                <textarea name="description" class="form-control" id="inputDescription" placeholder="Meta Description..." rows="5">{{ old('description', '') }}</textarea>
                            </div>

                            <div class="col-12">
                                <label for="inputScript" class="form-label">Meta Script</label>
                                <textarea name="script" class="form-control" id="inputScript" placeholder="Meta Script..." rows="5">{{ old('script', '') }}</textarea>
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
