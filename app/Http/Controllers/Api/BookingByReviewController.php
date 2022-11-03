<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

use App\Http\Resources\BookingByReviewShowResource;

class BookingByReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($reviewKey, Request $request)
    {
        //return Booking::findByReviewKey($reviewKey) ?? abort(404);

        //return abort(500);
        $booking = Booking::findByReviewKey($reviewKey);
        return $booking ? new BookingByReviewShowResource($booking) : abort(404);

    }
}
