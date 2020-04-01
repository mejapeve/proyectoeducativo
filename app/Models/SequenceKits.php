<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SequenceKits extends Model
{
    //
    protected $table = "sequence_kits";

    public function experiences (){

        return $this->hasMany(MomentExperience::class,'sequence_moment_id','id');

    }
}
