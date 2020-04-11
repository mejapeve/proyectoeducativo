<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySequence extends Model
{
    //
    protected $table = "company_sequences";

    protected $fillable = [
        'company_id'
    ];

    public function moments(){

       return $this->hasMany(SequenceMoment::class,'sequence_company_id','id');
    }

    public function sequence_kit(){

        return $this->hasMany(SequenceKit::class,'company_sequence_id','id');

    }
}
