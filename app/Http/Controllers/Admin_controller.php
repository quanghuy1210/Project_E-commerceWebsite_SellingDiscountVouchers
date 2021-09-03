<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Social;
use Socialite;
use App\Login;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Rules\Captcha;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session as FacadesSession;

session_start();

class Admin_controller extends Controller
{
    public function checkLogin()
    {
        $admin_id = Session::get('id');
        if ($admin_id) {
            return Redirect::to('quan_ly');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function index()
    {
        return view('login_admin');
    }
    public function layout()
    {
        $this->checkLogin();
        return view('admin.ad_home');
    }
    public function adhome(Request $request)
    {
        $admin_email = $request->ad_email;
        $admin_password = md5($request->ad_password);
        $login = DB::table('admin')->where('email', $admin_email)->where('password', $admin_password)->first();
        if ($login) {
            Session::put('name', $login->name);
            Session::put('id', $login->id);
            return Redirect::to('quan_ly');
        } else {
            Session::put('message', 'Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
            return Redirect::to('admin');
        }
    }
    public function dangxuat()
    {
        $n = Session::get('name');
        if ($n) {
            Session::put('name', null);
            Session::put('id', null);
        }
        return Redirect::to('admin');
    }
}
