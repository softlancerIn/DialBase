<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function listings()
    {
        return $this->belongsToMany(Listing::class, 'listing_amenities');
    }
}
