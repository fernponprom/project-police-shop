<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
use App\Users;

class userController extends BaseController
{
    public function index(){
      $user = Users::getUser();
      return view('pages.user')->with('user', $user);
    }

    public function getUser(Request $req){
      $url = url()->full(); 
      $type = substr($url, 27);
      $user_code = $type;
      $user = Users::getUserFromCode($user_code);
      return $user;
    }

    public function updateUser(Request $req){
      $user_code = $_REQUEST['user_code'];
      $first_name = $_REQUEST['first_name'];
      $last_name = $_REQUEST['last_name'];
      $address = $_REQUEST['address'];
      $tel = $_REQUEST['tel'];
      $email = $_REQUEST['email'];
      $line_id = $_REQUEST['line_id'];
      $facebook = $_REQUEST['facebook'];
      $role = $_REQUEST['role'];
      $update = Users::updateUser($user_code, $first_name, $last_name, $address, $tel, $email, $line_id, $facebook, $role);
      return $update;

    }

    public function deleteUser(Request $req){
      $user_code = $_REQUEST['user_code'];
      $delete = Users::deleteUser($user_code);
      return $delete;
    }

}