<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookable;

class BookableAvailabilityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id, Request $request)
    {
        //
        //dd('Hello from Availcontrollr');

        $data = $request->validate([
            'from' => 'required|date_format:Y-m-d|after_or_equal:now',
            'to' => 'required|date_format:Y-m-d|after_or_equal:from'
        ]);

        //dd($data);

        $bookable = Bookable::findOrFail($id);

        //dd($bookable->bookings());

        //Checking the count of objects that are in between dates
        //dd($bookable->bookings()->betweenDates($data['from'], $data['to'])->count());
        //dd($bookable->availableFor($data['from'], $data['to']));

        return $bookable->availableFor($data['from'], $data['to'])
            ? response()->json([])
            : response()->json([], 404);
    }
}
