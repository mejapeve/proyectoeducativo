<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kit extends Model
{
    //
    protected $table = "kits";


    public function kit_elements(){

        return $this->hasMany(KitElement::class,'kit_id','id')->select('id','kit_id','element_id');
    }

}
