<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Booking extends Model
{
    use HasFactory;

    //allow mass assign
    protected $fillable = ['from', 'to'];

    public function bookable()
    {
        return $this->belongsTo(Bookable::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function scopeBetweenDates(Builder $query, $from, $to)
    {
        return $query->where('to', '>=', $from)
            ->where('from', '<=', $to);
    }


    // Find the review key from the booking
    public static function findByReviewKey(string $reviewKey): ?Booking
    {
        return static::where('review_key', $reviewKey)->with('bookable')->get()->first();
    }


    // For every booking created it will have a review key
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($booking) {
            $booking->review_key = Str::uuid();
        });
    }
}
