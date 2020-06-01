<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table = "questions";

    protected $fillable = [
        'sequence_id',
        'moment_id',
        'experience_id',
        'options',
        'review',
        'type_answer',
        'order',
        'title'
    ];
}
