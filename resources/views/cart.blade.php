@extends('index')
@section('content')
       <div class="body-cart">
           <table>
               <tr>
                   <th class="table-cart">Sản phẩm</th>
                   <th class="table-cart">Tên sản phẩm</th>
                   <th class="table-cart">Số lượng</th>
                   <th class="table-cart">Giá</th>
                   <th class="table-cart">Thành tiền</th>
                   <th class="table-cart">Chức năng</th>
               </tr>
           </table>
           @if($cart != null)
           @php
           $tong = 0;
           @endphp
           @foreach($cart as $value)
              @php
              $tong = $tong+$value['money'];
              @endphp
                <table class="table-cart_style" >
               <tr>
                   <th class="table-cart-product"><img src="image/{{$value['product_img']}}"></th>
                   <th class="table-cart-product"><a href="">{{$value['title']}}</a></th>
                   <th class="table-cart-product">{{$value['quantity']}}</th>
                   <th class="table-cart-product"><p class="number">{{$value['price']}}</p></th>
                   <th class="table-cart-product"><p class="number">{{$value['money']}}</p></th>
                   <th class="table-cart">
                    <form action="cart_del/{{$value['id-product']}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <input type="submit" name="cart_del" class="cart_del" value="xoá">
                        
                    </form>
                   </th>
               </tr>
           </table>
              @endforeach
               <div class="cart-money"><b>Tổng tiền :</b><p class="number">{{$tong}}</p></div> 
              <form action="order_submit" method="POST">
            <div class="cart-order">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="submit" name="order_submit" value="Đặt hàng">
                <input type="hidden" name="thanhtien" value="{{$tong}}">
            </div>
        </form>  
           @else
           <table class="table-cart_style" >
               <tr>
                    <th><p>Giỏ hàng trống</p></th>
               </tr>
           </table>
           @if(session('tb'))
           <table>
               <tr>
                   <th class="table-cart"><p>{{session('tb')}}</p></th>
               </tr>
           </table>
                 @endif       
           @endif                  
       </div>
@endsection