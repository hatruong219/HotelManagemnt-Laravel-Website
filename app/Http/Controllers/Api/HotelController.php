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

class HotelController extends Controller
{
    public function post_des_hotel(Request $request)
    {
    	$ID_Hotel = $request->ID_Hotel;
        $data = DB::table('tblHotel')->Where('ID_Hotel', $ID_Hotel)->get();
        return response()->json([
            "data"=> $data,
        ]);
    	
        
    }
}
