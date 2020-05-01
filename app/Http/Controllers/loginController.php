<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;

class loginController extends BaseController
{
    public function index(Request $req){
      $userLogin = $req->session()->get('user');
      if($userLogin){
        return redirect()->action('homeController@index');
      }else{
        return view('pages.login');
      }
      
    }

    public function login(Request $req){
      $username = $req->input('username');
      $password = $req->input('password');
      $psw = md5($password);
      $checkLogin = DB::table('user')->where(['email'=>$username, 'password' => $psw])->get();
      if(count($checkLogin) > 0){
        $req->session()->put('user', $username);
        $req->session()->put('role', $checkLogin[0]->role);
        $req->session()->put('firstname', $checkLogin[0]->first_name);
        $req->session()->put('id', $checkLogin[0]->user_code);
        $userLogin = $req->session()->get('user');
        return redirect()->action('homeController@index', [$userLogin]);
      }
      else{
        $msg['err'] = 'ล็อคอินไม่สำเร็จกรุณาล็อคอินใหม่อีกครั้ง';
        $msg['btn'] = 'กลับไปหน้าลงชื่อเข้าใช้';
        $msg['route'] = '/login';
        return view('err')->with('msg', $msg);
      }
    }

    public function logout(Request $req){
      $req->session()->flush();
      return redirect()->action('homeController@index');
    }



}
