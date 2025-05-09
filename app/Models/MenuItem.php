<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuItem extends Model
{
    use HasFactory;

    protected $table = 'menu_items';
    protected $fillable = [
        'listing_id',
        'item_name',
        'category',
        'price',
        'about_item',
        'item_image',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
