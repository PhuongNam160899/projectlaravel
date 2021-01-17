@extends('index')
@section('content')
      <div class="login-body">
         <div class="login-body_from">
             <div class="login-body_tilte">
                 <p><b>Đăng Ký</b></p>
             </div>
             <form action="register_submit" method="POST">
                 <input type="hidden" name="_token" value="{{csrf_token()}}" />
                 <input type="text" name="username" maxlength="20" class="input-title" placeholder="Nhập usename" required="">  
                 <input type="password" class="input-title" maxlength="20" name="password" id="password" placeholder="Nhập mật khẩu" required="">
                 <input type="password" class="input-title_confirmpass" maxlength="20" name="repassword" id="confirm_password" placeholder="Nhập lại mật khẩu" required="">
                 <div class="confirmass"><img src="image/tichdo2.png" id="img1" ><img src="image/tichxanh.png" id="img2"></div>
                 <input type="text" class="input-title" name="hoten" maxlength="50" id="" placeholder="Nhập họ tên" required="">
                 <input type="number" class="input-title" name="sdt" maxlength="11" id="" placeholder="Nhập số điện thoại" required="">
                 <input type="email" class="input-title" name="gmail" id="" placeholder="Nhập Gmail" required="">  
                 <input type="text" class="input-title" name="diachi" id="" placeholder="Nhập địa chỉ" required="">
                 @if(count($errors))
                 <p class="error">{{$errors}}</p> 
                 @endif
                @if(session('tb'))
                 <p class="error">{{session('tb')}}</p> 
                 @endif        
                 <input type="submit" name="submit" class="input-button_submit" value="Đăng Ký">
             </form> 
             <p class="login-body_or"></p>
             <div class="login-body_isaccount"><p>Bạn đã có tài khoản ?</p><a href="login.php">Đăng nhập.</a></div>              
         </div>
     </div>
@endsection
