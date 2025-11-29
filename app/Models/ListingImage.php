<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ListingImage extends Model
{
    use HasFactory;

    protected $table = 'lisitngs_images';
    protected $fillable = [
        'listing_id',
        'image_type', // logo, featured, gallery
        'image_path',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
