<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
class MyController extends Controller
{
    public function myview(){
        $data = [
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'lerver' => 0,
            'hoten' => 'Ha phuong nam',
            'sdt' => '0964712946',
            'diachi' => 'tb',
            'gmail' => 'admin@gmail.com',
        ];
        DB::table('user')->insert($data);
        
    }
    public function login(){
    	return view('login');
    }
    public function index(){
        $product = DB::table('product')->paginate(10);
        $category = DB::table('category')->get();
        return view('home',['product' =>$product,'category' =>$category]);
    }
    public function loginsubmit(Request $request){
        $use = $request ->username;
        $pass = $request ->password;
        $pass = md5($pass);
        echo $use;
        echo $pass;
        //echo $use;
        $where =['username'=>$use,'password'=>$pass,'lerver'=> 1];
        $data = DB::table('user')->where($where)->get();
        $dem = count($data);
        //print_r($data);
        echo $dem;
        if($dem == 1)
        {
            Session::put('username',$use);
            return redirect('index');
        }
        else{
            return redirect()->back()->with('tb','Tài khoản hoặc mật khẩu không chính xác');
        }
    }
    public function logout(){
        Auth::logout();
        Session::forget('username');
        Session::forget('cart');
        return redirect('login');
    }
     public function use(){
        $use = Session::get('username');
        $data  = DB::table('user')->where('username',$use)->get();
        return view('use',['data' =>$data]);
    }
    public function use_submit(Request $request)
    {
        $use = Session::get('username');
        $hoten = $request ->hoten;
        $sdt = $request ->sdt;
        $diachi = $request ->diachi;
        $gmail = $request ->gmail;
        DB::table('user')
            ->where('username',$use)
            ->update([
                'hoten' => $hoten,
                'sdt' => $sdt,
                'diachi' => $diachi,
                'gmail' => $gmail
             ]);
        return redirect('use');  
    }
    public function register(){
        return view('register');
    }
    public function register_submit(Request $request)
    {    
        $this ->validate($request,[
            'repassword' =>'same:password'
        ],
        [
            'repassword.same' =>'Mật khẩu không trùng khớp',
        ]);
        $use = $request ->username;
        $pas = $request ->password;
        $pas = md5($pas);
        $hoten = $request ->hoten;
        $sdt = $request ->sdt;
        $diachi = $request ->diachi;
        $gmail = $request ->gmail;
        $data  = DB::table('user')->where('username',$use)->get();
        $dem = count($data);
        if(count($data) == 1)
        {
            return redirect('register')->with('tb','Tài khoản đã tồn tại');
        }
        else
        {
            DB::table('user')->insert([
            'username' => $use,
            'password' => $pas,
            'lerver' => 1,
            'hoten' => $hoten,
            'sdt' => $sdt,
            'diachi' => $diachi,
            'gmail' => $gmail
            ]);
        return redirect('login');  
        }
     }
     public function infoproduct($id)
     {
        $data  = DB::table('product')->where('id',$id)->get();
        $comment  = DB::table('comment')->where('product_id',$id)->get();
        return view('infoproduct',['infopro' => $data,'comment' => $comment]);
     }
     public function comment(Request $request,$id)
     {
        $conten = $request ->content;
        $date = date('Y-m-d');
        $use =Session::get('username');
        DB::table('comment')->insert([
            'product_id' => $id,
            'usename' => $use,
            'content' => $conten,
            'date' => $date,
            ]);
        return redirect()->back();
     }
     public function comment_del(Request $request,$id)
     {
        $use1 = $request ->username;
        $use2 =Session::get('username');
        if($use1 == $use2)
        {
            DB::table('comment')->where('id',$id)->delete();
            return redirect()->back();
        }
        else{
            return redirect()->back()->with('tb','Không được phép xóa');
        }
     }
    public function cart(){
        $cart = Session::get('cart');
        return view('cart',['cart'=>$cart]);
    }
    public function addcart(Request $request,$id)
     {
        $soluong = $request ->cart_number;
        $data  = DB::table('product')->where('id',$id)->get();
        foreach ($data as $key ) {
            $cart = Session::get('cart');
            //echo $cart[$id]['quantity'];
           if(isset($cart[$id]))
            {
                $cart[$id]['quantity'] = $cart[$id]['quantity']+$soluong;
                $cart[$id]['money'] = $cart[$id]['quantity']*$cart[$id]['price'];
            }
            else
            {
                //echo "huhu";
                $cart[$id] = [ 
                        'id-product'=> $id,
                        'product_img' =>$key ->product_img,
                        'title'=> $key ->title,
                        'quantity'=> $soluong, 
                        'price' => $key ->price,
                        'money' =>$soluong*$key ->price, 
                ];

            }
        }
        Session::put('cart',$cart);
        //print_r(Session::get('cart')) ;
        return redirect()->back()->with('tb','Thêm giỏ hàng thành công');
     }
    public function cart_del(Request $request,$id)
     {
        $cart = Session::get('cart');
        unset($cart[$id]);
        Session::put('cart',$cart);
        return redirect()->back()->with('tb','Xóa thành công');
     }
     public function order_submit(Request $request)
     {
        $cart = Session::get('cart');
        $thanhtien = $request ->thanhtien;
        $use =Session::get('username');
        $date = date('Y-m-d');
        $id = DB::table('donhang')->insertGetId( [
            'username' => $use,
            'tongtien' => $thanhtien,
            'trangthai' => 'Chờ xác nhận',
            'date' => $date,
        ]);
        // print_r($id);
        foreach($cart as $value )
        {
            $idsp = $value['id-product'];
            $soluong = $value['quantity'];
            $gia = $value['price'];
            $tt = $value['money'];
            DB::table('ctdonhang')->insertGetId( [
            'iddh' => $id,
            'idsp' => $idsp,
            'soluong' => $soluong,
            'gia' => $gia,
            'thanhtien' =>$tt,
        ]);
        }
        Session::forget('cart');
        return redirect()->back()->with('tb','Đặt hàng thành công');
     }
    public function order(){
        $use =Session::get('username');
        $data = DB::table('donhang')->where('username',$use)->get();
        return view('order',['donhang' => $data]);
    }
    public function ctorder($id){
        $use =Session::get('username');
        $where =['user.username'=>$use,'donhang.id'=>$id];
        $data = DB::table('user')->join('donhang', 'user.username', '=', 'donhang.username')->where($where)->get();
        $data2  = DB::table('ctdonhang')->join('donhang', 'ctdonhang.iddh', '=', 'donhang.id')->join('product', 'ctdonhang.idsp', '=', 'product.id')->where('ctdonhang.iddh','=',$id)->get();

        //print_r($data2);
        return view('ctorder',['user' => $data,'ctdh' =>$data2]);
    }
    public function menu($id){
        $data = DB::table('product')->join('category', 'product.Category', '=', 'category.id')->where('category.id','=',$id)->select('product.id','product.product_img','product.title','product.price')->paginate(10);
        return view('menu',['product' => $data]);
    }
    public function search(Request $request){
        $tukhoa = $request->search;
        $data = DB::table('product')->where('title_kdau','like',"%$tukhoa%")->paginate(10);
        //print_r($data);
        return view('menu',['product' => $data]);
    }
    public function gioithieu(){
        $data = DB::table('gioithieu')->get();
        return view('gioithieu',['gioithieu'=>$data]);
    }
}
