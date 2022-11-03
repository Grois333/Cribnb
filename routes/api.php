<?php

//use App\Bookable;
use App\Models\Bookable;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//php artisan route:list

//Return all data from Bookable Table
// Route::get('bookables', function (Request $request){
//     return Bookable::all();
// });

//Get with Params
// Route::get('bookables/{id}', function (Request $request, $bookableId){
//     return Bookable::find($bookableId);
// });

//Required Parameter
// Route::get('bookables/{hello}/{name}', function (Request $request, $bookableId, $second){
//     dd( $bookableId, $second);
//     return Bookable::find($bookableId);
// });

//Optional Parameter
// Route::get('bookables/{id}/{optional?}', function (Request $request, $id, $optional = null){
//     //dd( $id, $optional);
//     return Bookable::findOrFail($id);
// });


//Controllers:

// Route::get('bookables', 'App\Http\Controllers\Api\BookableController@index');
// Route::get('bookables/{id}', 'App\Http\Controllers\Api\BookableController@show');

//All possible endpoints for Controller
//Route::apiResource('bookables', 'App\Http\Controllers\Api\BookableController');

//Only show the ones that we want
Route::apiResource('bookables', 'App\Http\Controllers\Api\BookableController')->only(['index', 'show']);

//Bookable Availablity
Route::get('bookables/{bookable}/availability', 'App\Http\Controllers\Api\BookableAvailabilityController')->name('bookables.availability.show');

//Bookable Reviews
Route::get('bookables/{bookable}/reviews', 'App\Http\Controllers\Api\BookableReviewController')->name('bookables.reviews.index');


//Booking Review Key
Route::get('/booking-by-review/{reviewKey}', 'App\Http\Controllers\Api\BookingByReviewController')->name('booking.by-review.show');


//Review Route
Route::apiResource('reviews', 'App\Http\Controllers\Api\ReviewController')->only(['show', 'store']);


//Get Price
Route::get('bookables/{bookable}/price', 'App\Http\Controllers\Api\BookablePriceController')->name('bookables.price.show');


//Checkout
Route::post('checkout', 'App\Http\Controllers\Api\CheckoutController')->name('checkout');