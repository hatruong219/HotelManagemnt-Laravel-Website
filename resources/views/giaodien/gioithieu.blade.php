<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <hr style="border: 1px solid gray">
  <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 no-padding">
    <div class="row gioithieu">            
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <ul>
          <li class="list-group-item" style="border: 1px solid black;">
            <form action="{{ url('/user/searchgia') }}" method="post">
              {!! csrf_field() !!}
               <label>Chọn khoảng giá: </label>
               <div class="form-group">
                  <input style="border: 1px solid black;" id="my-input" class="form-control" type="text" name="giadau" >
               </div>
               <div class="form-group">
                  <input style="border: 1px solid black;" id="my-input" class="form-control" type="text" name="giacuoi">
               </div>
               <button class="btn btn-primary" name="ok">Tìm kiếm</button>
            </form>
          </li>
        </ul>
      </div>
      <div class="col-xs-0 col-sm-2 col-md-2 col-lg-2"></div>
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <a href="" title=""><strong>HỆ THỐNG CỬA HÀNG</strong></a>                
          <li> <a href="#" title="">Kiểm tra hàng chính hãng</a></li> 
          <li> <a href="#" title="">Máy đổi trả</a></li> 
          <li> <a href="#" title="">Hệ thống cửa hàng</a></li> 
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <p>Hỗ trợ thanh toán  <img src="{!!url('public/images/pay.png')!!}" alt=""> </p>
    <div class="gt-left pull-left">
      <p><small>Tư vẫn miễn phí (24/7)</small></p> 
      <strong>1800 xxxx</strong>
    </div>
     <div class="gt-right pull-right">
      <p><small>Góp ý, phản ánh(8h00 - 22h00)</small></p>
      <strong>1800 xxxx</strong>
    </div>
  </div>
</div>