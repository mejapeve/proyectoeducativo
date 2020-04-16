<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MomentKits extends Model
{
    //
    protected $table = "moment_kits";

    public function experiences (){

        return $this->hasMany(MomentExperience::class,'sequence_moment_id','id');

    }
    public function kit(){
        return $this->belongsTo(Kit::class,'kit_id','id');
    }
    public function element(){
        return $this->belongsTo(Element::class,'element_id','id');
    }
}
