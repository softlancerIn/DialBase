<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingWorkingHour extends Model
{
    protected $table = 'listing_working_hours';

    protected $fillable = [
        'listing_id',
        'day_of_week',
        'open_time',
        'close_time',
        'is_247_open',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
