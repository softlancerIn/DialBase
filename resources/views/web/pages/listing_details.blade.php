@extends('web.layout.main')

@section('content')
    <!-- ======================= Listing Hero Section ======================== -->
    <div class="listing-hero" style="position: relative; height: 400px; overflow: hidden;">
        @if($data['featured_image'])
            <img src="{{ Storage::url($data['featured_image']->image_path) }}" 
                 alt="{{ $data['listing']->title }}" 
                 style="width: 100%; height: 100%; object-fit: cover;">
        @else
            <img src="{{ asset('assets/img/listing/l-5.jpg') }}" 
                 alt="" 
                 style="width: 100%; height: 100%; object-fit: cover;">
        @endif

        <!-- Overlay with listing info -->
        <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); padding: 40px 20px 20px; color: white;">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-md-8">
                        <div class="d-flex align-items-start justify-content-start">
                            <!-- Logo -->
                            <div style="flex-shrink: 0;">
                                @if($data['logo_image'])
                                    <img src="{{ Storage::url($data['logo_image']->image_path) }}" 
                                         alt="Logo" 
                                         style="width: 90px; height: 90px; border-radius: 8px; border: 3px solid white; object-fit: cover;">
                                @else
                                    <img src="{{ asset('assets/img/t-1.png') }}" 
                                         alt="Logo" 
                                         style="width: 90px; height: 90px; border-radius: 8px; border: 3px solid white; object-fit: cover;">
                                @endif
                            </div>

                            <!-- Name & Status -->
                            <div class="ps-3">
                                <h1 class="text-light mb-0 ft-bold">{{ $data['listing']->title }}</h1>
                                <div class="Goodup-ft-first">
                                    <div class="Goodup-rating">
                                        <div class="Goodup-rates">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div style="font-size:12px; color: #989bb1;">
                                        <span class="ft-medium text-light">34 Reviews</span>
                                    </div>
                                </div>
                                <div class="d-block mt-3">
                                    <div class="list-lioe">
                                        <div class="list-lioe-single"><span class="ft-medium text-info"><i class="fas fa-check-circle me-1"></i>Claimed</span></div>
                                        <div class="list-lioe-single ms-2 ps-3 seperate">
                                            <a href="javascript:void(0);" class="text-light ft-medium">Chicken Wings</a>,<a href="javascript:void(0);" class="text-light ft-medium ms-1">Sports Bars</a>,<a href="javascript:void(0);" class="text-light ft-medium ms-1">American (Traditional)</a>,<a href="javascript:void(0);" class="text-light ft-medium ms-1">Seafood</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-block mt-1">
                                    <div class="list-lioe">
                                        <div class="list-lioe-single"><span class="ft-medium {{ $data['listing']->is_247_open ? 'text-success' : 'text-danger' }}">{{ $data['listing']->is_247_open ? 'Open' : 'Closed' }}</span><span class="text-light ft-medium ms-2">11:00 AM - 12:00 AM</span></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 text-md-end mb-3 mt-md-0">
                        <a href="#" class="btn bg-white text-dark ft-medium rounded">See 20+ Photos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Listing Hero End ======================== -->

    <!-- ======================= About & Order Section ======================== -->
    <section class="gray py-5 position-relative">
        <div class="container">
            <div class="row">
                <!-- Left: About -->
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                    <div class="bg-white rounded mb-4">
                        <div class="px-4 py-4">
                            <h3 class="ft-bold mb-4">About the Business</h3>
                            <p>{{ $data['listing']->about }}</p>
                        </div>

                        <!-- Amenities -->
                        @if($data['listing']->amenities && $data['listing']->amenities->count() > 0)
                        <div class="mt-4">
                            <h5 class="ft-bold mb-3">Amenities</h5>
                            <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                                @foreach($data['listing']->amenities as $amenity)
                                    <span class="badge bg-light text-dark">{{ $amenity->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Amenities -->
                        @if($data['listing']->amenities && $data['listing']->amenities->count() > 0)
                            <div class="bg-white rounded mb-4">
                                <div class="jbd-01 px-4 py-4">
                                    <div class="jbd-details mb-4">
                                        <h5 class="ft-bold fs-lg">Amenities and More</h5>
                                        
                                        <div class="Goodup-all-features-list mt-3">
                                            <ul>
                                                @foreach($data['listing']->amenities as $amenity)
                                                    <li>
                                                        <div class="Goodup-afl-pace">
                                                            <img src="{{ asset('assets/img/verify.svg') }}" class="img-fluid" alt="">
                                                            <span>{{ $amenity->name }}</span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Reviews -->
                        <div class="bg-white rounded mb-4">
                            <div class="jbd-01 px-4 py-4">
                                <div class="jbd-details mb-4">
                                    <h5 class="ft-bold fs-lg">Recommended Reviews</h5>
                                    <div class="reviews-comments-wrap">
                                    
                                        <!-- reviews-comments-item -->  
                                        <div class="reviews-comments-item">
                                            <div class="review-comments-avatar">
                                                <img src="{{ asset('assets/img/t-1.png')}}" class="img-fluid" alt=""> 
                                            </div>
                                            <div class="reviews-comments-item-text">
                                                <h4><a href="#">Kayla E. Claxton</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl me-1"></i>27 Oct 2019</span></h4>
                                                <span class="agd-location"><i class="lni lni-map-marker me-1"></i>San Francisco, USA</span>
                                                <div class="listing-rating high"><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i></div>
                                                <div class="clearfix"></div>
                                                <p>" Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. "</p>
                                                <div class="pull-left reviews-reaction">
                                                    <a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>
                                                    <a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>
                                                    <a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--reviews-comments-item end-->  
                                        
                                        <!-- reviews-comments-item -->  
                                        <div class="reviews-comments-item">
                                            <div class="review-comments-avatar">
                                                <img src="{{ asset('assets/img/t-2.png')}}" class="img-fluid" alt=""> 
                                            </div>
                                            <div class="reviews-comments-item-text">
                                                <h4><a href="#">Amy M. Taylor</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl me-1"></i>2 Nov May 2019</span></h4>
                                                <span class="agd-location"><i class="lni lni-map-marker me-1"></i>Liverpool, London UK</span>
                                                <div class="listing-rating mid"><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star"></i></div>
                                                <div class="clearfix"></div>
                                                <p>" Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. "</p>
                                                <div class="pull-left reviews-reaction">
                                                    <a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>
                                                    <a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>
                                                    <a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--reviews-comments-item end-->
                                        
                                        <!-- reviews-comments-item -->  
                                        <div class="reviews-comments-item">
                                            <div class="review-comments-avatar">
                                                <img src="{{ asset('assets/img/t-3.png')}}" class="img-fluid" alt=""> 
                                            </div>
                                            <div class="reviews-comments-item-text">
                                                <h4><a href="#">Susan C. Daggett</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl me-1"></i>10 Nov 2019</span></h4>
                                                <span class="agd-location"><i class="lni lni-map-marker me-1"></i>Denver, United State</span>
                                                <div class="listing-rating good"><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star active"></i><i class="fas fa-star"></i></div>
                                                <div class="clearfix"></div>
                                                <p>" Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. "</p>
                                                <div class="pull-left reviews-reaction">
                                                    <a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>
                                                    <a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>
                                                    <a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--reviews-comments-item end-->
                                        
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                <span class="fas fa-arrow-circle-right"></span>
                                                <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item active"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                                            <li class="page-item"><a class="page-link" href="#">18</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                <span class="fas fa-arrow-circle-right"></span>
                                                <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Locations -->
                         <div class="bg-white rounded mb-4">
                            <div class="jbd-01 px-4 py-4">
                                <div class="jbd-details mb-4">
                                    <h5 class="ft-bold fs-lg">Location &amp; Hours</h5>
                                    <div class="Goodup-lot-wrap d-block">
                                        <div class="row g-4">
                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="list-map-lot">
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.0148908503734!2d80.97350361499701!3d26.871267983145383!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd9a9f6d1727%3A0xb87eabf63f7e4cee!2sCafe%20Repertwahr!5e0!3m2!1sen!2sin!4v1649059491407!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                </div>
                                                <div class="list-map-capt">
                                                    <div class="lio-pact"><span class="ft-medium text-info">2919 N Flores St</span></div>
                                                    <div class="lio-pact"><span class="hkio-oilp ft-bold">San Antonio, TX 78212</span></div>
                                                    <div class="lio-pact"><p class="ft-medium">Alta Vista</p></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Mon</th>
                                                            <td>5:00 PM - 8:30 PM</td>
                                                            <td class="text-success">Open now</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tue</td>
                                                            <td>5:00 PM - 8:30 PM</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Wed</td>
                                                            <td>5:00 PM - 8:30 PM</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Thu</td>
                                                            <td>5:00 PM - 8:30 PM</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Fri</td>
                                                            <td>5:00 PM - 6:30 PM</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sat</td>
                                                            <td>Closed</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sun</td>
                                                            <td>Closed</td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Write a review -->
                        <div class="bg-white rounded mb-4">
                            <div class="jbd-01 px-4 py-4">
                                <div class="jbd-details mb-4">
                                    <h5 class="ft-bold fs-lg">Drop Your Review</h5>
                                    <div class="review-form-box form-submit mt-3">
                                        <form>
                                            <div class="row">
                                                
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group mb-3">
                                                        <label class="ft-medium small mb-1">Choose Rate</label>
                                                        <select class="form-control rounded" fdprocessedid="ttdgyr">
                                                            <option>Choose Rating</option>
                                                            <option>1 Star</option>
                                                            <option>2 Star</option>
                                                            <option>3 Star</option>
                                                            <option>4 Star</option>
                                                            <option>5 Star</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group mb-3">
                                                        <label class="ft-medium small mb-1">Name</label>
                                                        <input class="form-control rounded" type="text" placeholder="Your Name" fdprocessedid="6mqrr">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group mb-3">
                                                        <label class="ft-medium small mb-1">Email</label>
                                                        <input class="form-control rounded" type="email" placeholder="Your Email" fdprocessedid="n0m6x4">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group mb-3">
                                                        <label class="ft-medium small mb-1">Review</label>
                                                        <textarea class="form-control rounded ht-140" placeholder="Review"></textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn theme-bg text-light rounded" fdprocessedid="l6x365">Submit Review</button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Order Food -->
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="bg-white rounded py-4 px-4 box-static mb-4">
                        <h4 class="ft-bold mb-1">Order Food</h4>
                        
                        <div style="display: block; width: 100%; position: relative; padding: 2rem 0;">
                            <ul style="display: inline-block; padding: 0; margin: 0;">
                                <li style="display: inline-block; list-style: none; padding: 1px 12px; font-weight: 500; color: #252525; border-right: 1px solid #eceef2;">$0.99+<span>delivery fee</span></li>
                                <li style="display: inline-block; list-style: none; padding: 1px 12px; font-weight: 500; color: #252525; border-right: 1px solid #eceef2;">$0<span>min</span></li>
                                <li style="display: inline-block; list-style: none; padding: 1px 12px; font-weight: 500; color: #252525; border-right: 1px solid #eceef2;">35-45<span>mins</span></li>
                            </ul>
                        </div>
                        
                        <form class="_apply_form_form">
                            <div class="form-group">
                                <div class="side-search-item">
                                    <span class="search-tag"><i class="lni lni-map-marker"></i></span>
                                    <input type="text" class="form-control b-0 ps-2" placeholder="Enter delivery address" fdprocessedid="bf6noq">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="button" class="btn btn-md rounded theme-bg text-light ft-medium fs-sm full-width" fdprocessedid="3341wf">Start Your Order</button>
                            </div>									
                        </form>
                        
                    </div>

                    <div class="jb-apply-form bg-white rounded py-4 px-4 box-static mb-4">
                        <div class="uli-list-info">
                            <ul>
                                
                                <li>
                                    <div class="list-uiyt">
                                        <div class="list-iobk"><i class="fas fa-globe"></i></div>
                                        <div class="list-uiyt-capt"><h5>Live Site</h5><p>https://www.Goodup.com/</p></div>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="list-uiyt">
                                        <div class="list-iobk"><i class="fas fa-envelope"></i></div>
                                        <div class="list-uiyt-capt"><h5>Drop a Mail</h5><p>support@Goodup.com</p></div>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="list-uiyt">
                                        <div class="list-iobk"><i class="fas fa-phone"></i></div>
                                        <div class="list-uiyt-capt"><h5>Call Us</h5><p>(210) 659 584 756</p></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-uiyt">
                                        <div class="list-iobk"><i class="fas fa-map-marker-alt"></i></div>
                                        <div class="list-uiyt-capt"><h5>Get Directions</h5><p>2919 N Flores St San Antonio, TX 78212</p></div>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-4"><a href="javascript:void(0);" class="adv-btn full-width"><i class="fas fa-share"></i>Share</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================= About & Order End ======================== -->
@endsection
