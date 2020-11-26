<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tblArea;
use App\tblRoom;
use App\tblHotel;
use App\tblUser;
use App\tblBill;
use DB;
class BillController extends Controller
{
	public function post_booking(Request $request) {
    	$ID_Room = $request->ID_Room;
        $data = DB::table('tblroom')->join('tblhotel', 'tblroom.ID_Hotel', '=', 'tblhotel.ID_Hotel')->Where('ID_Room',$ID_Room)->get();
        return response()->json([
            "data"=> $data,
        ]);
    }


    public function post_addbill(Request $request)
    {  
        $ID_Room = $request->ID_Room;
        $ID_User = $request->ID_User;
        $Dateintemp = $request->Datein_Bill;
        $Datein = $request->Dateout_Bill;
        $NumberRoom_Bill = $request->NumberRoom_Bill;
        $Price = 0;
            $room1 = DB::table('tblroom')->WHERE('ID_Room', '=', $ID_Room)->get();
            foreach ($room1 as $row)
            {
                $Price = $row->Price_Room;

            }
        $Status_Bill = "Chưa thanh toán";
        $Total_Bill = $NumberRoom_Bill*$Price*$Datein;
        $date=date_create($Dateintemp);
		$Datein_Bill = date_format($date,"Y-m-d");
		$Dateout_Bill = date("Y-m-d", strtotime("$Datein_Bill + $Datein day"));
        $Bill = new tblBill();
        $Bill->Datein_Bill = $Datein_Bill;
        $Bill->Dateout_Bill = $Dateout_Bill;
        $Bill->NumberRoom_Bill = $NumberRoom_Bill;
        $Bill->Status_Bill = $Status_Bill;
        $Bill->Total_Bill = $Total_Bill;
        $Bill->ID_Room = $ID_Room; 
        $Bill->ID_User = $ID_User; 
        $Bill->save();
        return response()->json([
            "status"=> true,
        ]);
        }


}
