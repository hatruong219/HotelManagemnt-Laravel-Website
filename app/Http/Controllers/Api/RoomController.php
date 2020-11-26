<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tblArea;
use App\tblRoom;
use App\tblHotel;
use App\tblUser;
use App\tblBill;
use App\tblComment;
use DB;


class RoomController extends Controller
{
    public function post_all_room(Request $rq)
    {
    	$ID_Hotel = $rq->ID_Hotel;
    	$data = DB::table('tblroom')->Where('ID_Hotel',$ID_Hotel)->get();
        $num = 0;
        $num = DB::table('tblroom')->Where('ID_Hotel',$ID_Hotel)->count();
        //số lượng comment
        $comment=array();
        foreach ($data as $row)
        {
            $comment[$row->ID_Room]=DB::table('tblcomment')->Where('ID_Room',$row->ID_Room)->count();
        }
        return response()->json([
            "data11"=> $data,
            "comment"=> $comment,
            "num"=>$num,
        ]);
    }

    public function post_des_room(Request $request)
    {
    	$ID_Room = $request->ID_Room;
        $data = DB::table('tblroom')->join('tblhotel', 'tblroom.ID_Hotel', '=', 'tblhotel.ID_Hotel')->Where('ID_Room',$ID_Room)->get();
        //số lượng comment
        $comment = DB::table('tblcomment')->Where('ID_Room',$ID_Room)->count();
        return response()->json([
            "data"=> $data,
            "comment"=> $comment,
        ]);
    	
        
    } 
    public function post_search(Request $rq)
    {
        $key = $rq->key;
        $data = DB::table('tblroom')->join('tblhotel', 'tblroom.ID_Hotel', '=', 'tblhotel.ID_Hotel')->Where('Name_Hotel','like', '%' . $key . '%')->orWhere('Name_Room', 'like', '%' . $key . '%')->get();
        $num = DB::table('tblroom')->join('tblhotel', 'tblroom.ID_Hotel', '=', 'tblhotel.ID_Hotel')->Where('Name_Hotel','like', '%' . $key . '%')->orWhere('Name_Room', 'like', '%' . $key . '%')->count();
        //số lượng comment
        $comment=array();
        foreach ($data as $row)
        {
            $comment[$row->ID_Room]=DB::table('tblcomment')->Where('ID_Room',$row->ID_Room)->count();
        }
        return response()->json([
            "data11"=> $data,
            "comment"=> $comment,
        ]);
    }

    public function post_addcomment(Request $rq) {
        $binhluan = new tblComment;
        $binhluan->ID_Room = $rq->ID_Room;
        $binhluan->ID_User = $rq->ID_User;
        $binhluan->Content_Comment = $rq->Content_Comment;
        $binhluan->save();

        $t = $rq->Capbac;
        $data = DB::table('tblroom')->Where('ID_Room',$rq->ID_Room)->get();
        $s1 =0;
        foreach ($data as $row)
        {
            $s1 = $row->Star_Room;
        }
        $s2 = DB::table('tblcomment')->Where('ID_Room',$rq->ID_Room)->count();
        $s3 = $s1*$s2;
        $Star_Room = ($s3+$t)/($s2+1);
        DB::table('tblroom')->Where('ID_Room',$rq->ID_Room)->update(['Star_Room'=> $Star_Room]);

        return response()->json([
            "status"=> true,

        ]);

    }
    public function post_listcomment(Request $request)
    {  
        $ID_Room = $request->ID_Room;

        $data = DB::table('tblcomment')->join('tblroom', 'tblroom.ID_Room', '=', 'tblcomment.ID_Room')->join('tbluser', 'tbluser.ID_User', '=', 'tblcomment.ID_User')->get();
        return response()->json([
            "data"=> $data,
        ]);
     }
}
