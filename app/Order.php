<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
  public static function addOrder($customerId){
    $query = DB::table('order_list')->insert([
      'user_code' => $customerId,
      'status' => 0,
      'total_price' => 0,
    ]);
    return $query;
  }

  public static function getOrderFromUserId($customerId){
    $query = DB::table('order_list')->where('user_code', $customerId)->where('status',0)->get();
    return $query;
  }

  public static function updatePrice($orderId, $price){
    $query = DB::table('order_list')->where('order_id', $orderId)->update(['total_price' => $price]);
    return $query;
  }

  public static function getOrder($orderId){
    $query = DB::table('order_list')->where('order_id', $orderId)->where('status', 0)->get();
    return $query;
  }

  public static function updateStatus($orderId){
    $query = DB::table('order_list')->where('order_id', $orderId)->update(['status' => 1]);
    return $query;
  }

  public static function updateStatusSuccess($orderId){
    $query = DB::table('order_list')->where('order_id', $orderId)->update(['status' => 2]);
    return $query;
  }

  public static function updateStatusCancle($orderId){
    $query = DB::table('order_list')->where('order_id', $orderId)->update(['status' => 3]);
    return $query;
  }

  public static function getOrderUserId($user_code){
    $query = DB::table('order_list')->where('user_code', $user_code)->where('status', "!=", 0)->orderBy('create_date', 'desc')->get();
    return $query;
  }

  public static function getOrderId($orderId){
    $query = DB::table('order_list')->where('order_id', $orderId)->get();
    return $query;
  }

  public static function getAllOrder(){
    $query = DB::table('order_list')->orderBy('create_date', 'desc')->get();
    return $query;
  }

  public static function calOrder($day){
    $query = DB::table('order_list')->where('status', 2)->where('create_date', 'like', $day)->sum('total_price');
    return $query;
  }

  public static function countOrder($status, $day){
    $query = DB::table('order_list')->where('status', $status)->where('create_date', 'like', $day)->count();
    return $query;
  }

  public static function getOrderByDay($day){
    $query = DB::table('order_list')->where('status', 2)->where('create_date', 'like', $day)->get();
    return $query;
  }

  public static function calOrderPerWeek($start, $end){
    $query = DB::table('order_list')->where('status', 2)->whereBetween('create_date', [$start, $end])->sum('total_price');
    return $query;
  }

}