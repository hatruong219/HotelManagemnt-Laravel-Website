@extends('design.trangchuadmin')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Lịch Sử Giao Dịch
					
						      			
				</li>
			</ol>
		</div><!--/.row-->
		<br>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-10">
				<form class="form" method="POST" action="{{ url('admin\tkloinhuan') }}">
					{{ csrf_field() }}
				&nbsp;&nbsp;Từ ngày&nbsp;&nbsp;<input style="width: 175px;height: 30px;"  type="date" name="ngaydau" >
				&nbsp;&nbsp;&nbsp;Đến ngày&nbsp;&nbsp;<input style="width: 175px;height: 30px;"  type="date" name="ngaycuoi" >
				<input style="text-align: center;" type="submit" name="thongke" value="Thống kê">
				</form>
			</div>
		</div>
		<dir class="row">
			<div class="panel-body" style="font-size: 11.7px;">
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
									    <a href="{!!url('admin/suabill/'.$row->ID_Bill)!!}" title="Sửa"><span class="glyphicon glyphicon-edit">Sửa</span> </a>
									</td>
								</tr>
							<?php $i++ ?>
							@endforeach								
						</tbody>
					</table>
				</div>
			</div>
		</dir>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-5">
				<span style="color: red;">Tổng Doanh Thu: </span><input style="width: 150px;height: 30px;"  type="text" value=" {{number_format($doanhthu)}} VNĐ" readonly="">
			</div>
			<div class="col-md-3"></div>
		</div>

	</div>
@endsection