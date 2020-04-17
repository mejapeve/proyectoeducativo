<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AfiliadoEmpresaRoles extends Model
{
    //
    protected $table = "affiliated_company_roles";

    public function affiliated_account_service (){

        return $this->hasMany(AffiliatedAccountService::class,'company_affiliated_id','affiliated_company_id');

    }
}
