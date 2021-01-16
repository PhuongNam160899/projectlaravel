<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class categorycontroller extends Controller
{
    public function getcategory(){
    	$category = DB::table('category')->get();
    	return view('admin.category.category_admin',['category' => $category]);
    }
    public function addcategory(Request $request){
    	//return view('admin.category.addcategory');
    	$this ->validate($request,[
    		'category' =>'required |min:3|max:100'
    	],
    	[
    		'category.required' =>'Ban chua nhap category',
    		'category.min' =>'phai co do dai 3 ky tu',
    		'category.max' => 'Toi da 100',
    	]);
    	//echo $request->category; 
    	$file = $request->file('category_img');
    	$name = $file ->getClientOriginalName();
    	$file ->move("image",$name);
    	DB::table('category')->insert([
		    'Category' => $request->category,
		    'Category_img' => $name
		    ]);
    	return redirect('admin/category/showcategory')->with('tb','thanhcong');
    }
    public function savecategory(Request $request,$id){
    	//return view('admin.category.addcategory');
    	$this ->validate($request,[
    		'category' =>'required |min:3|max:100'
    	],
    	[
    		'category.required' =>'Ban chua nhap category',
    		'category.min' =>'phai co do dai 3 ky tu',
    		'category.max' => 'Toi da 100',
    	]);
    	//echo $id; 
    	if($request-> hasFile('category_img'))
    	{
    		$file = $request->file('category_img');
	    	$name = $file ->getClientOriginalName();
	    	$file ->move("image",$name);
	    	DB::table('category')
                ->where('id', $id)
                ->update(['Category' => $request ->category,
                		'Category_img' => $name
                	]);
    	}
    	else{
    		DB::table('category')
                ->where('id', $id)
                ->update(['Category' => $request ->category]);
    	}
    	
    	return redirect('admin/category/showcategory')->with('tb','thanhcong');
    }
    public function deletecategory($id){
    	//return view('admin.category.addcategory');
            DB::table('category')->where('id',$id)->delete();
    	return redirect('admin/category/showcategory')->with('tb','thanhcong');
    }
}
