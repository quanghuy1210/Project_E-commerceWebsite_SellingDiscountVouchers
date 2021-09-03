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


class Home_controller extends Controller
{
    public function index()
    {
        $voucher = DB::table('voucher')->get();
        $danhmuc = DB::table('danhmuc')->get();
        $user = DB::table('user')->get();
        return view('page.home')->with('voucher', $voucher)->with('user', $user)->with('danhmuc', $danhmuc);
    }

    public function home()
    {
        $all = DB::table('danhmuc')->get();
        return view('welcome')->with('all', $all);
    }

    //code danhmucsp
    public function showdm($id_dm)
    {
        $voucher = DB::table('voucher')->join('danhmuc', 'voucher.danhmuc_id', '=', 'danhmuc.id_dm')->where('danhmuc_id', $id_dm)->paginate(3);
        $danhmuc = DB::table('danhmuc')->get();
        return view('page.danhmuc')->with('voucher', $voucher)->with('danhmuc', $danhmuc);
    }
    public function chitiet($id)
    {
        $voucher = DB::table('voucher')->where('id', $id)->get();
        $danhmuc = DB::table('danhmuc')->get();
        $n =  DB::table('voucher')->join('danhmuc', 'voucher.danhmuc_id', '=', 'danhmuc.id_dm')->get();
        return view('page.chitiet')->with('voucher', $voucher)->with('danhmuc', $danhmuc)->with('n', $n);
    }
    public function dangnhap_user()
    {
        $user = DB::table('user')->get();
        return view('page.loginUser')->with('user', $user);
    }
    public function check_User(Request $request)
    {
        $email = $request->ad_email;
        $password = md5($request->ad_password);
        $login = DB::table('user')->where('email', $email)->where('password', $password)->first();
        if ($login) {
            Session::put('name_user', $login->name);
            Session::put('id_user', $login->id);
            return Redirect::to('');
        } else {
            Session::put('loinhan', 'Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
            return Redirect::to('dang-nhap-user');
        }
    }
    public function dangxuat()
    {
        $n = Session::get('name_user');
        if ($n) {
            Session::put('name_user', null);
            Session::put('id_user', null);
        }
        return Redirect::to('');
    }
}
