<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    //
    protected $table = "companies";

    public function compani_sequences (){

        return $this->hasMany(CompanySequence::class,'company_id','id');

    }

}
