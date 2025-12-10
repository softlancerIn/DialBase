@extends('web.layout.main')

@section('content')
<!-- ======================= Blogs Page ======================== -->
<section class="pt-5 pb-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="mb-0">Blogs</h2>
            </div>
        </div>
        <div class="row">
            @forelse($data['blogs'] as $blog)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        @if(!empty($blog->image))
                            <a href="{{ route('web_blog_details', $blog->slug) }}">
                                <img class="card-img-top" src="{{ asset('upload_image/blog/' . $blog->image) }}" alt="{{ $blog->name }}">
                            </a>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('web_blog_details', $blog->slug) }}">{{ $blog->name }}</a>
                            </h5>
                            @if(!empty($blog->short_description))
                                <p class="card-text">{{ $blog->short_description }}</p>
                            @else
                                <p class="card-text">{{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 120) }}</p>
                            @endif
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <small class="text-muted">{{ optional($blog->created_at)->format('M d, Y') }}</small>
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('web_blog_details', $blog->slug) }}">Read More</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">No blogs found.</div>
                </div>
            @endforelse
        </div>
        <div class="row mt-3">
            <div class="col-12 d-flex justify-content-center">
                {{ $data['blogs']->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
