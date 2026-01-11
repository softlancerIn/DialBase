<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Listing extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
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
        'is_featured',
        'is_247_open',
        'status',
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
        return $this->hasMany(ListingWorkingHour::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'listing_amenities', 'listing_id', 'amenity_id');
    }    

    public function socialLink()
    {
        return $this->hasOne(SocialLink::class);
    }

    public function reviews()
    {
        return $this->hasMany(ListingReview::class);
    }

    /**
     * Determine whether the listing is open now based on working hours.
     * Returns boolean.
     */
    public function isOpenNow()
    {
        $now = Carbon::now();
        $todayShort = $now->format('D'); // Mon, Tue, ...

        $hours = $this->relationLoaded('workingHours') ? $this->workingHours : $this->workingHours()->get();
        foreach ($hours as $h) {
            $dayKey = ucfirst(substr($h->day_of_week ?? 'All', 0, 3));
            if ($dayKey !== $todayShort && strtolower($h->day_of_week ?? '') !== 'all') {
                continue;
            }

            if (! empty($h->is_247_open)) {
                return true;
            }

            $opensRaw = $h->open_time;
            $closesRaw = $h->close_time;

            $opens = [];
            $closes = [];

            if (is_string($opensRaw) && strlen($opensRaw) > 0 && strpos($opensRaw, '[') === 0) {
                $decoded = json_decode($opensRaw, true);
                if (is_array($decoded)) {
                    $opens = $decoded;
                }
            } elseif (! empty($opensRaw)) {
                $opens = [$opensRaw];
            }

            if (is_string($closesRaw) && strlen($closesRaw) > 0 && strpos($closesRaw, '[') === 0) {
                $decoded = json_decode($closesRaw, true);
                if (is_array($decoded)) {
                    $closes = $decoded;
                }
            } elseif (! empty($closesRaw)) {
                $closes = [$closesRaw];
            }

            $pairs = max(count($opens), count($closes));
            for ($i = 0; $i < $pairs; $i++) {
                $openVal = $opens[$i] ?? null;
                $closeVal = $closes[$i] ?? null;
                if (empty($openVal) || empty($closeVal)) {
                    continue;
                }

                try {
                    $start = Carbon::parse($openVal)->setDate($now->year, $now->month, $now->day);
                    $end = Carbon::parse($closeVal)->setDate($now->year, $now->month, $now->day);
                    if ($end->lessThanOrEqualTo($start)) {
                        $end = $end->addDay();
                    }

                    if ($now->between($start, $end)) {
                        return true;
                    }
                } catch (\Exception $e) {
                    // ignore parse errors
                    continue;
                }
            }
        }

        return false;
    }

    /**
     * Accessor to override `is_247_open` when workingHours are loaded.
     * This allows views to reference $listing->is_247_open and get computed result.
     */
    public function getIs247OpenAttribute($value)
    {
        if ($this->relationLoaded('workingHours')) {
            return $this->isOpenNow() ? 1 : 0;
        }

        return (int) ($value ?? 0);
    }
}
