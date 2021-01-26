<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\category;
class categorycontroller extends Controller
{
    public function getcategory(){
    	$category = category::all();
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
        $category new category;
        $category->Category = $request->category;
        $category->Category_img = $name;
        $category->save();
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
            $category =category::find($id);
            $category->Category = $request->category;
            $category->Category_img = $name;
            $category->save();
    	}
    	else{
    		$category =category::find($id);
            $category->Category = $request->category;
            $category->save();
    	}
    	return redirect('admin/category/showcategory')->with('tb','thanhcong');
    }
    public function deletecategory($id){
        $category =category::find($id);
        $category->delete();
    	return redirect('admin/category/showcategory')->with('tb','thanhcong');
    }
}
