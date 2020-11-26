<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $date = getdate();
        $thang = $date['mon']-1;
        if ($thang=0) {
        	$thang = 12;
        	$nam = $date['year']-1;
        } else {
        	$thang = $date['mon']-1;
        	$nam = $date['year'];
        }
        $dauthang = "".$nam.'/'.$thang."/1";
        $cuoithang = "".$nam.'/'.$thang."/31";
        
        // số lượng hóa đơn mới
        $hdm = DB::table('tblbill')->whereBetween('created_at', [$dauthang, $cuoithang])->count();

        //số phòng cho thuê mới
        $spct = 0;
        $temp = DB::table('tblbill')->whereBetween('created_at', [$dauthang, $cuoithang])->get();
        foreach ($temp as $row)
        {
            $spct += $row->NumberRoom_Bill;
        }
        //khách hàng mới
        $khm = DB::table('tbluser')->whereBetween('created_at', [$dauthang,$cuoithang])->count();
        //số phòng đăng ký mới
        $pmdk = DB::table('tblroom')->whereBetween('created_at', [$dauthang, $cuoithang])->count();

        return view('Admin.trangchu')->with([
            'hdm'   => $hdm,
            'spct'   => $spct,
            'khm'   => $khm,
            'pmdk'   => $pmdk,
        ]);
    }
    
}
