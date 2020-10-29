<?php

namespace App\Http\Controllers;

use App\Year;
use Illuminate\Http\Request;

class DateManagementController extends Controller
{
    public function addYear(){
            $curentYear = date('Y');
            $check = Year::where('year','=',$curentYear)->get();
            if(count($check)>0){
                return back()->with('error_message',"$curentYear is already exist in database !!!
                 please try again next year");
            }else{
                 $year = new Year();
                 $year->year = $curentYear;
                 $year->status = 1;
                 $year->save();
                 return back()->with('message',"Year $curentYear added successfully.");
            }
    }
}
