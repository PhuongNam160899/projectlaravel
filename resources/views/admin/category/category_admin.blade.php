@extends('admin.layout.index')
@section('content')
<div class="main-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
			<!-- RECENT PURCHASES -->
				<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Thể loại</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<form action="admin/category/addcategory" method="POST" enctype="multipart/form-data">
									<input type="hidden" name="_token" value="{{csrf_token()}}" />
								<div class="panel-body no-padding">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Tên thể loại</th>
												<th>Ảnh</th>
												<th>Chức năng</th>
											</tr>
										</thead>
										
										<tbody>
											<tr>
												<td><input type="text" class="input-admin" name="category" placeholder="Nhập tên thể loại"></td>
												<td><input type="file" name="category_img" placeholder="Nhập tên ảnh"></td>
												<td><button type="submit" class="btn btn-primary">Thêm</button></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="panel-footer">
									<div class="row">
										@if(count($errors)>0)
										@foreach($errors ->all() as $err)
										<div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> {{$err}}</span></div>
										@endforeach
										@endif
										<div class="col-md-6 text-right">
											</div>
									</div>
								</div>
								</form>
				</div>
				<!-- END RECENT PURCHASES -->
			</div>
			<div class="col-md-6">
			<!-- RECENT PURCHASES -->
				<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Thể loại</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>id</th>
												<th>Tên thể loại</th>
												<th>Ảnh</th>
												<th>Status</th>
												<th>Status</th>
											</tr>
										</thead>
										@foreach($category as $tl)
										<form action="admin/category/savecategory/{{$tl->id}}" method="POST" enctype="multipart/form-data">
										<input type="hidden" name="_token" value="{{csrf_token()}}" />
										<tbody>
											<tr>
												<td><a href="">{{$tl ->id}}</a></td>
												<td><input type="text" name="category" value="{{$tl ->Category}}"></td>
												<td><img src="image/{{$tl ->Category_img}}" class="category_img-admin"><input type="file" name="category_img" ></td>
												<td><button type="submit" class="label label-success" >Lưu</button></td>
												<td><a href="admin/category/deletecategory/{{$tl->id}}">Xóa</a></td>
											</tr>
										</tbody>
									</form>
										@endforeach
									</table>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24 hours</span></div>
										<div class="col-md-6 text-right"><a href="admin/category/showcategory" class="btn btn-primary">Làm mới</a></div>
									</div>
								</div>
				</div>
				<!-- END RECENT PURCHASES -->
			</div>			
		</div>
	</div>
</div>
@endsection