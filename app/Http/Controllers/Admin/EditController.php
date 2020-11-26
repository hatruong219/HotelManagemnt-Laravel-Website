<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use App\tblArea;
use App\tblRoom;
use App\tblHotel;
use App\tblUser;
use App\tblBill;

class EditController extends Controller
{

// edit khách sạn
    public function getthemdskhachsan()
    {
    	$data = DB::table('tblarea')->get();
        return view('Update.admin_themkhachsan')->with([
        	'data' => $data
        ]);
    }


    public function postthemdskhachsan(Request $rq)
    {
    	$newhotel = new tblHotel();

    	$newhotel->Name_Hotel = $rq->Name_Hotel;
    	$newhotel->Address_Hotel = $rq->Address_Hotel;
    	$newhotel->Level_Hotel = $rq->Level_Hotel;
    	$newhotel->Img_Hotel = $rq->Img_Hotel;
    	$newhotel->ID_Area = $rq->ID_Area;
    	$newhotel->Information_Hotel = $rq->Information_Hotel;
        $newhotel->LowPrice_Hotel = 0;
    	$newhotel->save();

	return redirect('admin/dskhachsan')->with('them','Thêm mới một khách sạn thành công !');

    }

    public function xoadskhachsan($ID_Hotel)
    {
    	$newhotel = tblHotel::find($ID_Hotel);
        $newhotel->delete();
        return redirect('admin/dskhachsan')->with('xoa','Xóa một khách sạn thành công!');
    }
    public function getsuadskhachsan($ID_Hotel)
    {
    	$data = DB::table('tblhotel')->join('tblarea', 'tblhotel.ID_Area', '=', 'tblarea.ID_Area')->where('tblhotel.ID_Hotel', $ID_Hotel)->get();
    	$area = DB::table('tblarea')->get();
        return view('Update.admin_suakhachsan')->with([
            'hotel'   => $data ,
            'area'         => $area
        ]);
    }
     public function postsuadskhachsan($ID_Hotel,Request $rq)
    {
        $file = $rq->Img_Hotel;
    	$updatehotel = tblHotel::find($ID_Hotel);
    	$updatehotel->Name_Hotel = $rq->Name_Hotel;

        if ($file!=null) {
            $updatehotel->Img_Hotel = $file;
        }

    	$updatehotel->Address_Hotel = $rq->Address_Hotel;
    	$updatehotel->Level_Hotel = $rq->Level_Hotel;
    	$updatehotel->Information_Hotel = $rq->Information_Hotel;
    	$updatehotel->ID_Area = $rq->ID_Area;
    	$updatehotel->save();

	return redirect('admin/dskhachsan')->with('sua','Sửa một khách sạn thành công !');

    }

// edit phòng

    public function getthemdsphong()
    {
    	$data = DB::table('tblhotel')->get();
        return view('Update.admin_themphong')->with([
        	'data' => $data
        ]);
    }


    public function postthemdsphong(Request $rq)
    {
        
    	$newroom = new tblRoom();
    	$newroom->Name_Room = $rq->Name_Room;
    	$newroom->Empty_Room = $rq->Empty_Room;
    	$newroom->Kind_Room = $rq->Kind_Room;
    	$newroom->Price_Room = $rq->Price_Room;
    	$newroom->Img_Room = $rq->Img_Room;
    	$newroom->ID_Hotel = $rq->ID_Hotel;
    	$newroom->Des_Room = $rq->Des_Room;
    	$newroom->Star_Room = 0;
    	$newroom->Status_Room = "";
    	$newroom->save();

        $tempsql =DB::table('tblroom')->Where('ID_Hotel', $rq->ID_Hotel)->orderBy('Price_Room', 'asc')->take('1')->get();
        foreach ($tempsql as $value) {
            $updatehotel = tblHotel::find($rq->ID_Hotel);
            $updatehotel->LowPrice_Hotel = $value->Price_Room;
            $updatehotel->save();
        }

	return redirect('admin/dsphong')->with('them','Thêm mới một phòng thành công !');

    }

