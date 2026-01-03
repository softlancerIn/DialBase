<?php

use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Route;

Route::controller(WebController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    // Search
    Route::get('/search', 'search')->name('search');
    
    // Listing detail
    Route::get('listing/{slug}', 'listing_detail')->name('listing.slug');
    Route::get('listings', 'all_listings')->name('all_listings');

    // city detail
    Route::get('city/{slug}', 'city_listing')->name('city.slug');

    // Category detail (optional location filter as path parameter)
    Route::get('category/{slug}/{location?}', 'category_detail')->name('category.slug');

    // about
    Route::get('about', 'about')->name('about');
    Route::get('mission-vision', 'mission_vision')->name('mission_vision');
    Route::get('our-strength', 'our_strength')->name('our_strength');
    Route::get('promoters', 'promoters')->name('promoters');

    // our product
    Route::get('all-categories', 'all_categories')->name('all_categories');
    Route::get('blogs', 'all_blogs')->name('all_blogs');
    Route::get('{slug}.html', 'master_function')->name('products');

    // blog
    Route::get('blog/{slug}', 'blog_details')->name('web_blog_details');
    //Route::get('blogs', 'blogs')->name('blogs');

    // other
    Route::get('quality', 'quality')->name('quality');
    Route::get('certificate', 'certificate')->name('certificate');
    Route::get('contact', 'contact')->name('contact');
    Route::post('save-enquiry', 'save_enquiry')->name('save_enquiry');
    Route::post('/listings/{slug}/reviews', [WebController::class, 'saveReview'])->name('listings.saveReview');

    Route::get('terms-and-condition', 'termsAndCondition')->name('terms_and_condition');
    Route::get('privacy-policy', 'privacyPolicy')->name('privacy_policy');

    // SEO Friendly Routes (Place at the end to avoid conflicts)
    // Route::get('{country}/{category}/{city}/{slug}', 'seo_listing_detail')->name('seo.listing.detail');
    // Route::get('{country}/{category}/{city}', 'seo_city_category')->name('seo.city.category');
});
