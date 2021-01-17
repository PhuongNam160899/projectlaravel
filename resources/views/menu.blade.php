@extends('index')
@section('content')
           <div class="slide">
            <div class="slide-image">
                <div class="wap">
                <img class="slide1" src="image/bn1.png" idx="0" />
                <img class="slide1" src="image/bn2.jpg" idx="1" />
                <img class="slide1" src="image/bn3.jpg" idx="2" />
               <!--  <img class="slide1" src="image/chụp-ảnh-quảng-cáo-món-ăn.jpg" idx="3"/> -->
                </div>
            </div>
            <img class="btn-change" id="next" src="image/next.png" style="display: none;" alt="">
            <img class="btn-change" id="prev" src="image/prev.png"  style="display: none;" alt="">
            <!-- <button class="button_click next"></button>
                <button class="button_click "></button> -->
                <div class="change-img">
                 <button stt="1" style="display: none;">1</button> 
                 <button stt="2" style="display: none;">2</button>
                 <button stt="3" style="display: none;">3</button>
                </div>
            </div>
        <div class="product">
            <div class="product-title">
                <p><b>Sản Phẩm</b></p>
            </div>
           @foreach($product as $pr)
           <a href="infoproduct/{{$pr->id}}">
                <div class="product-body">
                    <div class="product-body_img">
                        <img src="image/{{$pr->product_img}}">
                    </div>
                    <div class="product-body_title">
                        <p>{{$pr->title}}</p>
                    </div>
                    <div class="product-body_price"><b class="number">{{$pr->price}}</b></div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="product">{!! $product->links() !!}</div>
@endsection
