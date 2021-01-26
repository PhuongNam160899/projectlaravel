<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\category;
use App\Models\product;
class productadmin extends Controller
{
    public function getproduct(){
        $data = product::with('category')->paginate(10);
        // dd($data);
    	return view('admin.product.productadmin',['product' => $data]);
    }
    public function addproduct(){
    	$data = category::all();
    	return view('admin.product.addproductad',['category' =>$data]);
    }
    public function addproductad(Request $request){
    	$category = $request->category;
    	$data = category::where('Category',$category)->get();
    	foreach ($data as $key) {
    		$id = $key->id;
    	}
    	$file = $request->file('product_img');
    	$name = $file ->getClientOriginalName();
    	$file ->move("image",$name);
        $product = new product;
        $product->title = $request ->title;
        $product->title_kdau = convert_name($request ->title);
        $product->descr = $request->desr;
        $product->price = $request->price;
        $product->category = $id;
        $product->product_img = $name;
        $product-save();
    	return redirect('admin/product/product')->with('tb','Thêm thành công');
    }
    public function editproduct($id){

    	$data = DB::table('product')->join('category', 'product.Category', '=', 'category.id')->where('product.id','=',$id)->select('product.*','category.Category')->get();
    	$cate = category::all();
    	return view('admin.product.editproduct',['product' =>$data,'category' =>$cate]);
    }
    public function saveproduct(Request $request,$id)
    {

    	$data = DB::table('category')->where('Category',$category)->get();
    	foreach ($data as $key) {
    		$idcate = $key->id;
    	}
    	if($request-> hasFile('product_img'))
    	{
    		$file = $request->file('product_img');
	    	$name = $file ->getClientOriginalName();
	    	$file ->move("image",$name);
            $product = product::find($id);
	    	$product->title = $request ->title;
            $product->title_kdau = convert_name($request ->title);
            $product->descr = $request->desr;
            $product->price = $request->price;
            $product->category = $idcate;
            $product->product_img = $name;
            $product-save();
    	}
    	else{
    		$product = product::find($id);
            $product->title = $request ->title;
            $product->title_kdau = convert_name($request ->title);
            $product->descr = $request->desr;
            $product->price = $request->price;
            $product->category = $idcate;
            $product-save();
    	}
    	return redirect('admin/product/product')->with('tb','Sửa thành công !');
    }
    public function deleteproduct($id)
    {
    	product::where('id',$id)->delete();
    	return redirect('admin/product/product')->with('tb','Xóa thành công !');
    }
}
