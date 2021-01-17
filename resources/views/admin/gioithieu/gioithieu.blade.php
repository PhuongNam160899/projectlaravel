@extends('admin.layout.index')
@section('content')
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Thêm mới </h3>
					<div class="row">
						<div class="col-md-6">
							<!-- BASIC TABLE -->
							<div class="panel">
								@if(session('tb'))
								<div class="panel-heading">
									<h3 class="panel-title">{{session('tb')}}</h3>
								</div>
								@endif
								<div class="panel-body">
									@foreach($gioithieu as $gt)
									<form action="admin/gioithieu/savegioithieu/{{$gt->id}}" method="POST" enctype="multipart/form-data">
									<input type="hidden" name="_token" value="{{csrf_token()}}" />
									<table class="table">
										<thead>
											<tr>
												<th>
													<label class="pro-ad">Tiêu đề :</label>
													<input type="text" name="title" placeholder="Nhập tiêu đề" class="input-product-ad" required="" value="{{$gt->title}}"></th>
											</tr>
											<tr>
												<th>
													<label class="pro-ad">Giới thiệu</label>
													<textarea id="demo" name="desr" class="ckeditor">{{$gt->noidung}}</textarea></th>
											</tr>
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