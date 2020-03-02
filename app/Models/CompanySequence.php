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

}
