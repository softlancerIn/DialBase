<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkingHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'day',
        'open_time',
        'close_time',
        'is_247_open',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
