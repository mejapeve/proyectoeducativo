<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SequenceKit extends Model
{
    //
    protected $table = "sequence_kits";

    public function kit()
    {
        return $this->belongsTo(Kit::class, 'kit_id', 'id');
    }

    public function element()
    {
        return $this->belongsTo(Element::class, 'element_id', 'id');
    }

}
