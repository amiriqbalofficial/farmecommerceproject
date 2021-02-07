<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Slider;

class SliderController extends Controller
{
    
    // This is method is for addslider form 
    public function addslider(){
        return view('admin.addslider');
    }

    // this method is for to store data 
    public function saveslider(Request $request)
    {

        
        $validator = Validator::make($request->all(), [
            
            'description1'=>'required|min:3',
            'description2'=>'required',
            'description_image'=>'required|max:1999|image'
            
            
            
        ]);
       
            if ($request->hasFile('description_image')) {
                // 1 : get the file name with extension
                $fileNamewithExtension = $request->file('description_image')->getClientOriginalName();
                // 2 : Get just the file name 
                $fileName = pathinfo($fileNamewithExtension,PATHINFO_FILENAME);
    
                // Get extention 
                $extension = $request->file('description_image')->getClientOriginalExtension();
                //  4: File name to store
                $fileNameToStore = $fileName.'_'.time().'.'.$extension;
                // 5 : File that where the file will save 
                $path = $request->file('description_image')->StoreAs('public/slider_images',$fileNameToStore);
            }
           
            if ($validator->fails()) {
                return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
            }

           
            
                
                   
                $slider = new Slider();
                   
              
                    $slider->description1 = $request->input('description1');
                    $slider->description2 = $request->input('description2');
                    $slider->slider_image = $fileNameToStore ;
                    $slider->status = 1;
                    $slider->save();

                    
                    return redirect('/addslider')->with('toast_success', 'Description has been added succesfully in your database');
                

        }

        // this method is to retrive data of slider from database
        public function viewslider(){
            $slider = Slider::get();
            
            return view('admin.slider')->with('slider',$slider);
        }

        // This method is to edit data in slider form

        public function editslider($id){
                    $slider = Slider::find($id);
                    return view('admin.editslider')->with('slider',$slider);
        }

        public function updateslider(Request $request){
            $validator = Validator::make($request->all(), [
                
                'description1'=>'required|min:3',
                'description2'=>'required',
                'slider_image'=>'nullable|max:1999|image'
                
                
                
            ]);
            $slider = Slider::find($request->input('id'));
                       
           
                $slider->description1 = $request->input('description1');
                $slider->description2 = $request->input('description2');
                
                
                
               
    
                if ($request->hasFile('slider_image')) {
                     // 1 : get the file name with extension
                     $fileNamewithExtension = $request->file('slider_image')->getClientOriginalName();
                     // 2 : Get just the file name 
                     $fileName = pathinfo($fileNamewithExtension,PATHINFO_FILENAME);
         
                     // Get extention 
                     $extension = $request->file('slider_image')->getClientOriginalExtension();
                     //  4: File name to store
                     $fileNameToStore = $fileName.'_'.time().'.'.$extension;
                     // 5 : File that where the file will save 
                     $path = $request->file('slider_image')->StoreAs('public/slider_images',$fileNameToStore);
    
                     $old_image = slider::find($request->input('id'));
                    
                         Storage::delete('public/slider_images/'.$old_image->slider_image);
                     
    
                     $slider->slider_image = $fileNameToStore ;
                }
    
                $slider->update();
    
                return redirect('/slider')->with('toast_success', ' Description has been updated succesfully in your database');
            }

            public function deleteslider($id){
                        $slider  = Slider::find($id);
                        $slider->delete();

                        return redirect('/slider')->with('toast_error', ' Description has been deleted succesfully in your database');

                        
            }

            // for activating the product on front-end
        public function activate_slider($id){
            $slider=  Slider::find($id);
             $slider->status = 1;

            $slider->update();
            return redirect('/slider')->with('status', ' status has been activated successfully');
}

// fon unactivating the product status for front-end

public function unactivate_slider($id){
             $slider = Slider::find($id);
             $slider->status = 0;

             $slider->update();

             return redirect('/slider')->with('status1', '  status has been unactivated successfully');

}
    
    }
    
          

