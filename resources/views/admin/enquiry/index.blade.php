<x-admin.layout type="category">
    <div class="page-content">
        <div class="dashboard-tlbar d-block mb-3">
            <div class="row">
                <div class="col-xl-10 col-lg-10 col-md-10">
                    <h1 class="ft-medium">Manage Enquiry</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="theme-cl">Manage Enquiry</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-2">
                    <div class="float-end mt-2">
                        <a href="{{ route('enquiry_export', request()->query()) }}" class="btn btn-primary">Export</a>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .pagination {
                margin: 0px !important;
            }

            /* Tweak pagination arrow icon size */
            .pagination svg {
                width: 14px !important;
                height: 14px !important;
            }

            .pagination nav,
            .pagination a,
            .pagination span {
                line-height: 1.2;
            }
        </style>

        <!-- Filters -->
        <div class="card mb-3">
            <div class="card-body">
                <form method="GET" action="{{ route('enquiry_list') }}">
                    <div class="row g-2 align-items-end">
                        <div class="col-md-2">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" value="{{ $filters['name'] ?? '' }}"
                                class="form-control" placeholder="Name">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" value="{{ $filters['email'] ?? '' }}"
                                class="form-control" placeholder="Email">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" value="{{ $filters['phone'] ?? '' }}"
                                class="form-control" placeholder="Phone">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Listing</label>
                            <input type="text" name="listing" value="{{ $filters['listing'] ?? '' }}"
                                class="form-control" placeholder="Listing name">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Created From</label>
                            <input type="date" name="created_from" value="{{ $filters['created_from'] ?? '' }}"
                                class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Created To</label>
                            <input type="date" name="created_to" value="{{ $filters['created_to'] ?? '' }}"
                                class="form-control">
                        </div>
                        <div class="col-md-12 d-flex gap-2 mt-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{ route('enquiry_list') }}" class="btn btn-light">Reset</a>
                        </div>
                    </div>
                </form>
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
                                <th>Listing Name</th>
                                <th>Name</th>
                                <th>Phone - Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enquiries as $enquiry)
                                <tr>
                                    <td>{{ $enquiry->id }}</td>
                                    <td>{{ $enquiry->listing->title ?? 'contact form' }}</td>
                                    <td>{{ $enquiry->name }}</td>
                                    <td>{{ $enquiry->phone }} - {{ $enquiry->email }}</td>
                                    <td>{{ $enquiry->subject }}</td>
                                    <td>{!! $enquiry->message !!}</td>
                                    <td>{{ daysAgo($enquiry->created_at) }}</td>
                                    <td>
                                        <a data-bs-toggle="modal" data-bs-target="#deleteModal{{ $enquiry->id }}"
                                            href="#">
                                            <i class="fas fa-trash me-1" data-feather="trash-2"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <!-- Add pagination -->
                <div class="pagination">
                    {{ $enquiries->links() }}
                </div>
            </div>
        </div>
    </div>

    @push('modals')
        @foreach ($enquiries as $enquiry)
            <x-admin.modal type="enquiry" id="{{ $enquiry->id }}" />
        @endforeach
    @endpush
</x-admin.layout>
