<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;

class LoaiTinController extends Controller
{
    //
    public function getDanhSach()
    {
    	$tintuc=TinTuc::oderBy('id','DESC')->get();
    	return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
        
    }

     public function getThem()
    {
        
    }

    public function postThem(Request $request)
    {

    }

    public function getSua($id)
    {
       

    }
    public function postSua( Request $request,$id)
    {
        

       
       
    }
    public function getXoa($id)
    {

    }

}
