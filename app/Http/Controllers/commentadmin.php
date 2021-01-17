<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class commentadmin extends Controller
{
    public function getcomment(){
    	$data =DB::table('comment')->join('product','product_id','=','product.id')->select('comment.*','product.title')->get();
    	//print_r($data);
    	return view('admin.comment.comment',['comment'=>$data]);
    }
    public function deletecomment($id){
    	DB::table('comment')->where('id',$id)->delete();
    	return redirect('admin/comment/comment')->with('tb','Xóa thành công !');
    }
}
