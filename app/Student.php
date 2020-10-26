<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
       'student_name',
       'school_id',
       'class_id',
       'father_name',
       'father_mobile',
       'father_profession',
       'mother_name',
       'mother_mobile',
       'mother_profession',
       'email_address',
       'sms_mobile',
       'date_of_admission',
       'student_photo',
       'address',
       'status',
       'password',
       'encrypted_password',
       'user_id',
    ];
}
