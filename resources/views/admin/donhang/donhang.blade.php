@extends('admin.layout.index')
@section('content')
			<div class="main-content">
				<div class="container-fluid">
					<h3>Product</h3>
					<form action="admin/donhang/searchdh" method="POST">
						{{ csrf_field() }}
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="input-group_search">
                        <input type="number" value=""  name="iddh" class="form-control_search" placeholder="Nhập mã đơn hàng">
                        <button type="submit" class="input-group-btn_search">Go</button>
                    </div>
                </form>
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
										<thead>
											<tr>
												<th>Mã đơn hàng</th>
												<th>username</th>
												<th>SDT</th>
												<th>Tổng tiền</th>
												<th>Trạng thái</th>
												<th>Date</th>
												<th>Chức năng</th>
											</tr>
										</thead>
										<tbody>
										@foreach($donhang as $dh)
										<form action="admin/donhang/savedonhang/{{$dh->id}}" method="POST" enctype="multipart/form-data">
										<input type="hidden" name="_token" value="{{csrf_token()}}" />
											<tr>
												<td>{{$dh ->id}}</td>
												<td>{{$dh ->username}}</td>
												<td>{{$dh ->sdt}}</td>
												<td><p class="number">{{$dh ->tongtien}}</p></td>					
												<td>
													<select class="input-product-ad-tt" name="trangthai">	
														<option>{{$dh ->trangthai}}</option>
														<option>Đã xác nhận</option>
														<option>Đang giao hàng</option>
														<option>Đã giao hàng</option>
													</select></td>
												<td>{{$dh ->date}}</td>							
												<th>
													<button type="submit">Lưu</button>
													<b>|</b>
													<a href="admin/donhang/ctdonhang/{{$dh->id}}"> chi tiết</a>
												</th>
											</tr>
											</form>
										@endforeach	
										</tbody>
									</table>
								
									<div class="panel-footer">
									<div class="row">
										<div class="col-md-6 text-right"><a href="admin/donhang/donhang" class="btn btn-primary">Làm mới</a></div>
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