<?php

namespace App\Http\Controllers;

use App\Models\CompanySequence;
use App\Models\MomentExperience;
use App\Models\RatingPlan;
use App\Models\SequenceMoment;
use Illuminate\Http\Request;

class RatingPlanController extends Controller
{

    public function get_rating_plans(Request $request){

        $ratingPlan = RatingPlan::with('type_plan')->get();

        return response()->json(['data'=>$ratingPlan],200);
    }
    
    public function get_rating_plan_detail(Request $request, $rating_plan_id){
        $ratingPlan = RatingPlan::where('id', $rating_plan_id)->get();
        return response()->json(['data'=>$ratingPlan],200);
    }

    public function create(Request $request){

        $data = $request->all();
        $ratingPlan = new RatingPlan();
        $ratingPlan->name = $data['name'];
        $ratingPlan->description = $data['description'];
        $ratingPlan->image_url = $data['image_url'];
        $ratingPlan->price = $data['price'];
        $ratingPlan->is_free = $data['is_free'];
        $ratingPlan->type_rating_plan_id = $data['type_rating_plan_id'];
        $ratingPlan->count = $data['count'];
        $ratingPlan->days = $data['days'];
        $ratingPlan->save();
        return response()->json(['data'=>$ratingPlan],200);

    }

    public function update(Request $request){

        $data = $request->all();

        $ratingPlan = RatingPlan::findOrFail($data['id']);
        $ratingPlan->name = $data['name'];
        $ratingPlan->description = $data['description'];
        $ratingPlan->image_url = $data['image_url'];
        $ratingPlan->price = $data['price'];
        $ratingPlan->is_free = $data['is_free'];
        $ratingPlan->type_rating_plan_id = $data['type_rating_plan_id'];
        $ratingPlan->count = $data['count'];
        $ratingPlan->days = $data['days'];
        $ratingPlan->save();
        return response()->json(['data'=>$ratingPlan],200);

    }


}
