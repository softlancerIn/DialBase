<?php

namespace App\Models;

use HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    // use HasFactory;
    protected $fillable = [
        'title',
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

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'listing_amenities');
    }

    public function socialLink()
    {
        return $this->hasOne(SocialLink::class);
    }
}
