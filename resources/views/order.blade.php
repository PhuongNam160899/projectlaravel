@extends('index')
@section('content')
<div class="body-cart">
           <table>
               <tr>
                   <th class="table-cart">Mã đơn hàng</th>
                   <th class="table-cart">Ngày đặt hàng</th>
                   <th class="table-cart">Tổng tiền</th>
                   <th class="table-cart">Trạng thái</th>
                   <th class="table-cart">Chức năng</th>
               </tr>
           </table>
          @if($donhang != null)
          @foreach($donhang as $dh)
                   <table class="table-cart_style" >
                       <tr>
                           <th class="table-cart-product"><a href="">{{$dh->id}}</a></th>
                           <th class="table-cart-product">{{$dh->date}}</th>
                           <th class="table-cart-product"><p class="number">{{$dh->tongtien}}</p></th>
                           <th class="table-cart-product">{{$dh->trangthai}}</th>
                           <th class="table-cart">
                           <a href="ctorder/{{$dh->id}}">Xem chi tiết</a>
                           </th>
                       </tr>
                   </table>
          @endforeach
          @else
                  <table>
               <tr>
                   <th class="table-cart"><p>Đơn hàng trống</p></th>
               </tr>
           </table>
           @endif
       </div>
@endsection