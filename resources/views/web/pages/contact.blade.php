@extends('web.layout.main')

@section('content')
    <section class="gray-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sec_title position-relative text-center mb-5">
                        <h6 class="theme-cl mb-0">{{ $seoData->page_title ?? 'Contact Us' }}</h6>
                        <h2 class="ft-bold">{!! $seoData->page_sort_description ?? 'Get In Touch With Us' !!}</h2>
                    </div>
                </div>
            </div>

            <div class="row align-items-start gap-4">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="bg-white rounded p-4 shadow-sm">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="contact-form" method="post" action="{{ route('save_enquiry') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="small ft-medium">Your Name</label>
                                        <input type="text" name="name" class="form-control rounded"
                                            placeholder="Your Name" value="{{ old('name') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="small ft-medium">Your Email</label>
                                        <input type="email" name="email" class="form-control rounded"
                                            placeholder="Your Email" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="small ft-medium">Phone Number</label>
                                        <input type="text" name="phone" class="form-control rounded"
                                            placeholder="Phone Number" value="{{ old('phone') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="small ft-medium">Subject</label>
                                        <input type="text" name="subject" class="form-control rounded"
                                            placeholder="Subject" value="{{ old('subject') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="small ft-medium">State</label>
                                        <input type="text" name="state" class="form-control rounded"
                                            placeholder="State" value="{{ old('state') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="small ft-medium">City</label>
                                        <input type="text" name="city" class="form-control rounded" placeholder="City"
                                            value="{{ old('city') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="small ft-medium">Message</label>
                                        <textarea name="message" rows="5" class="form-control rounded" placeholder="Message" required>{{ old('message') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn theme-bg text-light rounded ft-medium px-4">Send
                                    Message</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="contact-info-wrap d-flex flex-md-column w-100 gap-5">
                        <div class="contact-info-box shadow-sm w-100 bg-white rounded p-4">
                            <div class="contact-info-icon theme-cl mb-3 fs-xl">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-info-text">
                                <h5 class="ft-medium mb-1">Our Address</h5>
                                <p class="mb-0 text-muted">123 Main Street, Anytown, USA</p>
                            </div>
                        </div>

                        <div class="contact-info-box shadow-sm w-100 bg-white rounded p-4">
                            <div class="contact-info-icon theme-cl mb-3 fs-xl">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-info-text">
                                <h5 class="ft-medium mb-1">Call Us</h5>
                                <p class="mb-0 text-muted">+1 (555) 123-4567</p>
                            </div>
                        </div>

                        <div class="contact-info-box shadow-sm w-100 bg-white rounded p-4">
                            <div class="contact-info-icon theme-cl mb-3 fs-xl">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-info-text">
                                <h5 class="ft-medium mb-1">Email Us</h5>
                                <p class="mb-0 text-muted">contact@example.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
