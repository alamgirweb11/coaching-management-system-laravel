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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Image;

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
     public function allRunningStudentList(){
             $students = DB::table('students')
             ->join('schools','students.school_id','=','schools.id')
             ->join('class_names','students.class_id','=','class_names.id')
             ->select('students.*','schools.school_name','class_names.class_name')
             ->where([
                    'students.status' =>1 
             ])->orderBy('students.class_id','ASC')->get();
           //  return $students;   
           return view('admin.student.all-running-students',[
                   'students' => $students
           ]);
     }
      // class wise student section
     public function classSelectionForm(){
           $classes = ClassName::where('status','=',1)->get();
             return view('admin.student.class.class-selection-form',[
                      'classes' => $classes
             ]);
     }
     public function classWiseStudentType(Request $request){
                  $classId = $request->class_id;
                  $types = StudentType::where([
                          'class_id' => $classId,
                          'status' => 1
                  ])->get();
            return view('admin.student.class.student-type',[
                       'types' => $types
            ]);
     }
     public function classAdnTypeWiseStudent(Request $request){
               $students = DB::table('students')
               ->join('schools','students.school_id','=','schools.id')
               ->join('student_type_details','student_type_details.student_id','=','students.id')
               ->join('batches','student_type_details.batch_id','=','batches.id')
               ->select('students.*','schools.school_name','student_type_details.roll_no','batches.batch_name')
               ->where([
                     'students.status' => 1,
                     'students.class_id'=>$request->class_id,
                     'student_type_details.type_id' => $request->type_id,
                     'student_type_details.type_status' =>1
               ])->orderBy('student_type_details.roll_no','ASC')->get();
                //  return $students;
                return view('admin.student.class.student-list',[
                      'students' => $students
                ]);
            }
      // update student profile sction 
      public function studentProfile($id){
      $students = $this->getSingleStudent($id);
      $schools = School::all();
             // return $students;
           return view('admin.student.profile.student-profile',[
                  'students' => $students,
                  'schools' => $schools
             ]);
      }
      public function studentBasicInfoUpdate(Request $request){
              $student = Student::find($request->student_id);
            $student->student_name = $request->student_name;
            $student->school_id = $request->school_id;
            $student->father_name = $request->father_name;
            $student->father_profession = $request->father_profession;
            $student->father_mobile = $request->father_mobile;
            $student->mother_name = $request->mother_name;
            $student->mother_profession = $request->mother_profession;
            $student->mother_mobile = $request->mother_mobile;
            $student->email_address = $request->email_address;
            $student->sms_mobile = $request->sms_mobile;
            if(isset($request->student_photo)){
                  $this->updateStudentPhoto($request);
            }
            $student->address = $request->address;
            $student->user_id = $request->user_id;
            $student->password = $request->sms_mobile;
            $student->save();
            return $this->studentProfile($request->student_id);
      }
// iamge upload function
   protected function updateStudentPhoto($request){
                 $student = Student::find($request->student_id);
                 if(isset($student->student_photo)){
                       unlink($student->student_photo);
                       $this->uploadPhoto($request,$student);
                 }else{
                      $this->uploadPhoto($request,$student);   
                 }
   }
   protected function uploadPhoto($request,$student){
           $file = $request->file('student_photo');
           $imageName = $file->getClientOriginalName();
           $directory = 'admin/assets/images/students/';
           $imageUrl = $directory.$imageName;
           Image::make($file)->resize(300,300)->save($imageUrl);
           $student->student_photo = $imageUrl;
           $student->save();
   }
      protected function getSingleStudent($id){
            $students = DB::table('students')
            ->join('schools','students.school_id','=','schools.id')
            ->join('class_names','students.id','=','class_names.id')
            ->join('student_type_details','student_type_details.student_id','=','students.id')
            ->join('student_types','student_type_details.type_id','=','student_types.id')
            ->join('batches','student_type_details.batch_id','=','batches.id')
            ->select('students.*','schools.school_name','student_type_details.roll_no','batches.batch_name','student_types.student_type','class_names.class_name')
            ->where([
                  'students.status' => 1,
                  'students.id' => $id
            ])->orderBy('student_type_details.type_id','ASC')->get();
            return $students;
      }
      // batch wise student section
      public function batchSelectionForm(){
                 $classes = ClassName::where('status','=',1)->get();
               return view('admin.student.batch.batch-selection-form',[
                       'classes' => $classes
               ]);
      }
      public function classAndTypeWiseBatchList(Request $request){
              $batches = Batch::where([
                    'class_id' => $request->class_id,
                    'student_type_id' => $request->type_id,
                    'status' => 1
              ])->get();
              return view('admin.student.batch.batch-list',[
                       'batches' => $batches
              ]);
      }
      public function batchWiseStudentList(Request $request){
            $students = DB::table('students')
            ->join('schools','students.school_id','=','schools.id')
            ->join('student_type_details','student_type_details.student_id','=','students.id')
            ->join('batches','student_type_details.batch_id','=','batches.id')
            ->select('students.*','schools.school_name','student_type_details.roll_no','batches.batch_name')
            ->where([
                  'students.status' => 1,
                  'students.class_id'=>$request->class_id,
                  'student_type_details.type_id' => $request->type_id,
                  'student_type_details.batch_id' => $request->batch_id,
                  'student_type_details.type_status' =>1
            ])->orderBy('student_type_details.roll_no','ASC')->get();
             //  return $students;
             return view('admin.student.batch.student-list',[
                   'students' => $students
             ]);
      }
}
