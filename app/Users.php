<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Users extends Model {

  public static function getUser(){
    $query = DB::table('user')->get();
    return $query;
  }

  public static function getUserFromCode($code){
    $query = DB::table('user')->where('user_code', $code)->get();
    return $query;
  }

  public static function deleteUser($code){
    $query = DB::table('user')->where('user_code', $code)->delete();
    return $query;
  }

  public static function updateUser($user_code, $first_name, $last_name, $address, $tel, $email, $line_id, $facebook, $role){
    $query = DB::table('user')->where('user_code', $user_code)->update(['first_name' => $first_name, 'last_name' => $last_name, 'address' => $address, 'tel' => $tel, 'email' => $email, 'line_id' => $line_id, 'facebook' => $facebook, 'role' => $role]);
    return $query;
  }

  public static function getUserFromEmail($email){
    $query = DB::table('user')->where('email', $email)->get();
    return $query;
  }

  public static function getNameFromUser($code){
    $query = DB::table('user')->where('user_code', $code)->get();
    return $query;
  }

}