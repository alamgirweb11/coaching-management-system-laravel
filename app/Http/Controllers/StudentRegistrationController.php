<?php

namespace App\Http\Controllers;

use App\Batch;
use App\ClassName;
use App\School;
use App\Student;
use App\StudentType;
use App\StudentTypeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentRegistrationController extends Controller
{
    public function studentRegistrationForm(){
        $schools = School::where('status','=',1)->get();
        $classes = ClassName::where('status','=',1)->get();
        return view('admin.student.registration.registration-form',[
               'schools' => $schools,
               'classes' => $classes
        ]);
    }
    public function bringStudentType(Request $request){
          $types = StudentType::where('class_id','=',$request->class_id)->get();
         $classes = ClassName::where('status','=',1)->get();
          return view('admin.student.registration.student-types',[
                    'types' => $types,
                    'classes' => $classes,
                    'data' => $request
          ]);
    }
    public function batchRollForm(Request $request){
             $batches = Batch::where([
                  'class_id' => $request->class_id,
                   'student_type_id' => $request->type_id
             ])->get();
             $studentType = StudentType::find($request->type_id);
             return view('admin.student.registration.batch-roll-form',[
                   'batches' => $batches,
                   'studentType' => $studentType
             ]);
    }
     public function studentSave(Request $request){
            $student = new Student();
            $student->student_name = $request->student_name;
            $student->school_id = $request->school_id;
            $student->class_id = $request->class_id;
            $student->father_name = $request->father_name;
            $student->father_mobile = $request->father_mobile;
            $student->father_profession = $request->father_profession;
            $student->mother_name = $request->mother_name;
            $student->mother_mobile = $request->mother_mobile;
            $student->mother_profession = $request->mother_profession;
            $student->email_address = $request->email_address;
            $student->sms_mobile = $request->sms_mobile;
            $student->date_of_admission = $request->date_of_admission;
            // $student->student_photo = $request->student_photo;
            $student->address = $request->address;
            $student->status = 1;
            $student->password = $request->sms_mobile;
            $student->encrypted_password = Hash::make($request->sms_mobile);
            $student->user_id = Auth::user()->id;
            $student->save();

            $studentId = $student->id;
            $bataches = $request->batch_id;
            $rolls = $request->roll;
            $studentTypes = $request->student_type;
            foreach($studentTypes as $key=>$studentType){
                    $data = new StudentTypeDetail();
                    $data->student_id = $studentId;
                    $data->class_id = $request->class_id;
                    $data->type_id = $key;
                    $data->batch_id = $bataches[$key];
                    $data->roll_no = $rolls[$key];
                    $data->type_status = 1;
                    $data->save();
            }
          return back()->with('message','Registration Successful.');
     }
}
