<?php

namespace App\Models;

use HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    // use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'keywords',
        'about',
        'latitude',
        'longitude',
        'state',
        'city',
        'address',
        'zip_code',
        'mobile',
        'email',
        'website',
        'is_247_open',
    ];

    public function images()
    {
        return $this->hasMany(ListingImage::class);
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function workingHours()
    {
        return $this->hasMany(WorkingHour::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'listing_amenities', 'listing_id', 'amenity_id');
    }    

    public function socialLink()
    {
        return $this->hasOne(SocialLink::class);
    }
}
