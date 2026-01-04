<x-admin.layout>
    <div class="goodup-dashboard-content p-0">
        <div class="dashboard-tlbar d-block mb-3">
            <div class="row">
                <div class="col-xl-10 col-lg-10 col-md-10">
                    <h1 class="ft-medium">Manage Blogs</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="theme-cl">Manage Blogs</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-2">
                    <div class="btn-group float-end mt-2">
                        <a href="{{ route('blog_form', ['type' => 'create', 'id' => '0']) }}">
                            <button type="button" class="btn btn-primary">
                                Add Blog
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <hr />

        <div class="dashboard-widg-bar d-block">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Blog Name</th>
                                            <th>Image</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['blogs'] as $key => $blog)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $blog->name }}</td>
                                                <td>
                                                    <img src="{{ asset('upload_image/blog/' . $blog->image) }}"
                                                        class="rounded-circle p-1 border" width="45" height="45"
                                                        alt="...">
                                                </td>
                                                <td>{{ daysAgo($blog->created_at) }}</td>
                                                <td>
                                                    <a
                                                        href="{{ route('blog_form', ['type' => 'edit', 'id' => $blog->id]) }}">
                                                        <i class="fas fa-edit me-1" data-feather="edit"></i>
                                                    </a>

                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $blog->id }}" href="#">
                                                        <i class="fas fa-trash me-1" data-feather="trash-2"></i>
                                                    </a>
                                                    <x-admin.modal type="blog" id="{{ $blog->id }}" />
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin.layout>
