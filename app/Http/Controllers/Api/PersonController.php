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
class PersonController extends Controller
{
    public function post_billofme(Request $request) {
        $ID_User = $request->ID_User;

        $result = DB::table('tblbill')->join('tblroom', 'tblbill.ID_Room', '=', 'tblroom.ID_Room')->Where('ID_User',$ID_User)->Where('Status_Bill', "Chưa thanh toán")->get();

        if ($result) 
        {
            return response()->json([
                "status"=> true,
                "data" => $result,
            ]);
        }
        else
        {
            return "fail";
        }
    }
    public function post_listbillofme(Request $request) {
        $ID_User = $request->ID_User;

        $result = DB::table('tblbill')->join('tblroom', 'tblbill.ID_Room', '=', 'tblroom.ID_Room')->Where('ID_User',$ID_User)->Where('Status_Bill', "Đã thanh toán")->get();

        if ($result) 
        {
            return response()->json([
                "status"=> true,
                "data" => $result,
            ]);
        }
        else
        {
            return "fail";
        }
    }
}
