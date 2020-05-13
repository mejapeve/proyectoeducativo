<?php

namespace App\Http\Controllers;

use App\Models\RatingPlan;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request){
		$rating_plan_id_free = RatingPlan::where('is_free',true)->first();
		return view('welcome',['rating_plan_id_free'=>$rating_plan_id_free->id]);
    }
}
