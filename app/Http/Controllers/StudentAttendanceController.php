<?php

namespace App\Http\Controllers;

use App\ClassName;
use App\StudentAttendance;
use App\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentAttendanceController extends Controller
{
    public function batchSelectionFormForAttendanceAdd(){
        $classes = ClassName::where('status','=',1)->get();
        $years = Year::where('status','=',1)->get();
        return view('admin.student.attendance.batch-selection-form-for-attendance-add',[
                'classes' => $classes,
                'years' => $years,
        ]);
    }
    public function batchWiseStudentListForAttendance(Request $request){
        $today = date('Y-m-d');
        $checkAttendance = StudentAttendance::where([
            'class_id' => $request->class_id,
            'type_id' => $request->type_id,
            'batch_id' => $request->batch_id
        ])->whereDate('created_at',$today)->get();
        if(count($checkAttendance)>0){
            return view('admin.student.attendance.attendance-confirmation-message')
            ->with('error_message','Attendance already submitted.'); 
        }else{
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
             return view('admin.student.attendance.student-list-for-attendance-add',[
                   'students' => $students
             ]);
        }
        
    }
    public function saveStudentAttendance(Request $request){
                 //  return $request->all();
                 $today = date('Y-m-d');
                 $checkAttendance = StudentAttendance::where([
                     'class_id' => $request->class_id,
                     'type_id' => $request->type_id,
                     'batch_id' => $request->batch_id
                 ])->whereDate('created_at',$today)->get();
                // return $checkAttendance; 
                if(count($checkAttendance)>0){
                    return view('admin.student.attendance.attendance-confirmation-message')->with('error_message','Attendance already submitted.'); 
              }else{
                   $this->saveAttendance($request);
                   return back()->with('message','Attendance submitted successfully.'); 
              }               
    }
    protected function saveAttendance($request){
            $session = $request->academic_session;
            $classId = $request->class_id;
            $typeId = $request->type_id;
            $batchId = $request->batch_id;
             $attendances = $request->attendance;
             $userId = Auth::user()->id;
            
            foreach($attendances as $studentId => $attendance){
                 $data = new StudentAttendance();
                 $data->academic_session = $session;
                 $data->class_id = $classId;
                 $data->type_id  = $typeId;
                 $data->batch_id = $batchId;
                 $data->student_id = $studentId;
                 $data->attendance = $attendance;
                 $data->user_id = $userId;
                 $data->save();
            }
    }
    public function viewAttendance(){
            $classes = ClassName::where('status','=',1)->get();
            return view('admin.student.attendance.batch-selection-form-for-attendance-view',[
                'classes'=>$classes
            ]);
    }
    public function batchWiseStudentAttendanceView(Request $request){
        $date = $request->date;
       // return $request;
         // use attendance check function
       $check = $this->attendanceCheck($request,$date);
        if(count($check)>0){
              // use get attendance function
             $attendances = $this->getAttendance($request,$date);
             return view('admin.student.attendance.batch-wise-attendance',[
                'attendances'=>$attendances
            ]);
        }else{ 
            $error_message = "Attendance does not submitted yet !!!";
            return view('admin.student.attendance.alert',[
            'error_message' => $error_message
        ]);
        }
    }
    public function editAttendance(){
        $classes = ClassName::where('status','=',1)->get();
        return view('admin.student.attendance.batch-selection-form-for-attendance-edit',[
            'classes'=>$classes
        ]);
    }
    public function studentListForAttendanceEdit(Request $request){
        $date = date('Y-m-d');
          // use attendance check function
      $check = $this->attendanceCheck($request,$date);
        if(count($check)>0){
             // use get attendance protected function
            $attendances = $this->getAttendance($request,$date);
            return view('admin.student.attendance.attendance-update-form',[
                 'attendances' => $attendances
            ]);
        }else{ 
            $error_message = "Attendance does not submitted yet !!!";
            return view('admin.student.attendance.alert',[
              'error_message' => $error_message
          ]);
        }
       
    }
    public function studentAttendanceUpdate(Request $request){
         //  return $request; 
            $attendances = $request->attendance;
            foreach($attendances as $id => $attendance){
                  $data = StudentAttendance::find($id);
                  $data->attendance = $attendance;
                  $data->save();
            }
            return back()->with('message','Attendance updated successfully');
    }
    // attendance check function
    protected function attendanceCheck($request,$date){
        $check = StudentAttendance::where([
            'class_id' => $request->class_id,
            'type_id' => $request->type_id,
            'batch_id' => $request->batch_id,
      ])->whereDate('created_at',$date)->get();
       return $check;
    }
    // get attendance protected function
    protected function getAttendance($request,$date){
        $attendances = DB::table('student_attendances')
        ->join('students','student_attendances.student_id','=','students.id')
        ->join('student_type_details','student_type_details.student_id','=','students.id')
        ->join('schools','students.school_id','=','schools.id')
        ->select('student_attendances.*','students.student_name','students.sms_mobile','schools.school_name','student_type_details.roll_no')
        ->where([
            'student_attendances.class_id' => $request->class_id,
            'student_attendances.batch_id' => $request->batch_id,
            'student_attendances.type_id' => $request->type_id,
            'student_type_details.type_id' => $request->type_id,
        ])->whereDate('student_attendances.created_at',$date)->orderBy('student_type_details.roll_no','ASC')->get();
       return $attendances;
    }
}
