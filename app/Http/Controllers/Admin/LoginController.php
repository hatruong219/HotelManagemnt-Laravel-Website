<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class LoginController extends Controller
{
    public function getLogin() {
		return view('Admin\login');
	}

	public function postLogin(Request $request) {
		// lay giu lieu tu form
		$Username = $request->UserName;
        $Pass = $request->Pass;

        $result = DB::table('admin')
        ->where('Username_Admin', $Username)
        ->where('Pass_Admin', $Pass)
        ->first();

        if ($result) 
        {
            $request->session()->put('admin', $result->Name_Admin);
            return redirect( 'admin/trangchu' );
        }
        else
        {
            $request->session()->flash('errors', 'Tài khoản hoặc mật khẩu không chính xác !');
            return redirect('admin/login');
        }
	}
	public function Logout() {
    	Session()->flush();
    	return redirect('admin/login');
    }
}
