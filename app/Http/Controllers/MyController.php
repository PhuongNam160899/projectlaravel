<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Models\category;
use App\Models\User;
use App\Models\product;
use App\Models\comment;
use App\Models\donhang;
use App\Models\ctdonhang;
use App\Models\gioithieu;

class MyController extends Controller
{
    public function login(){
    	return view('login');
    }
    public function index(){
        $category = category::all();
        $product = product::paginate(10);
        return view('home',['product' =>$product,'category' =>$category]);
    }
    public function loginsubmit(Request $request){

        $use = $request ->username;
        $pass = $request ->password;
        $pass = md5($pass);
        $where =['username'=>$use,'password'=>$pass,'lerver'=> 1];
        $data = User::where($where)->get();
        $dem = count($data);
        if($dem == 1)
        {
            Session::put('username',$use);
            return redirect('/');
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
        $data  = User::where('username',$use)->get();
        return view('use',['data' =>$data]);
    }
    public function use_submit(Request $request)
    {
        $use = Session::get('username');
        $user =User::find($use);
        $user->hoten = $request ->hoten;
        $user->sdt = $request ->sdt;
        $user->diachi = $request ->diachi;
        $user->gmail = $request ->gmail;
        $user->save();
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
        $data  = User::where('username',$use)->get();
        $dem = count($data);
        if(count($data) == 1)
        {
            return redirect('register')->with('tb','Tài khoản đã tồn tại');
        }
        else
        {
            $user = new User;
            $user->username = $use;
            $user->password = md5($request ->password);
            $user->lerver = 1;
            $user->hoten = $request ->hoten;
            $user->sdt = $request ->sdt;
            $user->diachi = $request ->diachi;
            $user->gmail = $request ->gmail;
            $user->save();
        return redirect('login');  
        }
     }
     public function infoproduct($id)
     {
        $data  = product::where('id',$id)->get();
        $comment  = comment::where('product_id',$id)->get();
        return view('infoproduct',['infopro' => $data,'comment' => $comment]);
     }
     public function comment(Request $request,$id)
     {
        $conten = $request ->content;
        $date = date('Y-m-d');
        $use =Session::get('username');
        $comment = new comment;
        $comment->product_id = $id;
        $comment->usename = $use;
        $comment->content = $conten;
        $comment->date = $date;
        $comment->save();
        return redirect()->back();
     }
     public function comment_del(Request $request,$id)
     {
        $use1 = $request ->username;
        $use2 =Session::get('username');
        if($use1 == $use2)
        {
            comment::where('id',$id)->delete();
            return redirect()->back();
        }
        else{
            return redirect()->back()->with('err','Không được phép xóa');
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
        $donhang = new donhang;
        $donhang->username = $use;
        $donhang->tongtien = $thanhtien;
        $donhang->trangthai = 'Chờ xác nhận';
        $donhang->date = $date;
        $donhang->save();
        $last_id = $donhang->id;
        foreach($cart as $value )
        {
            $ctdonhang = new ctdonhang;
            $ctdonhang->iddh = $last_id;
            $ctdonhang->idsp = $value['id-product'];
            $ctdonhang->soluong = $value['quantity'];
            $ctdonhang->gia = $value['price'];
            $ctdonhang->thanhtien= $value['money'];
            $ctdonhang->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('tb','Đặt hàng thành công');
     }
    public function order(){
        $use =Session::get('username');
        $data = donhang::where('username',$use)->get();
        return view('order',['donhang' => $data]);
    }
    public function ctorder($id){
        $use =Session::get('username');
        $where =['user.username'=>$use,'donhang.id'=>$id];
        $data = DB::table('user')->join('donhang', 'user.username', '=', 'donhang.username')->where($where)->get();
        // $data = donhang::with('username')->where('id',$id)->get();
        $dh = ctdonhang::with('product')->where('iddh',14)->get();
        dd($data);
        return view('ctorder',['user' => $data,'ctdh' => $dh]);
    }
    public function menu($id){
        $data = DB::table('product')->join('category', 'product.Category', '=', 'category.id')->where('category.id','=',$id)->select('product.id','product.product_img','product.title','product.price')->paginate(10);
        return view('menu',['product' => $data]);
    }
    public function search(Request $request){
        $tukhoa = $request->search;
        $data = product::where('title_kdau','like',"%$tukhoa%")->paginate(10);
        //print_r($data);
        return view('menu',['product' => $data]);
    }
    public function gioithieu(){
        $data = gioithieu::all();
        return view('gioithieu',['gioithieu'=>$data]);
    }
}
