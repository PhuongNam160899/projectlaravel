@extends('index')
@section('content')
<div class="login-body">
         <div class="login-body_from">
             <div class="login-body_tilte">
                 <p><b>Đăng Nhập</b></p>
             </div>
             <form action="loginsubmit" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                 <input type="text" maxlength="50" name="username" class="input-title" id="id_username" placeholder="Nhập số điện thoại" required="">
                 <input type="password" class="input-title" name="password" id="id_password" placeholder="Nhập mật khẩu" required="">
                 <input type="checkbox" class="input-radio" name="checksave" value="yes">
                 <label for="male">Ghi nhớ mật khẩu</label><br>
                 @if(session('tb'))
                    <p class="error">{{session('tb')}}</p>
                @endif
                 <input type="submit" name="submit" class="input-button_submit" id="Dangnhap" value="Đăng Nhập">
             </form>
             <form action="register">
                 <input type="submit" class="input-button_register" name="" value="Đăng Ký">
             </form>
         </div>
     </div>
@endsection
