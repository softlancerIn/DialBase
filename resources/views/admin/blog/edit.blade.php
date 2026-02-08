<x-admin.layout>
    <div class="goodup-dashboard-content p-0">
        <div class="dashboard-tlbar d-block mb-3">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <h1 class="ft-medium">{{ isset($data['blog']) && !empty($data['blog']) && !empty($data['blog']['id']) ? 'Edit Blog' : 'Create Blog' }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="theme-cl">{{ isset($data['blog']) && !empty($data['blog']) && !empty($data['blog']['id']) ? 'Edit Blog' : 'Create Blog' }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="dashboard-widg-bar d-block">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('save_blog') }}" method="POST" class="row g-3" enctype="multipart/form-data" id="blog-form">
                                @csrf
                                <div class="col-12">
                                    <label for="inputFirstName" class="form-label">Blog Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $data['blog']['name'] ?? '' }}" placeholder="Blog Name..." id="inputFirstName">
                                    <input type="hidden" name="id" value="{{ $data['blog']['id'] ?? '0' }}">
                                </div>

                                <div class="col-12">
                                    <label for="formFile" class="form-label">Upload Image</label>
                                    <input type="file" name="image" class="form-control" id="formFile">
                                    <input type="hidden" name="old_image" value="{{ $data['blog']['image'] ?? old('image') ?? '' }}">
                                </div>

                                <div class="col-12">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach(($data['categories'] ?? []) as $cat)
                                            <option value="{{ $cat->id }}" {{ (isset($data['blog']['category_id']) && $data['blog']['category_id'] == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="longtextarea" class="form-label">Description</label>
                                    <textarea name="description" class="form-control" id="longtextarea" placeholder="Description..." rows="5">{{ $data['blog']['description'] ?? '' }}</textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" form="blog-form" class="btn btn-primary rounded text-light me-2">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>
