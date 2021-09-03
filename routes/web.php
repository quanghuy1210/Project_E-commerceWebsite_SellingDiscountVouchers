<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//fontend 
Route::get('/','Home_controller@index');
Route::get('/trang-chu','Home_controller@index');
Route::get('/chitiet{id}','Home_controller@chitiet');


//danhmuc sp
Route::get('/danh-muc-sp/{id_dm}','Home_controller@showdm');


//chitiet sp
Route::get('/chi-tiet-sp/{id}','Home_controller@chitiet');


//login_user
Route::get('/dang-nhap-user','Home_controller@dangnhap_user');
Route::post('/check','Home_controller@check_User');
Route::get('/dangxuat-user','Home_controller@dangxuat');




//backend
Route::get('/admin','Admin_controller@index');
Route::get('/quan_ly','Admin_controller@layout');
Route::get('/dangxuat','Admin_controller@dangxuat');
Route::post('/admin-home','Admin_controller@adhome');


//Category Product 
Route::get('/add-category-product','CategoryProduct@add');
Route::post('/save-category-product','CategoryProduct@save_dm');

//Category
Route::get('/add-category','CategoryProduct@add_category');
Route::get('/all-category-product','CategoryProduct@all');
Route::get('/edit-category/{id}','CategoryProduct@edit_category');
Route::get('/delete-category/{id}','CategoryProduct@delete_category');
Route::post('/update-category/{id}','CategoryProduct@update_category');
Route::post('/save-category','CategoryProduct@save_voucher');


