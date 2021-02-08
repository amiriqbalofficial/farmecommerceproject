<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
    
    public function addcategory(){
        return view('admin.addcategory');
    }

// To save data in the database
    public function savecategory(Request $request)
    {

        
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|min:3',
            
        ]);
        if ($validator->fails()) {
            return back()->with('info', $validator->messages()->all()[0])->withInput();
        }
        
            $checkcat = Category::where('category_name',$request->input('category_name'))->first();
               
            $categories = new Category;
               
            if (!$checkcat) {
                $categories->category_name = $request->input('category_name');
                $categories->save();
                return redirect('/addcategory')->with('toast_success', ' '. $categories->category_name.' category has been added succesfully in your database');
            }else{
                return redirect('/addcategory')->with('toast_error', '  '. $request->input('category_name').' category already exists in your database');
            }
        

        

        
    }

    // to show data from database in view 
    public function categories(){

        $data = Category::all();
    return view('admin.categories',compact('data'));
   
    }

    // To edit the data in form for category 
    public function edit($id){
        $cat = Category::find($id);
        
        return view('admin.editcategory')->with('cat', $cat);
    
        
    }

    // To update the data in database using edit form 
    public function updatecategory(Request $request)
    {
        
        
        $categories= Category::find($request->input('id'));
        $oldcat = $categories->category_name;
        $categories->category_name = $request->input('category_name');

        $data = array();
        $data['product_category'] = $request->input('category_name');
        
       
        DB::table('products')
        ->where('product_category',$oldcat)->update($data);
        $categories->update();
        return redirect('/categories')->with('toast_success','your data has been updated successfuly');

        }

    public function deletecategory($id){
       $category =  Category::find($id);

       $category->delete();
       return redirect('/categories')->with('status','your data has been deleted successfuly');
    }

    public function view_by_cat($name){
           $product = Product::where('product_category',$name)->get();
           $category = Category::get();

           return view('client.shop')->with('product',$product)->with('category',$category);
    }
}
