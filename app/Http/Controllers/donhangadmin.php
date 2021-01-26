<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\donhang;
class donhangadmin extends Controller
{
    public function getdonhang(){
        // $data = donhang::with('User')->get();
        // dd($data);
    	$data =DB::table('donhang')->join('user','donhang.username','=','user.username')->select('donhang.*','user.sdt')->get();
    	return view('admin.donhang.donhang',['donhang'=>$data]);
    }
    public function savedonhang(Request $request,$id){
    	$tt =$request->trangthai;
    	echo $tt;
    	DB::table('donhang')
                ->where('id', $id)
                ->update([
                	'trangthai'=>$tt
                	]);
        $data =DB::table('donhang')->join('user','donhang.username','=','user.username')->select('donhang.*','user.sdt')->get();
        session()->flash('tb', 'Lưu thành công');
        return view('admin.donhang.donhang',['donhang'=>$data]);
    	// return redirect()->back()->with('tb','Lưu thành công');
    }
    public function ctdonhang($id)
    {
    	// echo $id;
    	$data1 = DB::table('user')->join('donhang', 'user.username', '=', 'donhang.username')->where('donhang.id','=',$id)->get();
        $data2  = DB::table('ctdonhang')->join('donhang', 'ctdonhang.iddh', '=', 'donhang.id')->join('product', 'ctdonhang.idsp', '=', 'product.id')->where('ctdonhang.iddh','=',$id)->get();
    	return view('admin.donhang.ctdonhang',['user'=>$data1,'ctdonhang'=>$data2]);

    }
    public function searchdh(Request $request){
        $iddh = $request->iddh;
        $data =DB::table('donhang')->join('user','donhang.username','=','user.username')->where('id',$iddh)->select('donhang.*','user.sdt')->get();
        return view('admin.donhang.searchdh',['donhang'=>$data]);
        // return redirect('admin/donhang/donhang',['donhang'=>$data]);
    }
}
