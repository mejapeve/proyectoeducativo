<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //

    public function users()
    {
        return $this->belongsToMany('App\Models\AfiliadoEmpresa', 'afiliado_empresa_roles', 'rol_id', 'afiliado_empresa_id')->withTimestamps();
    }

}
