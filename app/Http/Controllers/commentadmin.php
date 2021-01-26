<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\comment;
class commentadmin extends Controller
{
    public function getcomment(){
    	$data = comment::with('product')->get();
    	return view('admin.comment.comment',['comment'=>$data]);
    }
    public function deletecomment($id){
    	$comment = comment::where('id',$id)->delete();
    	return redirect('admin/comment/comment')->with('tb','Xóa thành công !');
    }
}
