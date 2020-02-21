<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    //

    public function get_cities () {

        return response()->json([
            'data' => City::all()
        ],200);

    }

}
