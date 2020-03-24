<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopingCart extends Model
{
    //
    protected $table = "shoping_carts";

    public function kit(){

        return $this->belongsTo(Kit::class,'kit_id','id');

    }

    public function rating_plan(){

        return $this->belongsTo(RatingPlan::class,'rating_plan_id','id');

    }

}
