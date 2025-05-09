<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    protected $table = 'listing_amenities';
    protected $fillable = ['name'];

    public function listings()
    {
        return $this->belongsToMany(Listing::class, 'listing_amenities');
    }
}
