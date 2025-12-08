<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'slug',
        'image',
        'icon',
        'description',
        'cat_id',
        'status',
    ];

    public function listing()
    {
        return $this->hasMany(Listing::class, 'category_id', 'id');
    }
}
