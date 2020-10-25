<?php

namespace App\Http\Controllers;

use App\ClassName;
use App\StudentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentTypeController extends Controller
{
    public function index(){
        $studentTypes = $this->getStudentType();
        $classes = ClassName::all();
        //return $studentTypes;
          return view('admin.setting.student-type.student-type-list',[
                'studentTypes' => $studentTypes,
                'classes' => $classes
          ]);
    }
    public function studentTypeAdd(Request $request){        
               if($request->ajax()){
                    $data = new StudentType();
                    $data->class_id = $request->class_id;
                    $data->student_type = $request->student_type;
                    $data->status=1;
                    $data->save();
               }
              // return $request;
    }
    public function studentTypeList(){
        $studentTypes = $this->getStudentType();
        $classes = ClassName::all();
        //return $studentTypes;
          return view('admin.setting.student-type.student-type-table',[
                'studentTypes' => $studentTypes,
                'classes' => $classes
          ]);
    }
    public function studentTypeUnpublish(Request $request){
              $data = StudentType::find($request->type_id);
              //return $data;
              $data->status = 2;
              $data->save();

              $studentTypes = $this->getStudentType();
           $classes = ClassName::all();
          //return $studentTypes;
          return view('admin.setting.student-type.student-type-table',[
                'studentTypes' => $studentTypes,
                'classes' => $classes
          ]);
    }
    public function studentTypePublish(Request $request){
              $data = StudentType::find($request->type_id);
              //return $data;
              $data->status = 1;
              $data->save();

              $studentTypes = $this->getStudentType();
           $classes = ClassName::all();
          //return $studentTypes;
          return view('admin.setting.student-type.student-type-table',[
                'studentTypes' => $studentTypes,
                'classes' => $classes
          ]);
    }
    public function studentTypeUpdate(Request $request){
        $data = StudentType::find($request->type_id);
        $data->student_type = $request->student_type;
        $data->save();   

        $studentTypes = $this->getStudentType();
        $classes = ClassName::all();
       //return $studentTypes;
       return view('admin.setting.student-type.student-type-table',[
             'studentTypes' => $studentTypes,
             'classes' => $classes
       ]);
    }
    public function studentTypeDelete(Request $request){
        $data = StudentType::find($request->type_id);
        //return $data;
        $data->status=3; 
        // if we don't want to permanently delete data from database we have to use $batch->status = 3 or more
        // and if we want to delete it permanently we don't need to use $data->status = 1
        $data->save();

        $studentTypes = $this->getStudentType();
     $classes = ClassName::all();
    //return $studentTypes;
    return view('admin.setting.student-type.student-type-table',[
          'studentTypes' => $studentTypes,
          'classes' => $classes
        ]);
    }
    protected function getStudentType(){
            // join table:- student_types table join with class_names table
        $studentTypes = DB::table('student_types')
        ->join('class_names','student_types.class_id','=','class_names.id')
        ->select('student_types.*','class_names.class_name')
        ->where('student_types.status','!=',3)
        ->get();
        return $studentTypes;
    }
}
