<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TheLoai;

class TheLoaiController extends Controller
{
    //
    public function getDanhSach()
    {
        $theloai = TheLoai::all();
    	return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }

     public function getThem()
    {

        return view('admin.theloai.them');  	
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'Ten'=>'required|min:3|max:100|unique:TheLoai,TEN'
        ],
        [
            'Ten.required'=>'bạn chưa nhập tên thể loai',
            'Ten.min'=>'tên độ dài phải từ 3 ký tự trở lên',
            'Ten.max'=>'tên độ dài không vượt quá 100 ký tự',
        ]);
    $theloai=new TheLoai;
    $theloai->Ten=$request->Ten;
    $theloai->TenKhongDau=changeTitle($request->Ten);
    $theloai->save();

    return redirect('admin/theloai/them')->with('thongbao','Thêm Thành Công');


    }

    public function getSua($id)
    {
        $theloai=TheLoai::find($id);
        
        return view('admin.theloai.sua',['theloai'=>$theloai]);

    }
    public function postSua( Request $request,$id)
    {
        $theloai=TheLoai::find($id);
        $this->validate($request,
        [
            'Ten'=> 'required|unique:TheLoai,TEN|min:3|max:100'
        ],

        [
            'Ten.required'=>'Bạn chưa nhập thể loai',
            'Ten.unique'=>'Tên thể loại đã tồn tại',
            'Ten.min'=>'tên độ dài phải từ 3 ký tự trở lên',
            'Ten.max'=>'tên độ dài không vượt quá 100 ký tự',
        ]
        );

    $theloai->Ten=$request->Ten;
    $theloai->TenKhongDau=changeTitle($request->Ten);
    $theloai->save();
    return redirect('admin/theloai/sua/'.$id)->with('thongbao','sửa Thành Công');


    }
    public function getXoa($id)
    {
        $theloai=Theloai::find($id);
        $theloai->delete();

    return redirect('admin/theloai/danhsach')->with('thongbao','Bạn Đã Xóa Thành Công');

    }

}
