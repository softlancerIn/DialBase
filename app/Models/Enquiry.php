<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enquiry extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
