<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SequenceMoment extends Model
{
    //
    protected $table = "sequence_moments";

    public function experiences (){

        return $this->hasMany(MomentExperience::class,'sequence_moment_id','id');

    }
}
