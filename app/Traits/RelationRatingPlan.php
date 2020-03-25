<?php

namespace App\Traits;

use App\Models\CompanySequence;
use App\Models\MomentExperience;
use App\Models\SequenceMoment;

trait RelationRatingPlan
{
    //
    public function relation_rating_plan ($shopingCarts){

        for ($i=0; $i < count($shopingCarts); $i++) {
            if (isset($shopingCarts[$i]->rating_plan)) {
                if ($shopingCarts[$i]->rating_plan->sequences_included !== null) {
                    $sequences = explode(',', $shopingCarts[$i]->rating_plan->sequence_company_ids);
                    $shopingCarts[$i]['rating_plan']['sequences'] = CompanySequence::whereIn('id', $sequences)->get();
                } else {
                    if ($shopingCarts[$i]->rating_plan->moments_included !== null) {
                        $moments = explode(',', $shopingCarts[$i]->rating_plan->sequence_moments_ids);
                        $shopingCarts[$i]['rating_plan']['moments'] = SequenceMoment::whereIn('id', $moments)->get();
                    } else {
                        if ($shopingCarts[$i]->rating_plan->experiences_included !== null) {
                            $experiences = explode(',', $shopingCarts[$i]->rating_plan->sequence_experience_ids);
                            $shopingCarts[$i]['rating_plan']['experiences'] = MomentExperience::whereIn('id', $experiences)->get();
                        }

                    }
                }
            }
        }
        return $shopingCarts;
    }



}