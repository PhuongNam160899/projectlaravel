@extends('index')
@section('content')
<div class="order-use">
        @foreach($user as $use)
                  <div class="order-use_title"><p>Địa chỉ nhận hàng</p></div>
                  <div class="order-use_use"><b>Họ và tên:</b><p>{{$use->hoten}}</p></div>
                  <div class="order-use_use"><b>Số điện thoại:</b><p>{{$use->sdt}}</p></div>
                  <div class="order-use_use"><b>Địa chỉ:</b><p>{{$use->diachi}}</p></div>
                  <div class="order-trangthai"><b>Trạng thái đơn hàng:</b><p>{{$use->trangthai}}</p></div> 
        @endforeach
      </div>
       <div class="body-ctorder">
           <table>
               <tr>
                   <th class="table-cart">Sản phẩm</th>
                   <th class="table-cart">Tên sản phẩm</th>
                   <th class="table-cart">Số lượng</th>
                   <th class="table-cart">Giá</th>
                   <th class="table-cart">Thành tiền</th>
               </tr>
           </table>
        @php
           $tong = 0;
        @endphp
         @foreach($ctdh as $ct)
              @php
              $tong = $tong+$ct->thanhtien;
              @endphp
                   <table class="table-cart_style" >
               <tr>
                   <th class="table-cart-product"><img src="image/{{$ct->product_img}}"></th>
                   <th class="table-cart-product"><a href="">{{$ct->title}}</a></th>
                   <th class="table-cart-product">{{$ct->soluong}}</th>
                   <th class="table-cart-product"><p class="number">{{$ct->price}}</p></th>
                   <th class="table-cart-product"><p class="number">{{$ct->thanhtien}}</p></th>
               </tr>
           </table> 
          @endforeach
                <div class="order-money"><b>Tổng tiền :</b><p class="number">{{$tong}}</p></div>   
       </div>
@endsection
