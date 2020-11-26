@extends('design.trangchuadmin')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách phòng</li>
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
							<label for="inputLoai" class="col-md-6 control-label"><strong> Danh sách phòng</strong></label>
							<div class="col-md-3">
								<select name="sltCate" id="inputLoai" class="form-control">
					      			<option value="0">-- Khách sạn --</option>
					      			@foreach($khachsan as $row)
					      				<option value="dsphong/{!!$row->ID_Hotel!!}">{!!$row->Name_Hotel!!} </option>
					      			@endforeach
					      		</select>
								<script>
								    document.getElementById("inputLoai").onchange = function() {
								        if (this.selectedIndex!=0) {
								        	$s1 = "{!!url('admin/";
											$s2 = this.value;
											$s3 = "')!!}";
											$ss = $s1+$s2+$s3;
								            window.location.href =$ss;
								        }      
								    };
								</script>
							</div>
							<div class="col-md-1"></div>
							<div class="col-md-2">
								<a href="{!!url('admin/themdsphong')!!}" title=""><button type="button" class="btn btn-primary pull-right">Thêm phòng mới</button></a>
							</div>
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
									<th>Tên phòng</th>
									<th>Tên khách sạn</th>
									<th>Loại phòng</th>
									<th>Số phòng trống</th>
									<th>Giá</th>
									<th>Đánh giá</th>
									<th>Mô tả</th>
									<th>Tình trạng phòng</th>
									<th>Sửa</th>
									<th>Xóa</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1;?>
								@foreach($data as $row)
									<tr>
                                        <td>{!!$i!!}</td>
                                        <td><img src="{!!url('hinhanh/phong/'.$row->Img_Room)!!}" alt="room" width="50" height="40"></td>
                                        <td>{!!$row->Name_Room!!}</td>
                                        <td>{!!$row->Name_Hotel!!}</td>
                                        <td>{!!$row->Kind_Room!!}</td>
                                        <td>{!!$row->Empty_Room!!}</td>
                                        <td>{!!$row->Price_Room!!}</td>
                                        <td>{!!$row->Star_Room!!} sao</td>
                                        <td>{!!$row->Des_Room!!}</td>
                                        <td>{!!$row->Status_Room!!}</td>
                                        <td>
                                            <a href="{!!url('admin/suadsphong/'.$row->ID_Room)!!}" title="Sửa"><span class="glyphicon glyphicon-edit">Sửa</span> </a>
                                        </td>
                                        <td>
                                            <a href="{!!url('admin/xoadsphong/'.$row->ID_Room)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">Xóa</span> </a>
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