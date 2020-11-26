@include('giaodien.header')
@include('giaodien.menutop')
    <div class="container">     
        <div class="row">  
        <div class="col-md-3">
        	@include('giaodien.menuleftadmin')
        </div> 
        <div class="col-md-9">
        	@yield('content')
        </div>
	    	@include('giaodien.gioithieu')
        </div>       <!-- /row -->
    </div> <!-- /container -->
@include('giaodien.nguoithietke')