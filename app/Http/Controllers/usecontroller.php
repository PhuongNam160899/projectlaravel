<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class usecontroller extends Controller
{
	public function admin(){
    	return view('admin.login.loginadmin');
    }
    public function loginadmin(Request $request){
    	$use = $request ->email;
    	$pass = $request ->password;
    	if(Auth::attempt(['username' =>$use,'password' =>$pass,'lerver'=>0]))
    	{
    		if (Auth::check()) {
            // echo "Nguoi dung da dang nhap he thong";
    			return redirect('admin/category/showcategory');
            }
            else{
                echo "Nguoi chua login";
            }
    	}
    	else{
    		echo 'loi';
    	}
    }
    public function logout(){
        Auth::logout();
        return redirect('admin');
    }
}
