<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConectionAffiliatedStudents extends Model
{
    //
    protected $table = "connection_affiliated_students";

    public function student_family()
    {

        return $this->belongsTo(AffiliatedCompanyRole::class, 'student_company_id', 'id');
    }

}
