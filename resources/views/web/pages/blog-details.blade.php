@extends('web.layout.main')

@section('content')
<section class="pt-5 pb-5 bg-light">
    <div class="container">
        @if(!empty($data['blog']))
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="mb-3">{{ $data['blog']->name }}</h1>
                    <div class="mb-4 text-muted">
                        <small>Published {{ optional($data['blog']->created_at)->format('M d, Y') }}</small>
                        @if($data['blog']->category)
                            <span class="ms-2 badge bg-primary">{{ $data['blog']->category->name }}</span>
                        @endif
                    </div>
                    @if(!empty($data['blog']->image))
                        <img
                            src="{{ $data['blog']->image ? asset('upload_image/blog/'.$data['blog']->image) : asset('assets/img/b-4.jpg') }}"
                            class="img-fluid"
                            alt="{{ $data['blog']->name }}"
                            style="width:100%;aspect-ratio:16/9;object-fit:cover;display:block;"
                        >
                    @endif

                    @if(!empty($data['blog']->description))
                        <div class="mb-2 fw-bold fs-5">
                            {!! $data['blog']->description !!}
                        </div>
                    @endif

                    @if(!empty($data['blog']->long_description))
                        <div class="mb-5">
                            {!! $data['blog']->long_description !!}
                        </div>
                    @endif
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-header">Recent Posts</div>
                        <ul class="list-group list-group-flush">
                            @foreach(($data['blogs'] ?? []) as $post)
                                <li class="list-group-item d-flex">
                                    @if($post->image)
                                        <img src="{{ asset('upload_image/blog/' . $post->image) }}" alt="{{ $post->name }}" class="me-2 rounded" style="width:48px;height:48px;object-fit:cover;">
                                    @endif
                                    <div>
                                        <a href="{{ route('web_blog_details', $post->slug) }}" class="fw-semibold d-block mb-1">{{ $post->name }}</a>
                                        <small class="text-muted">{{ \Illuminate\Support\Str::limit(strip_tags($post->description), 90) }}</small>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning">Blog not found.</div>
        @endif
    </div>
</section>
@endsection
