<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Product;
use App\Category;

class ClientController extends Controller
{
    public function home(){
        $slider = Slider::get();
        $product = Product::get();
        return view('client.home')->with('slider',$slider)->with('product',$product);
    }

    public function cart()
    {
    return view('client.cart');
    }

    public function checkout(){
        return view('client.checkout');
    }

    public function shop(){
        $product = Product::all();
        $category = Category::all();
        return view('client.shop')->with('product',$product)->with('category',$category);
    }

    public function login(){
        return view('client.login');
    }

    public function signup(){
        return view('client.signup');
    }
}
