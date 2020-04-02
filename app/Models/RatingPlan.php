<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RatingPlan extends Model
{
    //
    protected $table = "rating_plans";

    public function type_plan(){

        return $this->belongsTo(TypesRatingPlan::class,'type_rating_plan_id','id');

    }

}
