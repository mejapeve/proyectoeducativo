<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliatedContentAccountService extends Model
{
    //
    protected $table = "affiliated_content_account_services";

    public function sequence(){

        return $this->hasOne(CompanySequence::class,'id','sequence_id');

    }
}
