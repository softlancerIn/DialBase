<x-admin.layout type="seo">
    <div class="page-content">
        <div class="dashboard-tlbar d-block mb-3">
            <div class="row">
                <div class="colxl-10 col-lg-10 col-md-10">
                    <h1 class="ft-medium">Manage Seo</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="theme-cl">Manage Seo</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-2">
                    <div class="btn-group float-end mt-2">
                        <a href="{{ route('seo_form', ['type' => 'create', 'id' => '0']) }}">
                            <button type="button" class="btn btn-primary">
                                Add Seo
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
                                <th>Page Url</th>
                                <th>Title</th>
                                <th>Keywords</th>
                                <th>Updated Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['seo'] as $key => $seo)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $seo->url }}</td>
                                    <td>{{ $seo->title }}</td>
                                    <td>{{ Str::limit(strip_tags($seo->keywords), 50) }}</td>
                                    <td>{{ daysAgo($seo->updated_at) }}</td>
                                    <td>
                                        <a href="{{ route('seo_form', ['type' => 'edit', 'id' => $seo->id]) }}">
                                            <i class="fas fa-edit me-1" data-feather="edit"></i>
                                        </a>
                                        <a data-bs-toggle="modal" data-bs-target="#deleteModal{{ $seo->id }}"
                                            href="#">
                                            <i class="fas fa-trash me-1" data-feather="trash-2"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('modals')
        @foreach ($data['seo'] as $seo)
            <x-admin.modal type="seo" id="{{ $seo->id }}" />
        @endforeach
    @endpush
</x-admin.layout>
