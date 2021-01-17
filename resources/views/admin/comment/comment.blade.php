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
												<th>username</th>
												<th>Tiêu đề</th>
												<th>Nội dung</th>
												<th>Date</th>
												<th>Chức năng</th>
											</tr>
										</thead>
										<tbody>
										@foreach($comment as $com)
											<tr>
												<td>{{$com ->id}}</td>
												<td>{{$com ->usename}}</td>
												<td>{{$com ->title}}</td>					
												<td>{{$com ->content}}</td>
												<td>{{$com ->date}}</td>							<th><a href="admin/comment/deletecomment/{{$com->id}}"> Xóa</a></th>
											</tr>
										@endforeach	
										</tbody>
									</table>
									<div class="panel-footer">
									<div class="row">
										<div class="col-md-6 text-right"><a href="admin/comment/comment" class="btn btn-primary">Làm mới</a></div>
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