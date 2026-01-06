@extends('web.layout.main')

@section('content')

<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2 class="ipt-title">Contact Us</h2>
                <span class="ipn-subtitle">We would love to hear from you</span>
            </div>
        </div>
    </div>
</div>
    <section class="contact-us section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <form class="contact-form" method="post" action="#">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="message" rows="5" class="form-control" placeholder="Message"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact-info">
                        <h4>Contact Information</h4>
                        <p>If you have any questions, feel free to reach out to us using the information below:</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-map-marker-alt"></i> 123 Main Street, Anytown, USA</li>
                            <li><i class="fas fa-phone"></i> +1 (555) 123-4567</li>
                            <li><i class="fas fa-envelope"></i> contact@example.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection