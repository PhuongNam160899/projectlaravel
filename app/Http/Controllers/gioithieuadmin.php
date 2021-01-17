<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class gioithieuadmin extends Controller
{
    public function gioithieu(){
    	$data = DB::table('gioithieu')->get();
        return view('admin.gioithieu.gioithieu',['gioithieu'=>$data]);
    }
    public function savegioithieu(Request $request,$id){
    	DB::table('gioithieu')
                ->where('id', $id)
                ->update(['title' => $request ->title,
                		'noidung' => $request ->desr
                	]);
        return redirect()->back()->with('tb','Sửa thành công');
    }
    
}
