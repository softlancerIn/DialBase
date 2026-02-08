@extends('web.layout.main')

@section('content')
    @php
        $currentUrl = url()->current();
        $seoData = \App\Models\Seo::where('url', $currentUrl)->first();
    @endphp
    <!-- ======================= Breadcrumb ======================== -->
    <div class="breadcrumb-wrap"
        style="background:#f41b3b url({{ asset('assets/img/banner-2.jpg') }}) no-repeat; background-size: 100%;"
        data-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="breadcrumb_caption text-center py-5">
                        <h1 class="page_title fw-bold fs-1 fs-md-2 fs-lg-1">
                            {{ $seoData->page_title ?? 'All Blog' }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mt-2" style="color: white;">
                                <li class=""><a href="{{ route('index') }}" style="color: white;">Home </a></li>
                                <li class="active" aria-current="page" style="color: white;"> / {{ $seoData->page_title ?? 'All Blog' }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Breadcrumb End ======================== -->

    <!-- ======================= Category Section ======================== -->
    <section class="gray py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    {!! $seoData->page_sort_description ?? '' !!}
                </div>
                @foreach ($all_blogs ?? [] as $blog)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="gup_blg_grid_box">
                            <div class="gup_blg_grid_thumb">
                                <a href="{{ route('web_blog_details', $blog->slug) }}">
                                    <img src="{{ $blog->image ? asset('upload_image/blog/' . $blog->image) : asset('assets/img/b-4.jpg') }}"
                                        class="img-fluid" alt="{{ $blog->name }}"
                                        style="width:100%;aspect-ratio:16/9;object-fit:cover;display:block;">
                                </a>
                            </div>
                            <div class="gup_blg_grid_caption">
                                <div class="blg_tag"><span>{{ optional($blog->category)->name ?? 'Blog' }}</span></div>
                                <div class="blg_title">
                                    <h4><a href="{{ route('web_blog_details', $blog->slug) }}">{{ $blog->name }}</a></h4>
                                </div>
                                <div class="blg_desc">
                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 120) }}</p>
                                </div>
                            </div>
                            <div class="crs_grid_foot">
                                <div class="crs_flex d-flex align-items-center justify-content-between br-top px-3 py-2">
                                    <div class="crs_fl_first">
                                        <div class="crs_tutor">
                                            <div class="crs_tutor_thumb"><a href="javascript:void(0);"><img
                                                        src="{{ asset('assets/img/team-2.jpg') }}" class="img-fluid circle"
                                                        width="35" alt="Admin"></a></div>
                                        </div>
                                    </div>
                                    <div class="crs_fl_last">
                                        <div class="foot_list_info">
                                            <ul>
                                                <li>
                                                    <div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div>
                                                    <div class="elsio_tx">
                                                        {{ optional($blog->created_at)->format('d M Y') }}</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-12">
            {{ $all_blogs->links('pagination.custom') }}
        </div>
    </div>
    <!-- ======================= Category Section End ======================== -->
@endsection
