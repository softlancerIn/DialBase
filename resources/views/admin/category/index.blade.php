<x-admin.layout type="category">
    <div class="page-content">
        <div class="dashboard-tlbar d-block mb-3">
            <div class="row">
                <div class="colxl-10 col-lg-10 col-md-10">
                    <h1 class="ft-medium">Manage Category</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="theme-cl">Manage Category</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-2">
                    <div class="btn-group float-end mt-2">
                        <a href="{{ route('category_form', ['type' => 'create']) }}">
                            <button type="button" class="btn btn-primary">
                                Add Category
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['category'] as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @if ($category->image)
                                            <img src="{{ asset('upload_image/category/' . $category->image) }}"
                                                alt="{{ $category->name }}" class="rounded-circle p-1 border" width="45" height="45">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ daysAgo($category->created_at) }}</td>
                                    <td>
                                        <a href="{{ route('category_form', ['type' => 'edit', 'id' => $category->id]) }}">
                                            <i class="fas fa-edit me-1" data-feather="edit"></i>
                                        </a>

                                        <a data-bs-toggle="modal" data-bs-target="#deleteModal{{ $category->id }}"
                                            href="#">
                                            <i class="fas fa-trash me-1" data-feather="trash-2"></i>
                                        </a>
                                        <x-admin.modal type="category" id="{{ $category->id }}" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-admin.layout>
