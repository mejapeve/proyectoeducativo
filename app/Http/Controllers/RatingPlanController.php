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

}
