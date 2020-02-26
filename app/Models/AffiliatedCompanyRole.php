<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliatedCompanyRole extends Model
{
    //
    protected $table = "affiliated_company_roles";

    public function conection_students (){

        return $this->hasMany(ConectionAffiliatedStudents::class,'student_company_id','id');

    }
}
