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

class HomeController extends Controller
{
    public function postLogin(Request $request) {
        // lay giu lieu tu form
        $Phone_User = $request->Phone;
        $Pass_User = $request->Pass;

        $result = DB::table('tbluser')
        ->where('Phone_User', $Phone_User)
        ->where('Pass_User', $Pass_User)
        ->first();

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
    public function postRegister(Request $rq) {
        $Img_User ='3.jpg';
        $National_User = 'Việt Nam';
        $khachhang = new tblUser;
        $khachhang->Name_User = $rq->Name;
        $khachhang->Phone_User = $rq->Phone;
        $khachhang->Gender_User = $rq->Gender;
        $khachhang->National_User = $National_User;
        $khachhang->Img_User = $Img_User;
        $khachhang->Pass_User = $rq->Pass;
        $khachhang->Status_User = "Null";
        $khachhang->save();
        return response()->json([
            "status"=> true,

        ]);

    }



    public function get_home_hotel_north()
    {
    	$data = DB::table('tblhotel')->join('tblarea', 'tblhotel.ID_Area', '=', 'tblarea.ID_Area')->Where('tblarea.ID_Area','1')->orderBy('Level_Hotel', 'desc')->LIMIT('8')->get();
        return $data;
    }
    public function get_home_hotel_central()
    {
    	$data = DB::table('tblhotel')->join('tblarea', 'tblhotel.ID_Area', '=', 'tblarea.ID_Area')->Where('tblarea.ID_Area','2')->orderBy('Level_Hotel', 'desc')->LIMIT('8')->get();
        return $data;
    }
    public function get_home_hotel_south()
    {
    	$data = DB::table('tblhotel')->join('tblarea', 'tblhotel.ID_Area', '=', 'tblarea.ID_Area')->Where('tblarea.ID_Area','3')->orderBy('Level_Hotel', 'desc')->LIMIT('8')->get();
        return $data;
    }

    public function post_home_all_hotel_north(Request $request)
    {
    	$ID_Area = $request->ID_Area;
        $data = DB::table('tblhotel')->join('tblarea', 'tblhotel.ID_Area', '=', 'tblarea.ID_Area')->Where('tblarea.ID_Area', $ID_Area)->get();
        return response()->json([
            "data"=> $data,

        ]);
    	
        
    }


    public function person(Request $request) {
        // lay giu lieu tu form
        $ID_User = $request->ID_User;
        $result = DB::table('tbluser')
        ->where('ID_User', $ID_User)
        ->first();

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
