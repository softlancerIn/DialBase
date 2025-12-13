<x-admin.layout type="category">
        <div class="page-content">
            <!--breadcrumb-->
            <div
                class="page-breadcrumb d-none d-sm-flex align-items-center mb-3"
            >
                <div class="breadcrumb-title pe-3">Category</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"
                                    ><i class="bx bx-home-alt"></i
                                ></a>
                            </li>
                            <li
                                class="breadcrumb-item active"
                                aria-current="page"
                            >
                               Category
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{route('category_form',['type' => 'create', 'id' => '0'])}}">
                            <button type="button" class="btn btn-primary">
                                Add Category
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            id="example"
                            class="table table-striped table-bordered"
                            style="width: 100%"
                        >
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['category'] as $key => $category)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{!!$category->description!!}</td>
                                        <td>{{$category->created_at}}</td>
                                        <td>
                                            <a href="{{route('category_form',['type'=>'edit','id'=>$category->id])}}">
                                                <i class="fas fa-edit me-1" data-feather="edit"></i>
                                            </a>

                                            <a  data-bs-toggle="modal" data-bs-target="#deleteModal{{ $category->id }}" href="#">
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