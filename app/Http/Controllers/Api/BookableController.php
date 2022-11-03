<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//use App\Bookable;
use App\Models\Bookable;
use App\Http\Resources\BookableIndexResource;
use App\Http\Resources\BookableShowResource;

class BookableController extends Controller
{
    //
    public function index()
    {
        //return Bookable::all();

        return BookableIndexResource::collection(
            Bookable::all()
        );
    }

    public function show($id)
    {
        //return Bookable::findOrFail($id);

        return new BookableShowResource(Bookable::findOrFail($id));
    }
}
