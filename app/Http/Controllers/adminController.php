<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use Session;
use App\Http\Requests ;
use Illuminate\Support\Facades\Redirect ;
session_start() ;
class adminController extends Controller
{
    public function index(){
        //trả về trang đăng nhập
        return view('admin_login') ;
    }
    public function registration(){
        //trả về trang đăng kí
        return view('admin_registration') ;
    }
    public function add_user(Request $_request){
        $data = array() ;
        $data['admin_email'] = $_request->Email ;
        $data['admin_password'] = $_request->Password ;
        $data['admin_name'] = $_request->Name ;
        $data['admin_phone'] = $_request->Phone ;
        DB::table('tbl_admin')->insert($data) ;
        Session::put('message','Tạo tài khoản thành công') ;
        return Redirect::to('/admin') ;
    }
    //thêm tài khoản 
    
    //kiểm tra tài khoản
    public function dashboard(Request $_request){
        $email = $_request->admin_email ;
        $pass = md5($_request->admin_password) ;
        $result = DB::table('tbl_admin')->where('admin_email',$email)->where('admin_password',$pass)->first() ;
        if($result){
            Session::put('admin_name',$result->admin_name) ;
            Session::put('admin_id',$result->admin_id) ;
            return Redirect::to('/quanly');
        }else{
            Session::put('message','tài khoản mật khẩu không chính sác') ;
            return Redirect::to('/admin');
        }
       
    }
    //đăng xuất tài khoản
    public function logout(){
        Session::put('admin_name',null) ;
        Session::put('admin_id',null) ;
        return Redirect::to('/admin');
    }
    public function show_dashboard(){
        return view('admin.dashboard') ;
    }
    
}
