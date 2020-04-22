<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvanceLine extends Model
{
    //
    protected $table = "advance_lines";
    protected $fillable=[
        'affiliated_account_service_id',
        'affiliated_company_id',
        'sequence_id',
        'moment_id',
        'moment_section_id'
    ];

    public function affiliated_account_service (){

        return $this->belongsTo(AffiliatedAccountService::class,'affiliated_account_service_id','id');

    }
}
