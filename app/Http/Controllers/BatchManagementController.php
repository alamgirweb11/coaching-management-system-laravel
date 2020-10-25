<?php

namespace App\Http\Controllers;

use App\Batch;
use App\ClassName;
use App\StudentType;
use Illuminate\Http\Request;

class BatchManagementController extends Controller
{
     public function addBatch(){
            $classes = ClassName::all();
            return view('admin.setting.batch.add-form',[
                 'classes' => $classes
            ]);
     }
     public function classWiseStudentType(Request $request){
          $types = StudentType::where([
                 'class_id' => $request->class_id
          ])->where('status','!=',3)->get();
          return view('admin.setting.batch.class-wise-student-type',[
               'types' => $types
          ]);
     }
     public function batchSave(Request $request){
                  $this->validate($request,[
                       'class_id' => 'required',
                       'type_id' => 'required',
                       'batch_name' =>'required|string',
                       'student_capacity' =>'required|string'
                  ]);
                  $data = new Batch();
                  $data->class_id = $request->class_id;     
                  $data->student_type_id = $request->type_id;     
                  $data->batch_name = $request->batch_name; 
                  $data->student_capacity = $request->student_capacity; 
                  $data->status = 1;
                  $data->save();
                  return back()->with('message','Batch name added successfully.');
     }
     public function batchList(){
        $classes = ClassName::all();
        return view('admin.setting.batch.batch-list',[
             'classes' => $classes
        ]);
     }
     public function batchListByAjax (Request $request){

                 $batches = Batch::where([
                       'class_id'=>$request->class_id,
                       'student_type_id'=>$request->type_id
                 ])->where('status','!=',3)->get();
                 if(count($batches)>0){
                    return view('admin.setting.batch.batch-list-by-ajax',[
                         'batches' => $batches
                     ]);
                 }else{
               return view('admin.setting.batch.batch-empty-error');
                 }              
     }
     public function batchUnpublished(Request $request){
                 $batch = Batch::find($request->batch_id);
                 $batch->status=2;
                 $batch->save();
                 $batches = Batch::where([
                    'class_id'=>$request->class_id
              ])->get();
              return view('admin.setting.batch.batch-list-by-ajax',[
                  'batches' => $batches
              ]);
     }
     public function batchPublished(Request $request){
                 $batch = Batch::find($request->batch_id);
                 $batch->status=1;
                 $batch->save();
                 $batches = Batch::where([
                    'class_id'=>$request->class_id
              ])->get();
              return view('admin.setting.batch.batch-list-by-ajax',[
                  'batches' => $batches
              ]);
     }
     public function batchDelete(Request $request){
          $batch = Batch::find($request->batch_id);
          $batch->delete();
          $batches = Batch::where([
             'class_id'=>$request->class_id
       ])->get();
       if(count($batches)>0){
          return view('admin.setting.batch.batch-list-by-ajax',[
               'batches' => $batches
           ]);
       }else{
               return view('admin.setting.batch.batch-empty-error');
       }
  }
     public function batchEdit($id){
               $batch = Batch::find($id);
               $classes = ClassName::all();
               return view('admin.setting.batch.edit-form',[
                    'classes' => $classes,
                    'batch' => $batch
               ]);
     }
     public function batchUpdate(Request $request){
          $this->validate($request,[
               'class_id' => 'required',
               'batch_name' =>'required|string',
               'student_capacity' =>'required'
          ]);
          $batch = Batch::find($request->batch_id);
          $batch->class_id = $request->class_id; 
          $batch->batch_name = $request->batch_name; 
          $batch->student_capacity = $request->student_capacity; 
          $batch->update();
          return redirect('/batch/list')->with('message','Batch info updated successfully.');
     }
}
