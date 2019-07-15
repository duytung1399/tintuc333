<?php

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
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Comment;
use App\Slide;
use App\Users;



	Route::get('/', function () {
    return view('welcome');
	});







	Route::get('dangnhap','PagesController@getdangnhap');
	Route::post('dangnhap','PagesController@postdangnhap');
	Route::get('dangxuat','PagesController@getdangxuat');
	Route::get('dangky','PagesController@getdangky');
	Route::post('dangky','PagesController@postdangky');

	Route::get('trangchu','PagesController@trangchu');
	Route::get('timkiem','PagesController@gettimkiem');
	Route::get('lienhe','PagesController@lienhe');


	Route::get('loaitin/{id}/{TenKhongDau}.html','PagesController@loaitin');
	Route::get('tintuc/{id}/{TieuDeKhongDau}.html','PagesController@tintuc');










	//dangnhap//dangxuat
	Route::get('admin/dangnhap','UsersController@getDangnhapAdmin');
	Route::post('admin/dangnhap','UsersController@postDangnhapAdmin');
	Route::get('admin/logout','UsersController@getDangXuat');

	//ajax loaitin

	Route::get('them', 'TheLoaiController@getThem');

	Route::group(['prefix'=>'ajax'],function(){
	Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
	});


Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'theloai'],function(){


	Route::get('danhsach','TheLoaiController@getDanhSach');

	Route::get('sua/{id}','TheLoaiController@getSua');
	Route::post('sua/{id}','TheLoaiController@postSua');


	Route::get('them','TheLoaiController@getThem');
	Route::post('them','TheLoaiController@postThem');

	Route::get('xoa/{id}','TheLoaiController@getXoa');
	});


Route::group(['prefix'=>'loaitin'],function(){

	Route::get('danhsach','LoaitinController@getDanhSach');

	Route::get('sua/{id}','LoaitinController@getSua');
	Route::post('sua/{id}','LoaitinController@postSua');


	Route::get('them','LoaitinController@getThem');
	Route::post('them','LoaitinController@postThem');

	Route::get('xoa/{id}','LoaitinController@getXoa');
	});


Route::group(['prefix'=>'tintuc'],function(){


	Route::get('danhsach','TinTucController@getDanhSach');

	Route::get('sua/{id}','TinTucController@getSua');
	Route::post('sua/{id}','TinTucController@postSua');

	Route::get('them','TinTucController@getThem');
	Route::post('them','TinTucController@postThem');

	Route::get('xoa/{id}','TinTucController@getXoa');
	});

	
Route::group(['prefix'=>'slide'],function(){


	Route::get('danhsach','SlideController@getDanhSach');

	Route::get('sua/{id}','SlideController@getSua');
	Route::post('sua/{id}','SlideController@postSua');

	Route::get('them','SlideController@getThem');
	Route::post('them','SlideController@postThem');

	Route::get('xoa/{id}','SlideController@getXoa');
	});

	
Route::group(['prefix'=>'users'],function(){


	Route::get('danhsach','UsersController@getDanhSach');

	Route::get('sua/{id}','UsersController@getSua');
	Route::post('sua/{id}','UsersController@postSua');

	Route::get('them','UsersController@getThem');
	Route::post('them','UsersController@postThem');

	Route::get('xoa/{id}','UsersController@getXoa');
	});

});

Route::group(['prefix'=>'comment'],function(){
	Route::get('xoa/{id}/{idTinTuc}','CommentController@getXoa');
	});


