<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gioithieu;
class gioithieuadmin extends Controller
{
    public function gioithieu(){
        $data = gioithieu::all();
        return view('admin.gioithieu.gioithieu',['gioithieu'=>$data]);
    }
    public function savegioithieu(Request $request,$id){
        $gioithieu = gioithieu::find($id);
        $gioithieu->title = $request ->title;
        $gioithieu->noidung = $request ->desr;
        $gioithieu->save();
        return redirect()->back()->with('tb','Sửa thành công');
    }
    
}
