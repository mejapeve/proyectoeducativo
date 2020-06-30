<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    //
    protected $table = "elements";

    public function element_in_moment(){

        return $this->hasMany(MomentKits::class,'element_id','id');

    }
}
