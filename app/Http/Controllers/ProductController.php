<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function addproduct(){
        // this is method is used to retrive data from different table for different model but we must include the model in this controler
        $categories = Category::All()->pluck('category_name', 'category_name');
        
        return view('admin.addproduct',compact('categories'));
    }

    public function saveproduct(Request $request)
    {

        
        $validator = Validator::make($request->all(), [
            
            'product_name'=>'required|min:3',
            'product_price'=>'required',
            'product_category'=>'required',
            'product_image'=>'nullable|max:1999|image'
            
            
            
        ]);
        if (!$request->input('category_name')) {
            if ($request->hasFile('product_image')) {
                // 1 : get the file name with extension
                $fileNamewithExtension = $request->file('product_image')->getClientOriginalName();
                // 2 : Get just the file name 
                $fileName = pathinfo($fileNamewithExtension,PATHINFO_FILENAME);
    
                // Get extention 
                $extension = $request->file('product_image')->getClientOriginalExtension();
                //  4: File name to store
                $fileNameToStore = $fileName.'_'.time().'.'.$extension;
                // 5 : File that where the file will save 
                $path = $request->file('product_image')->StoreAs('public/Product_images',$fileNameToStore);
            }
            else
            {
                $fileNameToStore ='noimage.jpg';
            }
            if ($validator->fails()) {
                return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
            }

            $checkpro = Product::where('product_name',$request->input('product_name'))->first();
            
                
                   
                $product = new Product();
                   
                if (!$checkpro) {
                    $product->product_name = $request->input('product_name');
                    $product->product_price = $request->input('product_price');
                    $product->product_category = $request->input('product_category');
                    $product->product_image = $fileNameToStore ;
                    $product->status = 0;
                    $product->save();
    
                    return redirect('/addproduct')->with('toast_success', ' '. $product->product_name.'  has been added succesfully in your database');
                }else{
                    return redirect('/addproduct')->with('toast_error', '  '. $request->input('product_name').'  already exists in your database');
                }
        }else{
            return redirect('/addproduct')->with('toast_error', 'Category must be selected');
        }
       
          

        
        

        }

        public function product(){
            $products = Product::get();
            return view('admin.products')->with('products',$products);
        }
        
        public function edit($id){
            $pro = Product::find($id);
            $categories = Category::All()->pluck('category_name', 'category_name');
            
            return view('admin.editproduct')->with('pro', $pro)->with('categories',$categories);
        
     }

     public function updateproduct(Request $request){
        $validator = Validator::make($request->all(), [
            
            'product_name'=>'required|min:3',
            'product_price'=>'required',
            'product_image'=>'nullable|max:1999|image'
            
            
            
        ]);
        $product = Product::find($request->input('id'));
                   
       
            $product->product_name = $request->input('product_name');
            $product->product_price = $request->input('product_price');
            $product->product_category = $request->input('product_category');
            
            
           

            if ($request->hasFile('product_image')) {
                 // 1 : get the file name with extension
                 $fileNamewithExtension = $request->file('product_image')->getClientOriginalName();
                 // 2 : Get just the file name 
                 $fileName = pathinfo($fileNamewithExtension,PATHINFO_FILENAME);
     
                 // Get extention 
                 $extension = $request->file('product_image')->getClientOriginalExtension();
                 //  4: File name to store
                 $fileNameToStore = $fileName.'_'.time().'.'.$extension;
                 // 5 : File that where the file will save 
                 $path = $request->file('product_image')->StoreAs('public/Product_images',$fileNameToStore);

                 $old_image = Product::find($request->input('id'));
                
                     Storage::delete('public/product_images/'.$old_image->product_image);
                 

                 $product->product_image = $fileNameToStore ;
            }

            $product->update();

            return redirect('/products')->with('toast_success', ' '. $product->product_name.'  has been updated succesfully in your database');
        }

        public function delete($id){
            $product = product::find($id);

            $product->delete();

            return redirect('/products')->with('toast_error', ' '.$product->product_name.' has been deleted successfully');
        }

        // for activating the product on front-end
        public function activate_product($id){
                       $product =  Product::find($id);
                        $product->status = 1;

                       $product->update();
                       return redirect('/products')->with('status', ' '.$product->product_name.' status has been activated successfully');
        }

        // fon unactivating the product status for front-end

        public function unactivate_product($id){
                        $product = Product::find($id);
                        $product->status = 0;

                        $product->update();

                        return redirect('/products')->with('status1', ' '.$product->product_name.' status has been unactivated successfully');

        }

            

            
        

           
        
         
            
           
        
     
    

   
    }
