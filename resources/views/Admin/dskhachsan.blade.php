@extends('design.trangchuadmin')
@section('content')
<!-- main content - noi dung chinh trong chu -->
    <div class="main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="admin/trangchu"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Danh sách khách sạn</li>
            </ol>
        </div><!--/.row-->
        <br>


        <div class="row">
            <div class="col-lg-12">
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
                                <label for="inputLoai" class="col-md-6 control-label"><strong>Danh sách khách sạn</strong></label>
                                <div class="col-md-3">
                                    <select name="sltCate" id="inputLoai" class="form-control">
                                        <option value="0">-- Khu vực --</option>
                                        <option value="{!!url('admin/dskhachsan/1')!!}">Miền Bắc </option>
                                        <option value="{!!url('admin/dskhachsan/2')!!}">Miền Trung </option>
                                        <option value="{!!url('admin/dskhachsan/3')!!}">Miền Nam </option>
                                    </select>
                                    <script>
                                        document.getElementById("inputLoai").onchange = function() {
                                            if (this.selectedIndex!=0) {
                                                window.location.href = this.value;
                                            }      
                                        };
                                    </script>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-2">
                                    <a href="{!!url('admin/themdskhachsan')!!}" title=""><button type="button" class="btn btn-primary pull-right">Thêm khách sạn mới</button></a>
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
                                        <th>Tên khách sạn</th>           
                                        <th>Khu vực</th>
                                        <th>Địa chỉ</th>
                                        <th>Chất lượng</th>
                                        <th>Thông tin</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;?>
                                    @foreach ($dskhachsan as $row)
                                        <tr>
                                            <td>{!!$i!!}</td>
                                            <td><img src="{!!url('hinhanh/khachsan/'.$row->Img_Hotel)!!}" alt="hotel" width="50" height="40"></td>
                                            <td>{!!$row->Name_Hotel!!}</td>
                                            <td>{!!$row->Name_Area!!}</td>
                                            <td>{!!$row->Address_Hotel!!}</td>
                                            <td>{!!$row->Level_Hotel!!}</td>
                                            <td>{!!$row->Information_Hotel!!}</td>
                                            <td>
                                                <a href="{!!url('admin/suadskhachsan/'.$row->ID_Hotel)!!}" title="Sửa"><span class="glyphicon glyphicon-edit">Sửa</span> </a>
                                            </td>
                                            <td>
                                                <a href="{!!url('admin/xoadskhachsan/'.$row->ID_Hotel)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"><span class="glyphicon glyphicon-remove">Xóa</span> </a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach                             
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->      
    </div>  <!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection