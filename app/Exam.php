<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'class_id',
        'type_id',
        'exam_name',
        'result_type',
        'status'
    ];
}
