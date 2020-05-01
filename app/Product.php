<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
  public static function getproductData(){
    $query = DB::table('products')->orderBy('product_id', 'desc')->get();
    return $query;
  }

  public static function getProductFromCode($code){
    $query = DB::table('products')->where('code', $code)->get();
    return $query;
  }

  public static function getproductType($type){
    $query = DB::table('products')->where('type', $type)->get();
    return $query;
  }

  public static function getproductBrand($brand){
    $query = DB::table('products')->where('brand', $brand)->get();
    return $query;
  }
  
  public static function deleteProduct($code){
    $query = DB::table('products')->where('code', $code)->delete();
    return $query;
  }

  public static function updateProduct($code, $name, $type, $color, $size, $brand, $volume, $price){
    $query = DB::table('products')->where('code', $code)->update(['name' => $name, 'type'=> $type, 'color'=> $color, 'size'=>$size, 'brand'=>$brand, 'volume'=>$volume, 'price'=>$price ]);
    return $query;
  }

  public static function reserveState($code, $qty){
    $query = DB::table('products')->where('code', $code)->decrement('volume', $qty);
    return $query;
  }



}