<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialLink extends Model
{
    use HasFactory;

    protected $table = 'social_links';
    protected $fillable = [
        'listing_id',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
