<?php

use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Client side
Route::get('/','ClientController@home');
Route::get('/cart','ClientController@cart');
Route::get('/checkout','ClientController@checkout');
Route::get('/shop','ClientController@shop');
Route::get('/login','ClientController@login');
Route::get('/signup','ClientController@signup');

// Adminside
Route::get('/admin','AdminController@dashboard');

// SliderController
Route::get('/addslider','SliderController@addslider');
Route::get('/slider','SliderController@viewslider');
Route::post('saveslider','SliderController@saveslider')->name('saveslider');
Route::get('editslider/{id}','SliderController@editslider');
Route::post('updateslider/{id}','SliderController@updateslider')->name('slider.update');
Route::get('deleteslider/{id}','SliderController@deleteslider');

// This route has been used to activate the status of slider
Route::get('activate_slider/{id}','SliderController@activate_slider')->name('activate');
// This route has been used to Unactivate the status of slider
Route::get('unactivate_slider/{id}','SliderController@unactivate_slider');

// CatergoryController
Route::get('/addcategory','categoryController@addcategory');
Route::post('/savecategory','categoryController@savecategory');
Route::get('/categories','categoryController@categories');
Route::get('/editcategory/{id}','categoryController@edit');
Route::get('/view_by_cat/{name}','categoryController@view_by_cat');
// this route should be put in edit form action 
Route::Post('category/{id}','categoryController@updatecategory')->name('category.update');
// Delete route for category 
Route::get('delete/{id}','categoryController@deletecategory')->name('category.delete');


// ProductController 
Route::get('/addproduct','ProductController@addproduct');
Route::Post('/saveproduct','ProductController@saveproduct')->name('save.product');
Route::get('/products','ProductController@product');
Route::get('editproduct/{id}','ProductController@edit');
Route::Post('product/{id}','ProductController@updateproduct')->name('product.update');
Route::get('deleteproduct/{id}','productController@delete')->name('product.delete');

// This route has been used to activate the status of product
Route::get('activate_product/{id}','ProductController@activate_product');
// This route has been used to Unactivate the status of product
Route::get('unactivate_product/{id}','ProductController@unactivate_product');


