@extends('design.trangchuadmin')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="trangchu"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Phòng</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><small>Sửa thông tin phòng:</small></h1>
			</div>
		</div><!--/.row-->		
		<div class="row">

			<div class="col-lg-12">
				<div class="panel panel-default">					
					<div class="panel-body" style="background-color: #ecf0f1; color:#27ae60;">
						@foreach($room as $row)
						<form action="{!!url('admin/suadsphong/'.$row->ID_Room)!!}" method="POST" role="form">
				      		{{ csrf_field() }}
							<div class="form-group">
				      			<label for="input-id">Khách sạn</label>
				      			<select name="ID_Hotel" class="form-control">
				      				<option value="{!!$row->ID_Hotel!!}">{!!$row->Name_Hotel!!}</option>
				      	@endforeach
					      			@foreach($hotel as $row)
					      				<option value="{!!$row->ID_Hotel!!}">{!!$row->Name_Hotel!!} </option>
					      			@endforeach
					      		</select>
				      		</div>
				      		@foreach($room as $row)
				      		<div class="form-group row">

				      			<div class="col-md-6">
				      				<label for="input-id">Tên phòng</label>
				      				<input type="text" name="Name_Room" class="form-control" value="{!!$row->Name_Room!!}">
				      			</div>
				      			<div class="col-md-6">
				      				<label for="input-id">Giá phòng / Đêm (VNĐ)</label>
				      				<input type="number" name="Price_Room" class="form-control" value="{!!$row->Price_Room!!}">
				      			</div>

				      		</div>
				      		<div class="form-group">
				      			<label for="input-id"> Ảnh cũ </label>
				      			<div>
				      				<img alt="lalaa" src="{!!url('hinhanh/phong/'.$row->Img_Room)!!}" width="80" height="60">
				      			</div>
				      		</div>
				      		<div class="form-group row">
				      			<div class="col-md-4">
				      				<label for="input-id">Ảnh mới</label>
				      				<input type="file" name="Img_Room" class="form-control">
				      			</div>
				      			<div class="col-md-4">
				      				<label for="input-id">Loại phòng</label>
				      				<input type="text" name="Kind_Room" class="form-control" value="{!!$row->Kind_Room!!}" required="">
				      			</div>
				      			<div class="col-md-4">
				      				<label for="input-id">Số phòng trống</label>
				      				<input type="number" name="Empty_Room" value="{!!$row->Empty_Room!!}" class="form-control">
				      			</div>
				      		</div>
				      		<div class="form-group">
				      			<div class="row">					      			
					      			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					      				<label for="input-id">Mô tả phòng</label>
					      				<textarea name="Des_Room" id="inputtxtReview" class="form-control" rows="4"  > {!!$row->Des_Room!!}</textarea>
					      				<script type="text/javascript">
											var editor = CKEDITOR.replace('Des_Room',{
												language:'vi',
												filebrowserImageBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Images',
												filebrowserFlashBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Flash',
												filebrowserImageUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
												filebrowserFlashUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
											});
										</script>
					      			</div>
					      		</div>				      			
				      		</div>	
				      		@endforeach	
				      		<input type="submit" name="sua" class="btn btn-primary" value="Sửa" class="button" />
				      	</form>		      	
					</div>
				</div>
			</div>
		</div><!--/.row-->		
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection