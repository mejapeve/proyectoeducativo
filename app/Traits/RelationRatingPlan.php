<?php

namespace App\Traits;

use App\Models\CompanySequence;
use App\Models\MomentExperience;
use App\Models\SequenceMoment;

trait RelationRatingPlan
{
    //
    public function relation_rating_plan ($shopingCarts){
        $sequencesCache = cache()->tags('connection_sequences')->rememberForever('sequences',function(){
           return CompanySequence::all();
        });
        $momentsCache = cache()->tags('connection_moments')->rememberForever('moments',function(){
            return SequenceMoment::all();
        });
        $experiencesCache = cache()->tags('connection_experiences')->rememberForever('experiences',function(){
            return MomentExperience::all();
        });
        for ($i=0; $i < count($shopingCarts); $i++) {
            if (isset($shopingCarts[$i]->rating_plan)) {
                if ($shopingCarts[$i]->rating_plan->sequences_included !== null) {
                    $sequences = explode(',', $shopingCarts[$i]->rating_plan->sequence_company_ids);
                    $shopingCarts[$i]['rating_plan']['sequences'] = $sequencesCache->whereIn('id', $sequences);
                } else {
                    if ($shopingCarts[$i]->rating_plan->moments_included !== null) {
                        $moments = explode(',', $shopingCarts[$i]->rating_plan->sequence_moment_ids);
                        $shopingCarts[$i]['rating_plan']['moments'] = $momentsCache->whereIn('id', $moments);
                    } else {
                        if ($shopingCarts[$i]->rating_plan->experiences_included !== null) {
                            $experiences = explode(',', $shopingCarts[$i]->rating_plan->sequence_experience_ids);
                            $shopingCarts[$i]['rating_plan']['experiences'] = $experiencesCache->whereIn('id', $experiences);
                        }

                    }
                }
            }
        }
        return $shopingCarts;
/*
        $CompanySequence=CompanySequence::all();
        $SequenceMoment=SequenceMoment::all();
        $MomentExperience=MomentExperience::all();
        for ($i=0; $i < count($shopingCarts); $i++) {
            if (isset($shopingCarts[$i]->rating_plan)) {
                if ($shopingCarts[$i]->rating_plan->sequences_included !== null) {
                    $sequences = explode(',', $shopingCarts[$i]->rating_plan->sequence_company_ids);
                    $shopingCarts[$i]['rating_plan']['sequences'] = $CompanySequence->whereIn('id', $sequences);
                } else {
                    if ($shopingCarts[$i]->rating_plan->moments_included !== null) {
                        $moments = explode(',', $shopingCarts[$i]->rating_plan->sequence_moments_ids);
                        $shopingCarts[$i]['rating_plan']['moments'] = $SequenceMoment->whereIn('id', $moments);
                    } else {
                        if ($shopingCarts[$i]->rating_plan->experiences_included !== null) {
                            $experiences = explode(',', $shopingCarts[$i]->rating_plan->sequence_experience_ids);
                            $shopingCarts[$i]['rating_plan']['experiences'] = $MomentExperience->whereIn('id', $experiences);
                        }

                    }
                }
            }
        }
        return $shopingCarts;
*/
    }



}