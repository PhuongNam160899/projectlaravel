@extends('admin.layout.index')
@section('content')
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Thêm mới </h3>
					<div class="row">
						<div class="col-md-6">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Basic Table</h3>
								</div>
								<div class="panel-body">
									@foreach($product as $pro)
									<form action="admin/product/saveproduct/{{$pro->id}}" method="POST" enctype="multipart/form-data">
									<input type="hidden" name="_token" value="{{csrf_token()}}" />
									<table class="table">
										<thead>
											<tr>
												<th>
													<label class="pro-ad">Tiêu đề :</label>
													<input type="text" name="title" placeholder="Nhập tiêu đề" class="input-product-ad" required="" value="{{$pro->title}}"></th>
											</tr>
											<tr>
												<th>
													<label class="pro-ad">Giới thiệu</label>
													<textarea id="demo" name="desr" class="ckeditor">{{$pro->descr}}</textarea></th>
											</tr>
											<tr>
												<th><label class="pro-ad">Nhập giá :</label><input type="number" name="price" placeholder="Nhập giá" class="input-product-ad-price" required="" value="{{$pro->price}}"></th>
											</tr>
											<tr>
												<th>
													<label class="pro-ad">Thể loại :</label>
													<select class="input-product-ad-price" name="category">
														<option>{{$pro->Category}}</option>
														@foreach($category as $tl)
														<option>{{$tl->Category}}</option>
														@endforeach
													</select>
												</th>
											</tr>
											<tr>
												<th><label class="pro-ad">Chọn ảnh :</label><input type="file" name="product_img" placeholder="Nhập tên ảnh" ></th>
											</tr>
										</thead>
										<tbody>
										
										</tbody>
									</table>
									<div class="panel-footer">
									<div class="row">
										<div class="col-md-6 text-right"><button type="submit" class="btn btn-primary">Lưu</button></div>
									</div>
								</div>
								@endforeach
							</form>
								</div>
							</div>

							<!-- END BASIC TABLE -->
						</div>
							<!-- END CONDENSED TABLE -->
						</div>
					</div>
				</div>
@endsection