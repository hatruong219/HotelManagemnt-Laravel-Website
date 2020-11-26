<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class ManageController extends Controller
{
    public function dskhachsan()
    {
        $data = DB::table('tblhotel')->join('tblarea', 'tblhotel.ID_Area', '=', 'tblarea.ID_Area')->get();
        return view('Admin.dskhachsan')->with([
            'dskhachsan'   => $data
        ]);
    }

    public function dsphong()
    {
    	$data = DB::table('tblroom')->join('tblhotel', 'tblhotel.ID_Hotel', '=', 'tblroom.ID_Hotel')->get();
        $khachsan = DB::table('tblhotel')->get();
        return view('Admin.dsphong')->with([
            'data' => $data,
            'khachsan'=>$khachsan
        ]);
    }
    public function dskhachhang()
    {
        $data = DB::table('tbluser')->get();
        return view('Admin.dskhachhang')->with([
            'data'=>$data
        ]);
    }


    public function dskhachsan_khuvuc($ID_Area)
    {
    	$data = DB::table('tblhotel')->join('tblarea', 'tblhotel.ID_Area', '=', 'tblarea.ID_Area')->where('tblhotel.ID_Area', $ID_Area)->get();
        return view('Admin.dskhachsan')->with([
            'dskhachsan'   => $data
        ]);
    }

    public function dsphong_khachsan($ID_Hotel)
    {
    	$data = DB::table('tblroom')->join('tblhotel', 'tblhotel.ID_Hotel', '=', 'tblroom.ID_Hotel')->where('tblroom.ID_Hotel', $ID_Hotel)->get();
        $khachsan = DB::table('tblhotel')->get();
        return view('Admin.dsphong')->with([
            'data' => $data,
            'khachsan'=>$khachsan
        ]);
    }

    public function getloinhuan()
    {
    	$data = DB::table('tblbill')->join('tbluser', 'tblbill.ID_User', '=', 'tbluser.ID_User')->join('tblroom', 'tblbill.ID_Room', '=', 'tblroom.ID_Room')->Where('tblbill.Status_Bill', "Đã thanh toán")->get();
    	$doanhthu=0;
        foreach ($data as $value) {
            $doanhthu += $value->Total_Bill;
        }
    	return view('Admin.tkloinhuan',['bill'=>$data,'doanhthu'=>$doanhthu]);
    }
    public function postloinhuan(Request $rq)
    {
    	$ngaydau = $rq->ngaydau;
    	$ngaycuoi = $rq->ngaycuoi;
        $data = DB::table('tblbill')->join('tbluser', 'tblbill.ID_User', '=', 'tbluser.ID_User')->join('tblroom', 'tblbill.ID_Room', '=', 'tblroom.ID_Room')->whereBetween('tblbill.Dateout_Bill', [$ngaydau, $ngaycuoi])->Where('tblbill.Status_Bill', "Đã thanh toán")->get();
    	$doanhthu=0;
        foreach ($data as $value) { 
            $doanhthu += $value->Total_Bill;
        }
    	return view('Admin.tkloinhuan',['bill'=>$data,'doanhthu'=>$doanhthu]);
    }

    public function checkout()
    {
    	$data = DB::table('tblbill')->join('tbluser', 'tblbill.ID_User', '=', 'tbluser.ID_User')->join('tblroom', 'tblbill.ID_Room', '=', 'tblroom.ID_Room')->Where('tblbill.Status_Bill', "Chưa thanh toán")->get();
    	return view('Admin.checkout',['bill'=>$data]);
    }


}

