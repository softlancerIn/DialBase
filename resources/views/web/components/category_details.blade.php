<!-- Listing Card Component -->
<div class="Goodup-grid-wrap">
    <div class="Goodup-grid-upper">
        <div class="Goodup-pos ab-left">
            <div class="Goodup-status {{ $listing->isOpenNow() ? 'open' : 'close' }} me-2">
                {{ $listing->isOpenNow() ? 'Open' : 'Close' }}
            </div>
        </div>
        <div class="Goodup-grid-thumb">
            @php
                $featuredImage = $listing->images->where('image_type', 'featured')->first();
                $logoImage = $listing->images->where('image_type', 'logo')->first();
            @endphp
            <a href="{{ route('listing.slug', $listing->slug) }}" class="d-block text-center m-auto">
                @if ($featuredImage)
                    <img src="{{ asset('storage/' . $featuredImage->image_path) }}" class="img-fluid"
                        alt="{{ $listing->title }}">
                @else
                    <img src="{{ asset('assets/img/listing/l-5.jpg') }}" class="img-fluid" alt="">
                @endif
            </a>
        </div>
        <div class="Goodup-rating overlay">
            <div class="Goodup-aldeio">
                <div class="Goodup-rates">
                    @foreach (range(1, 5) as $i)
                        @if ($i <= round($listing?->average_rating))
                            <i class="fas fa-star"></i>
                        @else
                            <i class="fas fa-star text-gray"></i>
                        @endif
                    @endforeach
                </div>
                <div class="Goodup-all-review"><span>{{ round($listing?->reviews_count) ?? 25 }} Reviews</span></div>
            </div>
        </div>
    </div>
    <div class="Goodup-grid-fl-wrap">
        <div class="Goodup-caption px-3 py-2">
            <div class="Goodup-author">
                @if ($logoImage)
                    <img src="{{ asset('storage/' . $logoImage->image_path) }}" class="img-fluid circle" alt="">
                @else
                    <img src="{{ asset('assets/img/t-1.png') }}" class="img-fluid circle" alt="">
                @endif
            </div>
            <h4 class="mb-0 ft-medium medium">
                <p class="text-dark fs-md">{{ $listing->title }}</p>
            </h4>
            <div class="Goodup-middle-caption mt-3">
                <div class="Goodup-location">
                    <i class="fas fa-map-marker-alt"></i>{{ $listing->city }}, {{ $listing->state }}
                </div>
                <div class="Goodup-call"><i class="fas fa-phone-alt"></i>{{ $listing->mobile }}</div>
            </div>
        </div>
        <div class="Goodup-grid-footer py-3 px-3">
            <div class="Goodup-ft-first">
                <div class="Goodup-rating">
                    <div class="Goodup-rates">
                        @foreach (range(1, 5) as $i)
                            @if ($i <= round($listing?->average_rating))
                                <i class="fas fa-star"></i>
                            @else
                                <i class="fas fa-star text-gray"></i>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="Goodup-ft-last">
                <span class="small">{{ $listing->updated_at->diffForHumans() }}</span>
            </div>
        </div>
    </div>
</div>
<!-- /Listing Card Component -->
