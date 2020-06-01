<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KitElement extends Model
{
    //
    protected $table = "kit_elements";


    public function element()
    {

        return $this->belongsTo(Element::class, 'element_id', 'id');
    }
}
