@extends('design.trangchuadmin')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="trangchu"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Hóa đơn</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><small>Cập nhật trạng thái:</small></h1>
			</div>
		</div><!--/.row-->		
		<div class="row">

			<div class="col-lg-12">
				<div class="panel panel-default">					
					<div class="panel-body" style="background-color: #ecf0f1; color:#27ae60;">
						@foreach($data as $row)
						<form action="{!!url('admin/suacheckout/'.$row->ID_Bill)!!}" method="POST" role="form">
				      		{{ csrf_field() }}
							<div class="form-group">
				      			<label for="input-id">Khách sạn</label>
				      			<select name="Status_Bill" class="form-control">
				      				<option value="{!!$row->Status_Bill!!}">{!!$row->Status_Bill!!}</option>
				      		@endforeach
					      			<option value="Chưa thanh toán">Chưa thanh toán</option>
					      			<option value="Đã thanh toán">Đã thanh toán</option>
					      		</select>
				      		</div>
				      		<input type="submit" name="sua" class="btn btn-primary" value="Sửa" class="button" />
				      	</form>		      	
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection