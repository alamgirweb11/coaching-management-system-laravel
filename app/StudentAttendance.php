<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
   protected $fillable = [
       'academic_session',
       'student_id',
       'class_id',
       'type_id',
       'batch_id',
       'attendance',
       'user_id'];
}
