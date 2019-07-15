<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


use App\TheLoai;
use App\LoaiTin;
use App\Users;


class UsersController extends Controller
{

   
    //
    public function getDanhSach()
    {
    	$users=Users::all();
    	return view('admin.users.danhsach',['users'=>$users]);
       
    }

     public function getThem()
    {
       return view('admin.users.them');
    }

    public function postThem(Request $request)
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
        $users->quyen=$request->quyen;
        $users->save();

        return redirect('admin/users/danhsach')->with('thongbao','Bạn đã thêm thành công');
       
    }

    public function getSua($id)
    {
        $users=Users::find($id);
        return view('admin.users.sua',['users'=>$users]);
       
    }
    public function postSua( Request $request,$id)
    {
         $this->validate($request,
        [
            'name'=>'required|min:3'
         
        ],
        
        [
            'name.required'=>'Bạn chưa nhập tên',
            'name.min'=>'Tên phải có ít nhất 3 ký tự'
         

        ]);

        $users=Users::find($id);
        $users->name=$request->name;
        $users->quyen=$request->quyen;


        if($request->changePassword =="on")
        {
             $this->validate($request,
        [
            'password'=>'required|min:3|max:20',
            'passwordAgain'=>'required|same:password'
        ],
        
        [
            
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu phải có ít nhất 3 ký tự',
            'password.max'=>'Mật khẩu không quá 20 ký tự',
            'passwordAgain.same'=>'Mật khẩu nhập lại chưa khớp với mật khẩu trên'

        ]);

         $users->password=bcrypt($request->password);

        }
  
        $users->save();
        return redirect('admin/users/sua/'.$id)->with('thongbao','Bạn đã thêm thành công');
    }


    public function getXoa($id)
    {
        $users=Users::find($id);
        $users->delete();

        return redirect('admin/users/danhsach')->with('thongbao','Bạn đã xóa thành công');
       
    }
    public function getDangnhapAdmin()
    {

        return view('admin.login');
    }
    public function postDangnhapAdmin(Request $request)
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
            return redirect('admin/theloai/danhsach');
        }
        else 
        {
           return redirect('admin/dangnhap')->with('thongbao','yêu cầu đăng nhập'); 
        }

    }
    public function getDangXuat()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }

}
