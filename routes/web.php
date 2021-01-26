<?php

use Illuminate\Support\Facades\Route;

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
//use DB;
use App\Models\category;

Route::get('index1','App\Http\Controllers\MyController@test');
Route::post('loginadmin','App\Http\Controllers\usecontroller@loginadmin');
Route::get('admin','App\Http\Controllers\usecontroller@admin');
Route::group(['prefix' => 'admin', 'middleware' => 'adminlogin'],function(){
	Route::group(['prefix' =>'category'],function(){
		Route::get('showcategory','App\Http\Controllers\categorycontroller@getcategory');
		Route::post('addcategory','App\Http\Controllers\categorycontroller@addcategory');
		Route::post('savecategory/{id}','App\Http\Controllers\categorycontroller@savecategory');
		Route::get('deletecategory/{id}','App\Http\Controllers\categorycontroller@deletecategory');
	});
	Route::group(['prefix' =>'product'],function(){
		Route::get('product','App\Http\Controllers\productadmin@getproduct');
		Route::get('addproduct','App\Http\Controllers\productadmin@addproduct');
		Route::post('addproductad','App\Http\Controllers\productadmin@addproductad');
		Route::get('editproduct/{id}','App\Http\Controllers\productadmin@editproduct');
		Route::post('saveproduct/{id}','App\Http\Controllers\productadmin@saveproduct');
		Route::get('deleteproduct/{id}','App\Http\Controllers\productadmin@deleteproduct');
	});
	Route::group(['prefix' =>'comment'],function(){
		Route::get('comment','App\Http\Controllers\commentadmin@getcomment');
		Route::get('deletecomment/{id}','App\Http\Controllers\commentadmin@deletecomment');
	});
	Route::group(['prefix' =>'donhang'],function(){
		Route::get('donhang','App\Http\Controllers\donhangadmin@getdonhang');
		Route::post('searchdh','App\Http\Controllers\donhangadmin@searchdh');
		Route::post('savedonhang/{id}','App\Http\Controllers\donhangadmin@savedonhang');
		Route::get('ctdonhang/{id}','App\Http\Controllers\donhangadmin@ctdonhang');
	});
	Route::group(['prefix' =>'gioithieu'],function(){
		Route::get('gioithieu','App\Http\Controllers\gioithieuadmin@gioithieu');
		Route::post('savegioithieu/{id}','App\Http\Controllers\gioithieuadmin@savegioithieu');
	});
	Route::get('logout','App\Http\Controllers\usecontroller@logout');
});
Route::get('/','App\Http\Controllers\MyController@index');
Route::get('login','App\Http\Controllers\MyController@login');
Route::post('loginsubmit','App\Http\Controllers\MyController@loginsubmit');
Route::get('use','App\Http\Controllers\MyController@use');
Route::get('logout','App\Http\Controllers\MyController@logout');
Route::post('use_submit','App\Http\Controllers\MyController@use_submit');
Route::get('register','App\Http\Controllers\MyController@register');
Route::post('register_submit','App\Http\Controllers\MyController@register_submit');
Route::get('infoproduct/{id}','App\Http\Controllers\MyController@infoproduct');

Route::get('gioithieu','App\Http\Controllers\MyController@gioithieu');

Route::post('comment/{id}','App\Http\Controllers\MyController@comment');
Route::post('comment_del/{id}','App\Http\Controllers\MyController@comment_del');

Route::post('addcart/{id}','App\Http\Controllers\MyController@addcart');
Route::get('cart','App\Http\Controllers\MyController@cart');
Route::post('cart_del/{id}','App\Http\Controllers\MyController@cart_del');
Route::post('order_submit','App\Http\Controllers\MyController@order_submit');
Route::get('order','App\Http\Controllers\MyController@order');
Route::get('ctorder/{id}','App\Http\Controllers\MyController@ctorder');
Route::get('menu/{id}','App\Http\Controllers\MyController@menu');
Route::post('search','App\Http\Controllers\MyController@search');