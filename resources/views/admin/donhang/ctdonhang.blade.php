@extends('admin.layout.index')
@section('content')
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Product</h3>
					<div class="row">
						<div class="col-md-6">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-heading">
									@if(session('tb'))
					                 <h3 class="panel-title">{{session('tb')}} </h3>
					                 @endif
								</div>
								<div class="panel-body">
								<table class="table">
									@foreach($user as $use)
										<thead>
											<tr>
												<th>Địa chỉ nhận hàng</th>
											</tr>
											<tr>
												<th><b>Họ và tên :</b>{{$use->hoten}}</th>
											</tr>
											<tr>
												<th><b>SĐT :</b>{{$use->sdt}}</th>
											</tr>
											<tr>
												<th><b>Địa chỉ :</b>{{$use->diachi}}</th>
											</tr>
											<tr>
												<th><b>Trạng thái đơn hàng :</b>{{$use->trangthai}}</th>
											</tr>
										</thead>
										@endforeach
										<tbody>
											<tr>
												<td>Sản phẩm</td>
												<td>Tên sản phẩm</td>
												<td>Số lượng</td>
												<td>Giá</td>					
												<td>Thành tiền</td>						
											</tr>
											@foreach($ctdonhang as $dh)
											<tr>
												<td>{{$dh->idsp}}</td>
												<td>{{$dh->title}}</td>
												<td>{{$dh->soluong}}</td>
												<td><p class="number">{{$dh->price}}</p></td>					
												<td><p class="number">{{$dh->thanhtien}}</p></td>						
											</tr>
											@endforeach	
											@foreach($user as $use)
											<tr>
												<th><b>Tổng tiền : </b><b class="number">{{$use->tongtien}}</b></th>
											</tr>
										@endforeach
										</tbody>
									</table>
									<div class="panel-footer">
									<div class="row">
										<div class="col-md-6 text-right"><a href="" class="btn btn-primary">Xuất file</a></div>
									</div>
								</div>
								</div>
							</div>

							<!-- END BASIC TABLE -->
						</div>
							<!-- END CONDENSED TABLE -->
						</div>
					</div>
				</div>
@endsection