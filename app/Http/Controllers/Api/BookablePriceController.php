<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Bookable;
use Carbon\Carbon;

class BookablePriceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id, Request $request)
    {
        //Determine price for dates:

        $bookable = Bookable::findOrFail($id);

        $data = $request->validate([
            'from' => 'required|date_format:Y-m-d',
            'to' => 'required|date_format:Y-m-d|after_or_equal:fro'
        ]);

        //$days = (new Carbon($data['from']))->diffInDays(new Carbon($data['to'])) + 1;
        //$price = $days * $bookable->price;

        return response()->json([
            'data' => $bookable->priceFor($data['from'], $data['to'])
           
        ]);

        // return response()->json([
        //     'data' => $bookable->priceFor($data['from'], $data['to'])
        // ]);
    }
}
