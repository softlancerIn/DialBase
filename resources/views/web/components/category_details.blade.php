<!-- Listing Card Component -->
<div class="Goodup-grid-wrap">
    <div class="Goodup-grid-upper">
        <div class="Goodup-pos ab-left">
            <div class="Goodup-status {{ $listing->is_247_open ? 'open' : 'close' }} me-2">
                {{ $listing->is_247_open ? 'Open' : 'Close' }}
            </div>
        </div>
        <div class="Goodup-grid-thumb">
            @php
                $featuredImage = $listing->images->where('type', 'featured')->first();
                $logoImage = $listing->images->where('type', 'logo')->first();
            @endphp
            <a href="{{ route('listing.slug', $listing->slug) }}" class="d-block text-center m-auto">
                @if($featuredImage)
                    <img src="{{ Storage::url($featuredImage->image_path) }}" class="img-fluid" alt="{{ $listing->title }}">
                @else
                    <img src="{{ asset('assets/img/listing/l-5.jpg') }}" class="img-fluid" alt="">
                @endif
            </a>
        </div>
        <div class="Goodup-rating overlay">
            <div class="Goodup-pr-average high">4.5</div>
            <div class="Goodup-aldeio">
                <div class="Goodup-rates">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="Goodup-all-review"><span>25 Reviews</span></div>
            </div>
        </div>
    </div>
    <div class="Goodup-grid-fl-wrap">
        <div class="Goodup-caption px-3 py-2">
            <div class="Goodup-author">
                @if ($logoImage)
                    <img src="{{ Storage::url($logoImage->image_path) }}" class="img-fluid circle" alt="">
                @else
                    <img src="{{ asset('assets/img/t-1.png') }}" class="img-fluid circle" alt="">
                @endif
            </div>
            <h4 class="mb-0 ft-medium medium">
                <p class="text-dark fs-md">{{ $listing->title }}</p>
            </h4>
            <div class="Goodup-location">
                <i class="fas fa-map-marker-alt me-1 theme-cl"></i>{{ $listing->city }}, {{ $listing->state }}
            </div>
            <div class="Goodup-middle-caption mt-3">
                <p>{{ Str::limit($listing->about, 60) }}</p>
            </div>
        </div>
        @php
            $category = $listing->category() ? $listing->category()->first() : null;
        @endphp
        <div class="Goodup-grid-footer py-2 px-3">
            <div class="Goodup-ft-first">
                @if ($category)
                    <a href="{{ route('category.slug', $category->slug) }}" class="Goodup-cats-wrap">
                        <div class="cats-ico bg-2"><i class="lni lni-slim"></i></div>
                        <span class="cats-title">{{ $category->name }}</span>
                    </a>
                @else
                    <span class="cats-title">Uncategorized</span>
                @endif
            </div>
            <div class="Goodup-ft-last">
                <div class="Goodup-inline">
                    <div class="Goodup-bookmark-btn">
                        <button type="button"><i class="lni lni-envelope position-absolute"></i></button>
                    </div>
                    <div class="Goodup-bookmark-btn">
                        <button type="button"><i class="lni lni-heart-filled position-absolute"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Listing Card Component -->
