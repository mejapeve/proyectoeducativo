<?php

namespace App\Http\Controllers;

use App\Models\CompanySequence;
use App\Models\MomentExperience;
use App\Models\RatingPlan;
use App\Models\SequenceMoment;
use Illuminate\Http\Request;

class RatingPlanController extends Controller
{
    //
    public function get_rating_plans(Request $request){

        $ratingPlan = RatingPlan::all();
        for ($i=0; $i < count($ratingPlan); $i++) {

            if ($ratingPlan[$i]->sequences_included !== null) {
                $sequences = explode(',', $ratingPlan[$i]->sequence_company_ids);
                $ratingPlan[$i]['sequences'] = CompanySequence::whereIn('id', $sequences)->get();
            } else {
                if ($ratingPlan[$i]->moments_included !== null) {
                    $moments = explode(',', $ratingPlan[$i]->sequence_moments_ids);
                    $ratingPlan[$i]['moments'] = SequenceMoment::whereIn('id', $moments)->get();
                } else {
                    if ($ratingPlan[$i]->experiences_included !== null) {
                        $experiences = explode(',', $ratingPlan[$i]->sequence_experience_ids);
                        $ratingPlan[$i]['experiences'] = MomentExperience::whereIn('id', $experiences)->get();
                    }

                }
            }

        }
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
        $ratingPlan->sequences_included = $data['sequences_included'];
        $ratingPlan->moments_included = $data['moments_included'];
        $ratingPlan->sequence_company_ids = $data['sequence_company_ids'];
        $ratingPlan->sequence_moment_ids = $data['sequence_moment_ids'];
        $ratingPlan->sequence_experience_ids = $data['sequence_experience_ids'];
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
        $ratingPlan->sequences_included = $data['sequences_included'];
        $ratingPlan->moments_included = $data['moments_included'];
        $ratingPlan->sequence_company_ids = $data['sequence_company_ids'];
        $ratingPlan->sequence_moment_ids = $data['sequence_moment_ids'];
        $ratingPlan->sequence_experience_ids = $data['sequence_experience_ids'];
        $ratingPlan->save();
        return response()->json(['data'=>$ratingPlan],200);

    }


}
