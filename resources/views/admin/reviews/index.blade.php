<x-admin.layout type="reviews">
    <div class="goodup-dashboard-content p-0">
        <div class="dashboard-tlbar d-block mb-5">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <h1 class="ft-medium">Reviews</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                            <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="theme-cl">Reviews</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!--end breadcrumb-->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Listing</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Rating</th>
                                <th>Review</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reviews as $review)
                                <tr>
                                    <td>{{ $review->id }}</td>
                                    <td>{{ $review->listing->title ?? '—' }}</td>
                                    <td>{{ $review->name ?? ($review->user->name ?? 'Anonymous') }}</td>
                                    <td>{{ $review->email }}</td>
                                    <td>{{ $review->rating }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($review->review, 120) }}</td>
                                    <td>{{ $review->created_at->format('d M Y') }}</td>
                                    <td>
                                        @if($review->status == 0)
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($review->status == 1)
                                            <span class="badge bg-success">Approved</span>
                                        @else
                                            <span class="badge bg-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form class="status-form" action="{{ route('reviews.update_status', $review->id) }}" method="POST" style="display:inline-block">
                                            @csrf
                                            <input type="hidden" name="status" value="1">
                                            <button class="btn btn-success" style="padding:4px 6px; font-size:12px;" type="submit" title="Approve">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </form>

                                        <form class="status-form" action="{{ route('reviews.update_status', $review->id) }}" method="POST" style="display:inline-block; margin-left:6px">
                                            @csrf
                                            <input type="hidden" name="status" value="2">
                                            <button class="btn btn-danger" style="padding:4px 6px; font-size:12px;" type="submit" title="Reject">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>

                                        <form class="status-form" action="{{ route('reviews.update_status', $review->id) }}" method="POST" style="display:inline-block; margin-left:6px">
                                            @csrf
                                            <input type="hidden" name="status" value="0">
                                            <button class="btn btn-secondary" style="padding:4px 6px; font-size:12px;" type="submit" title="Stay (Pending)">
                                                <i class="fa fa-clock"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.status-form').forEach(function (form) {
                form.addEventListener('submit', function (e) {
                    var confirmed = confirm('Are you sure you want to change the status of this review?');
                    if (!confirmed) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
    @endpush

</x-admin.layout>
