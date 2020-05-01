<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
  public static function addCart($itemCode, $customerId, $itemPrice, $orderId){
    $query = DB::table('cart')->insert([
      'user_code' => $customerId,
      'order_id' => $orderId,
      'product_code' => $itemCode,
      'qty' => 1,
      'price' => $itemPrice,
      'status' => 0
    ]);
    return $query;
  }

  public static function newCart($customerId){
    
  }

  public static function getCart($customerId){
    $query = DB::table('cart')->where('user_code', $customerId)->where('status', 0)->get();
    return $query;
  }

  public static function getCartValid($itemCode, $customerId){
    $query = DB::table('cart')->where('user_code', $customerId)->where('product_code', $itemCode)->where('status', 0)->get();
    return $query;
  }

  public static function incCart($itemCode, $customerId, $qty, $itemPrice, $lastPrice){
    $query = DB::table('cart')->where('user_code', $customerId)->where('product_code', $itemCode)->update(['qty' => $qty+1, 'price' => $lastPrice + $itemPrice]);
    return $query;
  }

  public static function decCart($itemCode, $customerId, $qty, $itemPrice, $lastPrice){
    $query = DB::table('cart')->where('user_code', $customerId)->where('product_code', $itemCode)->update(['qty' => $qty-1, 'price' => $lastPrice - $itemPrice]);
    return $query;
  }

  public static function deleteCart($itemCode, $customerId){
    $query = DB::table('cart')->where('user_code', $customerId)->where('product_code', $itemCode)->delete();
    return $query;
  }

  public static function countCart($customerId){
    $query = DB::table('cart')->where('user_code', $customerId)->where('status', 0)->count();
    return $query;
  }

  public static function sumCart($customerId){
    $query = DB::table('cart')->where('user_code', $customerId)->where('status', 0)->sum('price');
    return $query;
  }

  public static function getCartOrderId($orderId){
    $query = DB::table('cart')->where('order_id', $orderId)->get();
    return $query;
  }

  public static function sumCartOrderId($orderId){
    $query = DB::table('cart')->where('order_id', $orderId)->sum('price');
    return $query;
  }

  public static function clearCart($orderId){
    $query = DB::table('cart')->where('order_id', $orderId)->update(['status' => 1]);
    return $query;
  }

  public static function bestSeller(){
    $query = DB::table('cart')->select('product_code', DB::raw('SUM(qty)'))->where('status', 1)->groupBy('product_code')->orderBy('qty', 'desc')->get();
    return $query;
  }

  public static function countQty($productCode){
    $query = DB::table('cart')->where('product_code', $productCode)->get('qty');
    return $query;
  }
  
}