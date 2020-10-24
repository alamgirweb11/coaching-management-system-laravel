<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
     public function addSlide(){
            return view('admin.slider.slide-add-form');
     }
     public function uploadSilde(Request $request){
           // return $request->all();
                $this->validate($request,[
                    'slide_image'=>'required',
                    'slide_title'=>'required',
                    'slide_description'=>'required',
                    'status'=>'required',
                ]);
                $data = new Slide();
                 $data->slide_image = $this->imageUpload($request);
                 $data->slide_title = $request->slide_title;
                 $data->slide_description = $request->slide_description;
                 $data->status = $request->status;
                 $data->save();                
                 return back()->with('message','New slide added successfully.');
     }
     protected function imageUpload($request){
        $file = $request->file('slide_image');
        $imageName = $file->getClientOriginalName(); // getClientOrginalName is a built function 
        $directory = 'admin/assets/slider/'; // file path
        $imageUrl = $directory.$imageName;
       // file upload by using intervention image package
       Image::make($file)->resize(1400, 570)->save($imageUrl);
       return $imageUrl;
     }
     public function manageSlide(){
            $slides = Slide::all();
            return view('admin.slider.manage-slide',[
                  'slides'=>$slides
            ]);
     }
     // function for slide deactivate
    public function slideUnpublished($id){
              $slide = Slide::find($id);
              $slide->status = 2;
              $slide->save();
              return redirect('/manage-slide')->with('error_message','Slide unpublished successfully.');
    }
     // function for slide activate
    public function slidePublished($id){
        $slide = Slide::find($id);
        $slide->status = 1;
        $slide->save();
        return redirect('/manage-slide')->with('message','Slide published successfully.');     
    }
    // show all photo in gellery section
    public function photoGallery(){
               $slides = Slide::all();
               return view('admin.slider.photo-gallery',['slides'=>$slides]);
    }
    // slide edit function
    public function slideEdit($id){
              $slide = Slide::find($id);
            return view('admin.slider.slide-edit-form',[
                 'slide'=>$slide
            ]);
    }
    // slide update function
    public function updateSilde(Request $request){
        // return  $request->all();
        $slide = Slide::find($request->slide_id);
        $slide->slide_title = $request->slide_title;
        $slide->slide_description = $request->slide_description;
        $slide->status = $request->status;
        if($request->file('slide_image')){
                unlink($slide->slide_image); // unlink method work for delete the image
                $slide->slide_image = $this->imageUpload($request);
        }
        $slide->save();
        return redirect('/manage-slide')->with('message','Slide updated successfully.');
    }
    // slide delete function
    public function slideDelete($id){
            $slide = Slide::find($id);
            unlink($slide->slide_image); // unlink method work for delete the image
            $slide->delete();
            return redirect('/manage-slide')->with('message','Slide deleted successfully.');
    }
}
