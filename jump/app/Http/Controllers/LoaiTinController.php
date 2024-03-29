<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TheLoai;
use App\LoaiTin;

class LoaiTinController extends Controller
{
    //
    public function getDanhSach()
    {
        $loaitin = LoaiTin::all();
    	return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }

     public function getThem()
    {
        $theloai=TheLoai::all();

        return view('admin.loaitin.them',['theloai'=>$theloai]);  	
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'Ten'=>'required|min:3|max:100|unique:LoaiTin,Ten',
            'TheLoai'=>'required'
        ],

        [
            'Ten.required'=>'Bạn chưa nhập tên',
            'Ten.unique'=>'Tên bạn nhập đã trùng',
            'Ten.min'=>'độ dài của tên ít nhất phải 3 ký tự trờ lên',
            'Ten.max'=>'tên nhập không quá 100 ký tự',
            'TheLoai.required'=>'bạn chưa chọn thể loại'
        ]);

        $loaitin = new LoaiTin;
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = changeTitle($request->Ten);
        $loaitin->idTheLoai = $request->TheLoai;
        $loaitin->save();

        return redirect('admin/loaitin/them')->with('thongbao','Thêm Thành Công');

    }

    public function getSua($id)
    {
        $theloai=TheLoai::all();
        $loaitin=LoaiTin::find($id);
        return view('admin.loaitin.sua',['loaitin'=>$loaitin,'theloai'=>$theloai]);
       

    }
    public function postSua( Request $request,$id)
    {
         $this->validate($request,
        [
            'Ten'=>'required|min:3|max:100|unique:LoaiTin,Ten',
            'TheLoai'=>'required'
        ],

        [
            'Ten.required'=>'Bạn chưa nhập tên',
            'Ten.unique'=>'Tên bạn nhập đã trùng',
            'Ten.min'=>'độ dài của tên ít nhất phải 3 ký tự trờ lên',
            'Ten.max'=>'tên nhập không quá 100 ký tự',
            'TheLoai.required'=>'bạn chưa chọn thể loại'
        ]);

       $loaitin=LoaiTin::find($id);
       $loaitin->Ten=$request->Ten;
       $loaitin->TenKhongDau=$request->Ten;
       $loaitin->idTheLoai=$request->TheLoai;
       $loaitin->save();

       return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Bạn đã sữa thành công');  
       
    }
    public function getXoa($id)
    {
        $loaitin=Loaitin::find($id);
        $loaitin->delete();

        return redirect('admin/loaitin/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }

}
