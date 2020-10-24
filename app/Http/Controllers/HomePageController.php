<?php

namespace App\Http\Controllers;

use App\HeaderFooter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
     public function addHeaderFooterForm(){
           $headerFooter = DB::table('header_footers')->first(); // first method use for show only one row
           if(isset($headerFooter)){
           return view('admin.home.manage-header-footer-form',[
                   'headerFooter'=>$headerFooter
           ]);
           }else{
           return view('admin.home.add-header-footer-form');
           }
     }
     public function headerAndFooterSave(Request $request){
                 // validate data
                 $this->validate($request,[
                  'owner_name' => 'required',
                  'owner_department' => 'required',
                  'mobile' => 'required',
                  'address' => 'required',
                  'copyright' => 'required',
                  'status' => 'required',
            ]);
           //return $request->all();
            // create a new row by using HeaderFooter model
            $data = new HeaderFooter();
            $data->owner_name = $request->owner_name;
            $data->owner_department = $request->owner_department;
            $data->mobile = $request->mobile;
            $data->address = $request->address;
            $data->copyright = $request->copyright;
            $data->status = $request->status;
            $data->save();
            return redirect('/home')->with('message','Header and footer added successfully.');

     }
     public function manageHeaderFooter($id){
             $headerFooter = HeaderFooter::find($id);
              return view('admin.home.manage-header-footer-form',[
                      'headerFooter'=>$headerFooter,
              ]);
     }
      public function headerAndFooterUpdate(Request $request){
            // return $request->all();
            // validate data
            $this->validate($request, [
                  'owner_name' => 'required',
                  'owner_department' => 'required',
                  'mobile' => 'required',
                  'address' => 'required',
                  'copyright' => 'required', 
            ]);

            $headerFooter = HeaderFooter::find($request->id);
            // update data from header_footers table
            //$data = new HeaderFooter();
            $headerFooter->owner_name = $request->owner_name;
            $headerFooter->owner_department = $request->owner_department;
            $headerFooter->mobile = $request->mobile;
            $headerFooter->address = $request->address;
            $headerFooter->copyright = $request->copyright;
           // $headerFooter->status = $request->status;
            $headerFooter->save();
            return redirect('/home')->with('message','Header and footer updated successfully.');

            // return $request->all();
            // if(!empty($data)){ 

            //       $data->owner_name = $request->owner_name;
            //       $data->owner_department = $request->owner_department;
            //       $data->mobile = $request->mobile;
            //       $data->address = $request->address;
            //       $data->copyright = $request->copyright;
            //       $data->status = 1;
            //       $data->update();

            //       return redirect('/home')->with('message','Header and footer added successfully.');
            // }
            

      }

      // data validation for header and footer section update
      protected function headerAndFooterValidation($request){               
            // validate data
            $this->validate($request,[
                  'owner_name' => 'required',
                  'owner_department' => 'required',
                  'mobile' => 'required',
                  'address' => 'required',
                  'copyright' => 'required',
                  'status' => 'required',
            ]);
           //return $request->all();  
      }
}
