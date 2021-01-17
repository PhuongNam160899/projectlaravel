<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class productadmin extends Controller
{
    public function getproduct(){
    	$data = DB::table('product')->join('category', 'product.Category', '=', 'category.id')->select('product.*','category.Category')->paginate(10);
    	return view('admin.product.productadmin',['product' => $data]);
    }
    public function addproduct(){
    	// $data = DB::table('product')->join('category', 'product.Category', '=', 'category.id')->select('product.*','category.Category')->get();
    	$data = DB::table('category')->get();
    	return view('admin.product.addproductad',['category' =>$data]);
    }
    public function addproductad(Request $request){
    	$title = $request ->title;
    	$des = $request->desr;
    	$price =$request->price;
    	$category = $request->category;
    	$title_kdau = convert_name($title);
    	// echo  $title ;
    	// echo $des;
    	// echo $price;
    	// echo $category;
    	$data = DB::table('category')->where('Category',$category)->get();
    	foreach ($data as $key) {
    		$id = $key->id;
    	}
    	//echo $id;
    	$file = $request->file('category_img');
    	$name = $file ->getClientOriginalName();
    	$file ->move("image",$name);
    	DB::table('product')->insert([
		    'title' => $title,
		    'title_kdau' =>$title_kdau,
		    'descr' => $des,
		    'price'=>$price,
		    'category'=>$id,
		    'product_img'=>$name
		    ]);
    	return redirect('admin/product/product')->with('tb','Thêm thành công');
    }
    public function editproduct($id){
    	//echo $id;
    	$data = DB::table('product')->join('category', 'product.Category', '=', 'category.id')->where('product.id','=',$id)->select('product.*','category.Category')->get();
    	$cate = DB::table('category')->get();
    	return view('admin.product.editproduct',['product' =>$data,'category' =>$cate]);
    }
    public function saveproduct(Request $request,$id)
    {
    	$title = $request ->title;
    	$des = $request->desr;
    	$price =$request->price;
    	$category = $request->category;
    	$title_kdau = convert_name($title);
    	// echo  $title ;
    	// echo $des;
    	// echo $price;
    	// echo $category;
    	$data = DB::table('category')->where('Category',$category)->get();
    	foreach ($data as $key) {
    		$idcate = $key->id;
    	}
    	if($request-> hasFile('product_img'))
    	{
    		$file = $request->file('product_img');
	    	$name = $file ->getClientOriginalName();
	    	$file ->move("image",$name);
	    	DB::table('product')
                ->where('id', $id)
                ->update([
                	'title' => $title,
                	'title_kdau' => $title_kdau,
                	'descr' => $des,
                	'price' =>$price,
                	'category' =>$idcate,
                	'product_img'=>$name
                	]);
    	}
    	else{
    		DB::table('product')
                ->where('id', $id)
                ->update([
                	'title' => $title,
                	'title_kdau' => $title_kdau,
                	'descr' => $des,
                	'price' =>$price,
                	'category' =>$idcate
                	]);
    	}
    	return redirect('admin/product/product')->with('tb','Sửa thành công !');
    }
    public function deleteproduct($id)
    {
    	DB::table('product')->where('id',$id)->delete();
    	return redirect('admin/product/product')->with('tb','Xóa thành công !');
    }
}
