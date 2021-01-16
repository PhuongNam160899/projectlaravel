@extends('index')
@section('content')
<div class="inforproduct-title">
    @foreach($infopro as $info)
            <div class="inforproduct-title_img">
                <div class="inforproduct-title_img-top">
                    <img src="image/{{$info ->product_img}}">
                </div>
                <div class="inforproduct-title_img-bottom"></div>
            </div>
            <div class="inforproduct-title_body">
                <div class="inforproduct-title_body-title">
                    <h1>{{$info ->title}}</h1>
                </div>
                <div class="inforproduct-title_body-price">
                    <b class="number">{{$info ->price}}</b>
                </div>
                <form action="addcart/{{$info->id}}" method="POST">
                <input type="hidden"  name="_token" value="{{csrf_token()}}" />
                <div class="inforproduct-title_body-cart">
                    <div class="inforproduct-title_body-cart_number">
                        <p>Số lượng :</p>
                        <input type="number" class="cart_number" value="1" name="cart_number">
                    </div>
                    <div class="inforproduct-title_body-cart_submit">
                        <input type="submit" class="cart_submit" name="cart_submit" value="Thêm vào giỏ hàng">
                    </div>
                    @if(session('tb'))
                     <div><p>{{session('tb')}}</p></div>
                     @endif
                </div>
                </form>
    
                <div class="inforproduct-introduce">
                    <b>Giới thiệu</b>
                    <label><?php echo $info ->descr ?></label>
                </div>
            </div>
        </div>
        
        <div class="inforproduct">
            <div class="product-title">
                <p><b>Đánh giá món ăn</b></p>
            </div>
            @if(isset($use))
            @foreach($comment as $cm)
                <div class="inforproduct-comment">
                <div class="inforproduct-comment_avt"><img src="image/use1.png"></div>
                <div class="inforproduct-comment_content">
                    <form action="comment_del/{{$cm ->id}}" method="POST">
                        <input type="hidden"  name="_token" value="{{csrf_token()}}" />
                    <div class="inforproduct-comment_content-use">
                        <input type="lable" class="input-use" name="username" value="{{$cm -> usename}}" readonly>
                    </div>
                    <div class="inforproduct-comment_content-body">
                        <p>{{$cm ->content}}</p>
                        <p class="text">{{$cm ->date}}</p>
                    </div>
                </div>
                    <div class="inforproduct-comment_delete">
                     <input type="submit" name="commnet_del" value="Xóa">
                     </div>
                </form>
                </div>
            @endforeach
            <form action="comment/{{$info->id}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="inforproduct-comment_body">
                <p>Bình luận:</p>
                <textarea  name="content" class="hihi" rows="2" cols="70"></textarea>
            </div>
            <input type="submit" class="inforproduct-comment_submit" name="comment_submit" value="Gửi">
            </div>
            </form>
            @else
            <p>Vui lòng <a href="login">đăng nhập</a> để đánh giá</p>
            @endif
            @endforeach
@endsection