    public function xoadsphong($ID_Room)
    {
        $nosql = DB::table('tblroom')->Where('ID_Room','kocogiatri111')->get();
        $ID_Hotel = 0;
        $tempsql =DB::table('tblroom')->Where('ID_Room',$ID_Room)->get();
        foreach ($tempsql as $value) {
            $ID_Hotel = $value->ID_Hotel;
        }


    	$newroom = tblRoom::find($ID_Room);
        $newroom->delete();

        $tempsql =DB::table('tblroom')->Where('ID_Hotel', $ID_Hotel)->orderBy('Price_Room', 'asc')->take('1')->get();
        if ($tempsql == $nosql) {
            $updatehotel = tblHotel::find($ID_Hotel);
            $updatehotel->LowPrice_Hotel = 0;
            $updatehotel->save();
        } else {
            foreach ($tempsql as $value) {
                $updatehotel = tblHotel::find($ID_Hotel);
                $updatehotel->LowPrice_Hotel = $value->Price_Room;
                $updatehotel->save();
            }
        }
        
        return redirect('admin/dsphong')->with('xoa','Xóa một phòng thành công!');
    }
    public function getsuadsphong($ID_Room)
    {
    	$data = DB::table('tblroom')->join('tblhotel', 'tblhotel.ID_Hotel', '=', 'tblroom.ID_Hotel')->where('tblroom.ID_Room', $ID_Room)->get();
    	$hotel = DB::table('tblhotel')->get();
        return view('Update.admin_suaphong')->with([
            'room'   => $data ,
            'hotel'  => $hotel
        ]);
    }
     public function postsuadsphong($ID_Room,Request $rq)
    {
        //lấy giá trị ID_Hotel trước khi sửa
        $ID_Hoteltemp = 0;
        $tempsqltemp =DB::table('tblroom')->Where('ID_Room',$ID_Room)->get();
        foreach ($tempsqltemp as $value) {
            $ID_Hoteltemp = $value->ID_Hotel;
        }
        // cập nhật về 0
        $updatehotel = tblHotel::find($ID_Hoteltemp);
        $updatehotel->LowPrice_Hotel = 0;
        $updatehotel->save();

        $file = $rq->Img_Room;
    	$updateroom = tblRoom::find($ID_Room);
    	$updateroom->Name_Room = $rq->Name_Room;

        if ($file!=null) {
            $updateroom->Img_Room = $file;
        }

    	$updateroom->Price_Room = $rq->Price_Room;
    	$updateroom->Empty_Room = $rq->Empty_Room;
    	$updateroom->Kind_Room = $rq->Kind_Room;
    	$updateroom->Des_Room = $rq->Des_Room;
    	$updateroom->ID_Hotel = $rq->ID_Hotel;
    	$updateroom->save();

        //cập nhật khách sạn mới
        $tempsql =DB::table('tblroom')->Where('ID_Hotel', $rq->ID_Hotel)->orderBy('Price_Room', 'asc')->take('1')->get();
        foreach ($tempsql as $value) {
            $updatehotel = tblHotel::find($rq->ID_Hotel);
            $updatehotel->LowPrice_Hotel = $value->Price_Room;
            $updatehotel->save();
        }

        //cập nhật khách sạn cũ
        $tempsql =DB::table('tblroom')->Where('ID_Hotel', $ID_Hoteltemp)->orderBy('Price_Room', 'asc')->take('1')->get();
        foreach ($tempsql as $value) {
            $updatehotel = tblHotel::find($ID_Hoteltemp);
            $updatehotel->LowPrice_Hotel = $value->Price_Room;
            $updatehotel->save();
        }

	return redirect('admin/dsphong')->with('sua','Sửa một phòng thành công !');

    }

// edit khach hang

	public function xoadskhachhang($ID_User)
    {
    	$newuser = tblUser::find($ID_User);
        $newuser->delete();
        return redirect('admin/dskhachhang')->with('xoa','Xóa một khách hàng thành công!');
    }
// edit check out

    public function xoacheckout($ID_Bill)
    {
    	$newuser = tblBill::find($ID_Bill);
        $newuser->delete();
        return redirect('admin/checkout')->with('xoa','Xóa một hóa đơn thành công!');
    }
    public function getsuacheckout($ID_Bill)
    {
    	$data = DB::table('tblbill')->where('ID_Bill', $ID_Bill)->get();
        return view('Update.admin_suabill')->with([
            'data' => $data ,
        ]);
    }
     public function postsuacheckout($ID_Bill,Request $rq)
    {
    	$updatebill = tblBill::find($ID_Bill);
    	$updatebill->Status_Bill = $rq->Status_Bill;
    	$updatebill->save();

	return redirect('admin/checkout')->with('sua','Sửa một hóa đơn thành công !');

    }

// edit bill
    public function getsuabill($ID_Bill)
    {
    	$data = DB::table('tblbill')->where('ID_Bill', $ID_Bill)->get();
        return view('Update.admin_suabill')->with([
            'data' => $data ,
        ]);
    }
     public function postsuabill($ID_Bill,Request $rq)
    {
    	$updatebill = tblBill::find($ID_Bill);
    	$updatebill->Status_Bill = $rq->Status_Bill;
    	$updatebill->save();

	return redirect('admin/tkloinhuan')->with('sua','Sửa một hóa đơn thành công !');

    }
}
