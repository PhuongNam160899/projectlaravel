@extends('index')
@section('content')
 <div class="login-body">
         <div class="login-body_from">
             <div class="login-body_tilte">
                 <p><b>Người Dùng</b></p>
             </div>
            <!--  <form>
                 <div class="use-avt">
                     <div class="use-avt_img"><img src="image/avtt.jpg"></div>
                     <div class="use-avt_imgok">
                     <input type="file" name="uploadfile" id="img" style="display:none;"/>
                    <label for="img">Chọn ảnh</label>
                    </div>
                 </div>
             </form> -->
             @foreach($data as $use)
             <form action="use_submit" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
             <div class="use"><b>Họ và tên :</b><input type="text" name="hoten" maxlength="50" value="{{$use ->hoten}}" class="use-input"></div>
             <div class="use"><b>Số Điện Thoại :</b><input type="text" name="sdt" value="{{$use ->sdt}}" class="use-input" readonly></div>
             <div class="use"><b>Địa Chỉ :</b><input type="text" name="diachi" value="{{$use ->diachi}}" class="use-input"></div>
             <div class="use"><b>Gmail :</b><input type="text" name="gmail" value="{{$use ->gmail}}" class="use-input"></div>
                <div class="use-submit">
                    <input type="submit" class="input-button_changepass" name="changepass" value="Đổi mật khẩu">
                    <input type="submit" class="input-button_save" name="save" value="Lưu thông tin">
                </div>
                <a href="logout" id="logout" ><div class="input-button_logout"><p>Đăng Xuất</p></div></a>         
             </form>
             @endforeach
         </div>
     </div>
@endsection
