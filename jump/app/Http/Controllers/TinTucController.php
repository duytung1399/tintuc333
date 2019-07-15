<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Comment;

class TinTucController extends Controller
{
    //
    public function getDanhSach()
    {

    	$tintuc=TinTuc::orderBy('id','desc')->get();
    	return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
        
    }

     public function getThem()
    {
    	$theloai=TheLoai::all();
    	$loaitin=LoaiTin::all();
    	return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);     
    }

    public function postThem(Request $request)
    {

        $this->validate($request,
        [
        'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
        'TomTat'=>'required',
        'NoiDung'=>'required'
        ],
        [
        'TieuDe.required'=>'Bạn chưa chọn tiêu đề',
        'TieuDe.min'=>'Tiêu đề phải ít nhất có 3 ký tự',
        'TieuDe.unique'=>'Tiêu đề đã tồn tại',
        'TomTat.required'=>'Bạn chưa nhập tóm tắt',
        'NoiDung.required'=>'Bạn chưa nhập nội dung'
        ]);

        $tintuc=new TinTuc;
        $tintuc->TieuDe=$request->TieuDe;
        $tintuc->TomTat=$request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;
        $tintuc->idLoaiTin=$request->LoaiTin;
        $tintuc->TieuDeKhongDau=changeTitle($request->TieuDe);
        $tintuc->SoLuotXem=0;

        if($request->hasFile('Hinh'))
        {
            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi !='jpg'&&$duoi!='png'&&$duoi !='jpeg')
            {
                return redirect('admin/tintuc/them')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_". $name;
            while(file_exists("update/tintuc/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
                
            }
            $file->move("update/tintuc",$Hinh);
            $tintuc->Hinh =$Hinh;

        }
        else
        {
            $tintuc->Hinh="";
        }

        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao','Bạn đã thêm tin thành công');
    }

    public function getSua($id)
    {
        $theloai=TheLoai::all();
        $loaitin=LoaiTin::all();
        $tintuc=TinTuc::find($id);
        return view('admin.tintuc.sua',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
       

    }
    public function postSua( Request $request,$id)
    {
        $tintuc=TinTuc::find($id);

        $this->validate($request,
        [
        'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
        'TomTat'=>'required',
        'NoiDung'=>'required'
        ],
        [
        'TieuDe.required'=>'Bạn chưa chọn tiêu đề',
        'TieuDe.min'=>'Tiêu đề phải ít nhất có 3 ký tự',
        'TieuDe.unique'=>'Tiêu đề đã tồn tại',
        'TomTat.required'=>'Bạn chưa nhập tóm tắt',
        'NoiDung.required'=>'Bạn chưa nhập nội dung'
        ]);

        $tintuc->TieuDe=$request->TieuDe;
        $tintuc->TomTat=$request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;
        $tintuc->idLoaiTin=$request->LoaiTin;
        $tintuc->TieuDeKhongDau=changeTitle($request->TieuDe);
        $tintuc->SoLuotXem=0;


        if($request->hasFile('Hinh'))
        {
            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi !='jpg'&&$duoi !='png'&&$duoi !='jpeg')
            {
            return redirect('admin/tintuc/them')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_". $name;
            while(file_exists("update/tintuc/".$Hinh))
            {
                $Hinh=str_random(4)."_".$name;
                
            }

            
            $file->move("update/tintuc",$Hinh);
            //unlink("update/tintuc/".$tintuc->Hinh);
            $tintuc->Hinh=$Hinh;
        }

    $tintuc->save();

    return redirect('admin/tintuc/sua/'.$id)->with('thongbao','bạn đã sữa thành công');
       
       
    }
    public function getXoa($id)
    {
        $tintuc=TinTuc::find($id);
        $tintuc->delete();
       return redirect('admin/tintuc/danhsach')->with('thongbao','bạn đã xóa thành công');

    }

}
