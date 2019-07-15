<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
use App\Users;

use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{


    //

    function __construct()
    {
        $tintuc=TinTuc::all();
    	$slide=Slide::all();
    	$theloai=TheLoai::all();
    	view()->share('theloai',$theloai);
    	view()->share('slide',$slide);
        view()->share('tintuc',$tintuc);

    }

    function getdangky()
    {
        return view('pages.dangky');
    }

    function postdangky(Request $request)
    {

      
        $this->validate($request,
        [
            'name'=>'required|min:3',
            'email'=>'required|unique:users,email',
            'password'=>'required|min:3|max:20',
            'passwordAgain'=>'required|same:password'
        ],
        
        [
            'name.required'=>'Bạn chưa nhập tên',
            'name.min'=>'Tên phải có ít nhất 3 ký tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Bạn chưa nhập đúng định dạng email',
            'email.unique'=>'Email bạn nhập đã tồn tại',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu phải có ít nhất 3 ký tự',
            'password.max'=>'Mật khẩu không quá 20 ký tự',
            'passwordAgain.same'=>'Mật khẩu nhập lại chưa khớp với mật khẩu trên'

        ]);

        $users=new Users;
        $users->name=$request->name;
        $users->email=$request->email;
        $users->password=bcrypt($request->password);
        $users->quyen=0;
        $users->save();

        return redirect('dangky')->with('thongbao','Bạn đã đăng ký thành công');
    }

    function gettimkiem(Request $request)
    {
        //$tukhoa=$request->tukhoa;
         $tukhoa=$request->get('tukhoa');

        $tintuc=TinTuc::where('TieuDe','like',"%$tukhoa%")->orWhere('TomTat','like',"%$tukhoa%")->orWhere('NoiDung','like',"%$tukhoa%")->take(20)->paginate(5);

        return view('pages.timkiem',['tintuc'=>$tintuc,'tukhoa'=>$tukhoa]);
    }

    function trangchu()
    {
      
    	return view('pages.trangchu');

    }

    function lienhe()
    {

    	return view('pages.lienhe');

    }

    function loaitin($id)
    {
        $loaitin=LoaiTin::find($id);
        $tintuc=TinTuc::where('idLoaiTin',$id)->paginate(5);

        return view('pages.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }

    function tintuc($id)
    {
        $tintuc=TinTuc::find($id);
        $tinnoibat=TinTuc::where('NoiBat',1)->take(4)->get();
        $tinlienquan=TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();

        return view('pages.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan]);
    }

    function getdangnhap()
    {
        return view('pages.dangnhap');
    }

    function postdangnhap(Request $request)
    {

      $this->validate($request,
        [
            'email'=>'required',
            'password'=>'required|min:3|max:30'

        ],

        [
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'mật khẩu bạn nhập dưới 3 ký tự',
            'password.max'=>'mật khẩu bạn nhập quá 30 ký tự'

        ]);
       if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('trangchu');
        }
        else 
        {
           return redirect('dangnhap')->with('thongbao','yêu cầu đăng nhập'); 
        }

    }
    
    function getdangxuat()
    {
        Auth::logout();
        return redirect('dangnhap');
    }
 
}
