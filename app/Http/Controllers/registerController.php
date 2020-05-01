<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;

class registerController extends BaseController
{
    public function index(Request $req){
      $userLogin = $req->session()->get('user');
      if($userLogin){
        return redirect()->action('homeController@index');
      }else{
        return view('pages.register');
      }
      
    }

    public function generate_code(){
      $code = date("Y-m-d H:i:s");
      $encrypt = md5($code);
      $gen = substr($encrypt, 22);
      $user = 'CM'.$gen;
      return $user;
    }

    public function register(Request $req){
      $first_name = $req->input('firstname');
      $last_name = $req->input('lastname');
      $tel = $req->input('tel');
      $email = $req->input('email');
      $password = $req->input('password');
      $line_id = $req->input('line_id');
      $facebook = $req->input('facebook');
      $address = 'default';
      $role = 'customer';
      $user_code = $this->generate_code();
      $check_user_email = DB::table('user')->where(['email' => $email])->get();
      $check_user_tel = DB::table('user')->where(['tel' => $tel])->get();
      if(count($check_user_email) > 0){
        $msg['err'] = "อีเมลล์ถูกใช้งานแล้ว";
        $msg['btn'] = 'กลับไปยังหน้าสมัครสมาชิก';
        $msg['route'] = '/register';
        return view('err')->with('msg', $msg);
      }elseif(count($check_user_tel) > 0){
        $msg['err'] = "เบอร์โทรศัพท์ถูกใช้งานแล้ว";
        $msg['btn'] = 'กลับไปยังหน้าสมัครสมาชิก';
        $msg['route'] = '/register';
        return view('err')->with('msg', $msg);
      }else{
        $register = DB::table('user')->insert([
          'user_code' => $user_code,
          'first_name' => $first_name,
          'last_name' => $last_name,
          'tel' => $tel,
          'email' => $email,
          'password' => md5($password),
          'role' => $role,
          'address' => $address,
          'facebook' => $facebook,
          'line_id' => $line_id
        ]);
      }
      if($register == 1){
        return redirect()->action('loginController@index');
      }else{
        return redirect()->action('registerController@index');
      }
    }


}
