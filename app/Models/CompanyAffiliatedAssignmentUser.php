<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyAffiliatedAssignmentUser extends Model
{
    //
    protected $table = 'company_affiliated_assigment_users';

    protected $fillable = [
        'id',
        'student_company_id',
        'teacher_company_id',
        'company_sequence_id',
        'company_group_id',
    ];
}
