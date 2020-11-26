@extends('design.trangchuadmin')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Check out</li>
			</ol>
		</div><!--/.row-->
		<br>
		<dir class="row">
			<div class="panel-body" style="font-size: 12px;">
				<div class="table-responsive">
					<table class="table table-hover table-bordered">
						<thead>
							<tr>										
								<th>STT</th>	
								<th>Tên khách hàng</th>	
								<th>Tên phòng</th>						
								<th>Loại phòng</th>
								<th>Số phòng</th>
								<th>Ngày vào</th>
								<th>Ngày ra</th>
								<th>Tổng tiền</th>
								<th>Trạng thái</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							<?php $i =1; ?>
							@foreach($bill as $row)
								<tr>
									<td>{!! $i !!}</td>
									<td>{!!$row->Name_User!!}</td>
									<td>{!!$row->Name_Room!!}</td>
									<td>{!!$row->Kind_Room!!}</td>
									<td>{!!$row->NumberRoom_Bill!!}</td>
									<td>{!!$row->Datein_Bill!!}</td>
									<td>{!!$row->Dateout_Bill!!}</td>
									<td>{!!number_format($row->Total_Bill)!!} VNĐ</td>
									<td>{!!$row->Status_Bill!!}</td>
									<td>
									    <a href="{!!url('admin/suacheckout/'.$row->ID_Bill)!!}" title="Sửa"><span class="glyphicon glyphicon-edit">Sửa</span> </a>
									</td>
									<td>
									    <a href="{!!url('admin/xoacheckout/'.$row->ID_Bill)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">Xóa</span> </a>
									</td>
								</tr>
							<?php $i++ ?>
							@endforeach								
						</tbody>
					</table>
				</div>
			</div>
		</dir>
	</div>
@endsection