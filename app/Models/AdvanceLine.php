<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvanceLine extends Model
{
    //
    protected $table = "advance_lines";

    public function affiliated_account_service (){

        return $this->belongsTo(AffiliatedAccountService::class,'affiliated_account_service_id','id');

    }
}
