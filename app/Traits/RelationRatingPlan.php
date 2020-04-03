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
                $ids = explode(',', $shopingCarts[$i]->shopping_cart_product->product_ids);
                switch ($shopingCarts[$i]->rating_plan->type_rating_plan_id){
                    case 1:
                        $sequences = array();
                        foreach ($sequencesCache->whereIn('id', $ids) as $sequenceA){
                            array_push($sequences,$sequenceA);
                        }
                        $shopingCarts[$i]['shopping_cart_product']['sequences'] = $sequences;

                        break;
                    case 2:
                        $moments = array();
                        foreach ($momentsCache->whereIn('id', $ids) as $momentA){
                            array_push($moments,$momentA);
                        }
                        $shopingCarts[$i]['shopping_cart_product']['moments'] = $moments;
                        break;
                    case 3:
                        $experiences = array();
                        foreach ($experiencesCache->whereIn('id', $ids) as $experienceA){
                            array_push($experiences,$experienceA);
                        }
                        $shopingCarts[$i]['shopping_cart_product']['experiences'] = $experiences;
                        break;
                }
            }
        }
        return $shopingCarts;
    }



}