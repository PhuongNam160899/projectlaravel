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
										<thead>
											<tr>
												<th>id</th>
												<th>Tiêu đề</th>
												<th>Giới thiệu</th>
												<th>Giá</th>
												<th>Thể loại</th>
												<th>Hình ảnh</th>
												<th>Chức năng</th>
											</tr>
										</thead>
										<tbody>
										@foreach($product as $pro)
											<tr>
												<td>{{$pro ->id}}</td>
												<td>{{$pro ->title}}</td>
												<td><?php echo $pro ->descr ?></td>
												<td>{{$pro ->price}}</td>
												<td>{{$pro ->Category}}</td>
												<td>{{$pro ->product_img}}</td>
												<th><a href="admin/product/editproduct/{{$pro->id}}">Sửa </a><b>|</b><a href="admin/product/deleteproduct/{{$pro->id}}"> Xóa</a></th>
											</tr>
										@endforeach	
										</tbody>
										<tbody><tr>
												<th>{!! $product->links() !!}</th>
											</tr></tbody>
									</table>
									<div class="panel-footer">
									<div class="row">
										<div class="col-md-6 text-right"><a href="admin/product/addproduct" class="btn btn-primary">Thêm mới</a></div>
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