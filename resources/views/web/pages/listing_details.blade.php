@extends('web.layout.main')

@section('content')
    @php
        $approvedReviews = $data['listing']->reviews ? $data['listing']->reviews->where('status', 1) : collect();
        $averageRating = $approvedReviews->avg('rating');
    @endphp
    <!-- ======================= Listing Hero Section ======================== -->
    <div class="listing-hero" style="position: relative; height: 400px; overflow: hidden;">
        @if ($data['featured_image'])
            <img src="{{ Storage::url($data['featured_image']->image_path) }}" alt="{{ $data['listing']->title }}"
                style="width: 100%; height: 100%; object-fit: cover;">
        @else
            <img src="{{ asset('assets/img/listing/l-5.jpg') }}" alt=""
                style="width: 100%; height: 100%; object-fit: cover;">
        @endif

        <!-- Overlay with listing info -->
        <div
            style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); padding: 40px 20px 20px; color: white;">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-md-8">
                        <div class="d-flex align-items-start justify-content-start">
                            <!-- Logo -->
                            <div style="flex-shrink: 0;">
                                @if ($data['logo_image'])
                                    <img src="{{ Storage::url($data['logo_image']->image_path) }}" alt="Logo"
                                        style="width: 90px; height: 90px; border-radius: 8px; border: 3px solid white; object-fit: cover;">
                                @else
                                    <img src="{{ asset('assets/img/t-1.png') }}" alt="Logo"
                                        style="width: 90px; height: 90px; border-radius: 8px; border: 3px solid white; object-fit: cover;">
                                @endif
                            </div>

                            <!-- Name & Status -->
                            <div class="ps-3">
                                <h1 class="text-light mb-0 ft-bold">{{ $data['listing']->title }}</h1>
                                <div class="Goodup-ft-first">
                                    <div class="Goodup-rating">
                                        <div class="Goodup-rates">
                                            @foreach(range(1,5) as $i)
                                                @if($i <= round($data['listing']?->average_rating))
                                                    <i class="fas fa-star"></i>
                                                @else
                                                    <i class="fas fa-star text-gray"></i>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div style="font-size:12px; color: #989bb1;">
                                        <span class="ft-medium text-light">{{ $approvedReviews->count() }} Reviews</span>
                                    </div>
                                </div>
                                <div class="d-block mt-3">
                                        <span class="ft-medium text-light"><i
                                            class="fas fa-location-arrow me-1"></i>{{ $data['listing']->address }}</span>
                                </div>
                                <div class="d-block mt-1">
                                    <div class="list-lioe">
                                        <div class="list-lioe-single"><span
                                                class="ft-medium {{ $data['listing']->is_247_open ? 'text-success' : 'text-danger' }}">{{ $data['listing']->is_247_open ? 'Open' : 'Closed' }}</span><span
                                                class="text-light ft-medium ms-2">11:00 AM - 12:00 AM</span></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-md-4 text-md-end mb-3 mt-md-0">
                        <a href="#" class="btn bg-white text-dark ft-medium rounded">See 20+ Photos</a>
                    </div> -->
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
                        @if ($data['listing']->amenities && $data['listing']->amenities->count() > 0)
                            <div class="bg-white rounded mb-4">
                                <div class="jbd-01 px-4 py-4">
                                    <div class="jbd-details mb-4">
                                        <h5 class="ft-bold fs-lg">Amenities and More</h5>

                                        <div class="Goodup-all-features-list mt-3">
                                            <ul>
                                                @foreach ($data['listing']->amenities as $amenity)
                                                    <li>
                                                        <div class="Goodup-afl-pace">
                                                            <img src="{{ asset('assets/img/verify.svg') }}"
                                                                class="img-fluid" alt="">
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
                                        @if ($approvedReviews && $approvedReviews->count() > 0)
                                            @foreach ($approvedReviews as $review)
                                                <!-- reviews-comments-item -->
                                                <div class="reviews-comments-item">
                                                    <div class="review-comments-avatar">
                                                        @if ($review->user && $review->user->profile_image)
                                                            <img src="{{ Storage::url($review->user->profile_image) }}"
                                                                class="img-fluid" alt="{{ $review->user->name }}">
                                                        @else
                                                            <img src="{{ asset('assets/img/t-1.png') }}" class="img-fluid"
                                                                alt="User">
                                                        @endif
                                                    </div>
                                                    <div class="reviews-comments-item-text">
                                                        <h4>
                                                            <a href="#">{{ $review->user->name ?? 'Anonymous' }}</a>
                                                            <span class="reviews-comments-item-date">
                                                                <i
                                                                    class="ti-calendar theme-cl me-1"></i>{{ $review->created_at->format('d M Y') }}
                                                            </span>
                                                        </h4>
                                                        <div class="listing-rating">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($i <= $review->rating)
                                                                    <i class="fas fa-star active"></i>
                                                                @else
                                                                    <i class="fas fa-star"></i>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <p>" {{ $review->review }} "</p>
                                                        <div class="pull-left reviews-reaction">
                                                            <a href="#" class="comment-like active"><i
                                                                    class="ti-thumb-up"></i> 0</a>
                                                            <a href="#" class="comment-dislike active"><i
                                                                    class="ti-thumb-down"></i> 0</a>
                                                            <a href="#" class="comment-love active"><i
                                                                    class="ti-heart"></i> 0</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--reviews-comments-item end-->
                                            @endforeach
                                        @else
                                            <div class="alert alert-info">
                                                <p class="mb-0">No reviews yet. Be the first to review this listing!</p>
                                            </div>
                                        @endif
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
                                                    @if ($data['listing']->latitude && $data['listing']->longitude)
                                                        <iframe
                                                            src="https://maps.google.com/maps?q={{ $data['listing']->latitude }},{{ $data['listing']->longitude }}&z=14&output=embed"
                                                            width="100%" height="250" style="border:0;"
                                                            allowfullscreen="" loading="lazy"
                                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                    @else
                                                        <div class="d-flex align-items-center justify-content-center"
                                                            style="height: 250px; background: #f4f4f4; color: #888;">
                                                            Map not available
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="list-map-capt">
                                                    <div class="lio-pact">
                                                        @php
                                                            $addressParts = array_map('trim', explode(',', $data['listing']->address));
                                                        @endphp
                                                        @foreach ($addressParts as $part)
                                                            <span class="hkio-oilp ft-bold">{{ $part }}</span><br>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        @php
                                                            $daysOrder = [
                                                                'Mon',
                                                                'Tue',
                                                                'Wed',
                                                                'Thu',
                                                                'Fri',
                                                                'Sat',
                                                                'Sun',
                                                            ];
                                                            $hours = $data['listing']->workingHours ?? collect();
                                                            // Normalize day labels to short form if possible
                                                            $grouped = $hours->groupBy(function ($item) {
                                                                $d = $item->day_of_week ?? ($item->day ?? 'All');
                                                                $short = substr($d, 0, 3);
                                                                return ucfirst($short);
                                                            });
                                                        @endphp

                                                        @foreach ($daysOrder as $day)
                                                            <tr>
                                                                <th scope="row">{{ $day }}</th>
                                                                <td>
                                                                    @if (isset($grouped[$day]) && $grouped[$day]->count() > 0)
                                                                        @foreach ($grouped[$day] as $entry)
                                                                            @php
                                                                                $open = $entry->open_time;
                                                                                $close = $entry->close_time;
                                                                                // if JSON, try to decode and format
                                                                                if (
                                                                                    $open &&
                                                                                    is_string($open) &&
                                                                                    \Illuminate\Support\Str::startsWith(
                                                                                        $open,
                                                                                        '[',
                                                                                    )
                                                                                ) {
                                                                                    $decodedOpen = json_decode(
                                                                                        $open,
                                                                                        true,
                                                                                    );
                                                                                    $open = is_array($decodedOpen)
                                                                                        ? implode(', ', $decodedOpen)
                                                                                        : $open;
                                                                                }
                                                                                if (
                                                                                    $close &&
                                                                                    is_string($close) &&
                                                                                    \Illuminate\Support\Str::startsWith(
                                                                                        $close,
                                                                                        '[',
                                                                                    )
                                                                                ) {
                                                                                    $decodedClose = json_decode(
                                                                                        $close,
                                                                                        true,
                                                                                    );
                                                                                    $close = is_array($decodedClose)
                                                                                        ? implode(', ', $decodedClose)
                                                                                        : $close;
                                                                                }
                                                                            @endphp
                                                                            <div>{{ $open ? $open : 'Closed' }}
                                                                                @if ($close)
                                                                                    - {{ $close }}
                                                                                @endif
                                                                            </div>
                                                                        @endforeach
                                                                    @else
                                                                        <div>Closed</div>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @php
                                                                        $isOpenNow = false;
                                                                        // If any entry has is_247_open flag true, mark open
                                                                        if (
                                                                            isset($grouped[$day]) &&
                                                                            $grouped[$day]
                                                                                ->where('is_247_open', true)
                                                                                ->count() > 0
                                                                        ) {
                                                                            $isOpenNow = true;
                                                                        }
                                                                    @endphp
                                                                    @if ($isOpenNow)
                                                                        <span class="text-success">Open now</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
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

                                    <form action='{{ route('listings.saveReview', $data['listing']->slug) }}'
                                        method='POST'>
                                        @csrf
                                        <div class="row">

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label class="ft-medium small mb-1">Choose Rate</label>
                                                    <select class="form-control rounded" name='rating' required>
                                                        <option value=''>Choose Rating</option>
                                                        <option value='1'>1</option>
                                                        <option value='2'>2</option>
                                                        <option value='3'>3</option>
                                                        <option value='4'>4</option>
                                                        <option value='5'>5</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label class="ft-medium small mb-1">Name</label>
                                                    <input name="name" class="form-control rounded" type="text"
                                                        placeholder="Your Name">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label class="ft-medium small mb-1">Email</label>
                                                    <input name="email" class="form-control rounded" type="email"
                                                        placeholder="Your Email" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label class="ft-medium small mb-1">Review</label>
                                                    <textarea class="form-control rounded ht-140" name='review' placeholder="Review" required></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn theme-bg text-light rounded"
                                                        fdprocessedid="l6x365">Submit Review</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Order Food -->
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="jb-apply-form bg-white rounded py-4 px-4 box-static mb-4">
                        <div class="uli-list-info mb-2">
                            <ul>

                                <li>
                                    <div class="list-uiyt">
                                        <div class="list-iobk"><i class="fas fa-globe"></i></div>
                                        <div class="list-uiyt-capt">
                                            <h5>Live Site</h5>
                                            <p>{{ $data['listing']->website }}</p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="list-uiyt">
                                        <div class="list-iobk"><i class="fas fa-envelope"></i></div>
                                        <div class="list-uiyt-capt">
                                            <h5>Drop a Mail</h5>
                                            <p>{{ $data['listing']->email }}</p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="list-uiyt">
                                        <div class="list-iobk"><i class="fas fa-phone"></i></div>
                                        <div class="list-uiyt-capt">
                                            <h5>Call Us</h5>
                                            <p>{{ $data['listing']->phone }}</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-uiyt">
                                        <div class="list-iobk"><i class="fas fa-map-marker-alt"></i></div>
                                        <div class="list-uiyt-capt">
                                            <h5>Get Directions</h5>
                                            <p>{{ $data['listing']->address }}</p>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>

                        <div class="form-group">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#enquiryModal"
                                class="btn btn-md rounded theme-bg text-light ft-medium fs-sm full-width">Enquiry</button>
                        </div>
                    </div>

                    <div class="jb-apply-form bg-white rounded py-4 px-4 box-static mb-4">
                        <div class="uli-list-info">
                            <ul>

                                <li>
                                    <div class="list-uiyt">
                                        <div class="list-iobk"><i class="fab fa-instagram"></i></div>
                                        <div class="list-uiyt-capt">
                                            <h5>instagram</h5>
                                            <p>{{ optional($data['listing']->socialLink)->instagram }}</p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="list-uiyt">
                                        <div class="list-iobk"><i class="fab fa-facebook"></i></div>
                                        <div class="list-uiyt-capt">
                                            <h5>facebook</h5>
                                            <p>{{ optional($data['listing']->socialLink)->facebook }}</p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="list-uiyt">
                                        <div class="list-iobk"><i class="fab fa-linkedin"></i></div>
                                        <div class="list-uiyt-capt">
                                            <h5>LinkedIn</h5>
                                            <p>{{ optional($data['listing']->socialLink)->linkedin }}</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-uiyt">
                                        <div class="list-iobk"><i class="fab fa-youtube"></i></div>
                                        <div class="list-uiyt-capt">
                                            <h5>YouTube</h5>
                                            <p>{{ optional($data['listing']->socialLink)->youtube ?? 'https://youtube.com' }}</p>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-4"><a href="javascript:void(0);" class="adv-btn full-width"><i
                                    class="fas fa-share"></i>Share</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================= About & Order End ======================== -->

    <!-- Enquiry Modal -->
    <div class="modal fade" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ft-bold" id="enquiryModalLabel">Send Enquiry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('listings.saveEnquiry', $data['listing']->slug) }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="ft-medium small mb-1">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control rounded" placeholder="Your Name" value="{{ old('name') }}" required>
                            @error('name')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="ft-medium small mb-1">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control rounded" placeholder="Your Email" value="{{ old('email') }}" required>
                            @error('email')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="ft-medium small mb-1">Phone <span class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control rounded" placeholder="Your Phone" value="{{ old('phone') }}" required>
                            @error('phone')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="ft-medium small mb-1">Subject <span class="text-danger">*</span></label>
                            <input type="text" name="subject" class="form-control rounded" placeholder="Subject" value="{{ old('subject') }}" required>
                            @error('subject')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="ft-medium small mb-1">Message <span class="text-danger">*</span></label>
                            <textarea name="message" class="form-control rounded" placeholder="Your Message" rows="4" required>{{ old('message') }}</textarea>
                            @error('message')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn theme-bg text-light rounded ft-medium full-width">Submit Enquiry</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Enquiry Modal End ======================== -->
@endsection
