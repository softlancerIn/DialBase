@extends('web.layout.main')

@section('page_title', 'FAQ Page')

@section('content')

    <!-- Breadcrumb -->
    <div class="gray py-3">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">/ FAQ Page</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-12">
                    <div class="text-center">
                        <h1 class="ft-bold mb-3">{{ $seoData->page_title ?? 'FAQ Page' }}</h1>
                        <p class="lead text-muted">{!! $seoData->page_sort_description ??
                            'At Aboutfirms, we are committed to protecting your privacy and ensuring the security of your personal information. This FAQ Page explains how we collect, use, store, and protect your data when you use our B2B directory platform.' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection