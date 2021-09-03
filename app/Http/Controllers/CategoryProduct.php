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

session_start();

class CategoryProduct extends Controller
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
    public function add()
    {
        $this->checkLogin();
        $add = DB::table('danhmuc')->get();
        $manage_dm = view('admin.add_category_product')->with('add',$add);
        return view('admin_layout')->with('admin.add_category_product',$manage_dm);
    }
    public function all()
    {
        $this->checkLogin();
        $all = DB::table('voucher')->join('danhmuc','voucher.danhmuc_id','=','danhmuc.id_dm')->get();
        $voucher = view('admin.all_category_product')->with('all',$all);
        return view('admin_layout')->with('admin.all_category_product',$voucher);
    }
    public function save_dm(Request $request)
    {
        $data = array();
        $data['dmname'] = $request->name_dm;
        $data['description'] = $request->dr_dm;
        $data['parent_id'] = $request->parent_id;
        $data['sx_donhang'] = 1;
        $data['created'] = now();
        
        DB::table('danhmuc')->insert($data);
        Session::put('tn','Đã thêm thành công danh mục voucher');
        return redirect::to('add-category-product');
    }
    public function add_category()
    {
        $this->checkLogin();
        $add = DB::table('danhmuc')->get();
        $manage_dm = view('admin.add_category')->with('add',$add);
        return view('admin_layout')->with('admin.add_category_product',$manage_dm);
    }
    public function save_voucher(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['content'] = $request->content;
        $data['danhmuc_id'] = $request->parent_id;
        $data['gia'] = $request->gia;
        $data['discount'] = $request->discount;
        $data['buyed'] = 1;
        $get_image = $request->file('anh');
        if($get_image){
            $get_name = $get_image->getClientOriginalName();
            $new = current(explode('.',$get_name));
            $new_image = $new.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload',$new_image);
            $data['image_link'] = $new_image;
        }
        $data['image_list'] = $request->anh_list;
        $data['created'] = now();
        $data['han'] = $request->han;
        DB::table('voucher')->insert($data);
        Session::put('tn','Đã thêm thành công voucher');
        return redirect::to('add-category');
    }
    public function edit_category($id)
    {
        $this->checkLogin();
        $edit = DB::table('voucher')->where('id',$id)->get();
        $voucher = view('admin.edit_category')->with('edit',$edit);
        return view('admin_layout')->with('admin.edit_category',$voucher);
    }
    public function update_category(Request $request,$id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['content'] = $request->content;
        $data['Gia'] = $request->gia;
        $data['Discount'] = $request->discount;

        $get_image = $request->file('anh');
        if($get_image){
            $get_name = $get_image->getClientOriginalName();
            $new = current(explode('.',$get_name));
            $new_image = $new.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload',$new_image);
            $data['image_link'] = $new_image;
        }
        
        DB::table('voucher')->where('id',$id)->update($data);
        Session::put('tn','Cập nhật thành công voucher');
        return redirect::to('all-category-product');
    }
    public function delete_category($id)
    {
        DB::table('voucher')->where('id',$id)->delete();
        Session::put('tn','Đã xoa thành công voucher');
        return redirect::to('all-category-product');
    }
}
