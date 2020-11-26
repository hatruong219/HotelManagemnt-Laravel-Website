@extends('design.trangchuadmin')
@section('content')
<!-- main content - noi dung chinh trong chu -->
	<div class="main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="trangchu"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Khách sạn</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><small>Sửa thông tin khách sạn:</small></h1>
			</div>
		</div><!--/.row-->		
		<div class="row">

			<div class="col-lg-12">
				<div class="panel panel-default">					
					<div class="panel-body" style="background-color: #ecf0f1; color:#27ae60;">
						@foreach($hotel as $row)
						<form action="{!!url('admin/suadskhachsan/'.$row->ID_Hotel)!!}" method="POST" role="form">
				      		{{ csrf_field() }}
							<div class="form-group">
				      			<label for="input-id">Thương Hiệu</label>
				      			<select name="ID_Area" class="form-control">
				      				<option value="{!!$row->ID_Area!!}">{!!$row->Name_Area!!}</option>
				      	@endforeach
					      			@foreach($area as $row)
					      				<option value="{!!$row->ID_Area!!}">{!!$row->Name_Area!!} </option>
					      			@endforeach
					      		</select>
				      		</div>
				      		@foreach($hotel as $row)
				      		<div class="form-group">
				      			<label for="input-id">Tên khách sạn</label>
				      			<input type="text" name="Name_Hotel" class="form-control" value="{!!$row->Name_Hotel!!}">
				      		</div>
				      		<div class="form-group">
				      			<label for="input-id"> Ảnh cũ </label>
				      			<div>
				      				<img alt="lalaa" src="{!!url('hinhanh/khachsan/'.$row->Img_Hotel)!!}" width="80" height="60">
				      			</div>
				      		</div>
				      		<div class="form-group row">
				      			<div class="col-md-4">
				      				<label for="input-id">Ảnh mới</label>
				      				<input type="file" name="Img_Hotel" class="form-control">
				      			</div>
				      			<div class="col-md-4">
				      				<label for="input-id">Địa chỉ</label>
				      				<input type="text" name="Address_Hotel" class="form-control" value="{!!$row->Address_Hotel!!}" required="">
				      			</div>
				      			<div class="col-md-4">
				      				<label for="input-id">Chất lượng</label>
				      				<input type="number" name="Level_Hotel" value="{!!$row->Level_Hotel!!}" class="form-control">
				      			</div>
				      		</div>
				      		<div class="form-group">
				      			<div class="row">					      			
					      			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					      				<label for="input-id">Thông tin khách sạn</label>
					      				<textarea name="Information_Hotel" id="inputtxtReview" class="form-control" rows="4"  > {!!$row->Information_Hotel!!}</textarea>
					      				<script type="text/javascript">
											var editor = CKEDITOR.replace('Information_Hotel',{
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