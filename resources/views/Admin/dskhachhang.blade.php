@extends('design.trangchuadmin')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách khách hàng</li>
			</ol>
		</div><!--/.row-->
		<br>
		<div class="row">
			@if(session('them'))
                <div class="alert alert-success">
                    {{session('them')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
                </div>         
            @endif
            @if(session('sua'))
                <div class="alert alert-info">
                    {{session('sua')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
                </div>         
            @endif
            @if(session('xoa'))
                <div class="alert alert-danger">
                    {{session('xoa')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
                </div>         
            @endif
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="form-group">
							<label for="inputLoai" class="col-md-12 control-label"><strong> Danh sách khách hàng</strong></label>
						</div>
					</div> 
					
				</div>
				
				<div class="panel-body" style="font-size: 12px;">
					<div class="table-responsive">
						<table class="table table-hover table-bordered">
							<thead>
								<tr>										
									<th>STT</th>
									<th>Hình ảnh</th>
									<th>Tên khách hàng</th>
									<th>Số điện thoại</th>
									<th>Giới tính</th>
									<th>Quốc tịch</th>
									<th>Xóa</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1;?>
								@foreach($data as $row)
									<tr>
                                        <td>{!!$i!!}</td>
                                        <td><img src="{!!url('hinhanh/khachhang/'.$row->Img_User)!!}" alt="user" width="50" height="40"></td>
                                        <td>{!!$row->Name_User!!}</td>
                                        <td>{!!$row->Phone_User!!}</td>
                                        <td>{!!$row->Gender_User!!}</td>
                                        <td>{!!$row->National_User!!}</td>
                                        <td>
                                            <a href="{!!url('admin/xoadskhachhang/'.$row->ID_User)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">Xóa</span> </a>
                                        </td>
                                    </tr>
								<?php $i++; ?>
								@endforeach								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection