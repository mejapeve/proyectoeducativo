<?php

namespace App\Http\Controllers;

use App\Models\RatingPlan;
use Illuminate\Http\Request;

class RatingPlanController extends Controller
{
    //
    public function get_rating_plans(Request $request){

        return RatingPlan::all();

    }

}
