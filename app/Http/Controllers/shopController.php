<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Cart;

class shopController extends BaseController{
  public function index(Request $req){
    $customerId = $req->session()->get('id');
    $count = Cart::countCart($customerId);
    $req->session()->put('count', $count);
    $check = $req->session()->get('user');
    $url = url()->full();
    $type = substr($url, 27);
    if($type === 'shirt'){
      $filter = 1;
      $msg = 'เสื้อ เสื้อเกราะ';
    }elseif($type === 'pants'){
      $filter = 2;
      $msg = 'กางเกง';
    }elseif($type === 'shoes'){
      $filter = 3;
      $msg = 'รองเท้า';
    }elseif($type === 'accessories'){
      $filter = 4;
      $msg = 'กระเป๋า';
    }elseif($type === 'Bogie.1' || $type === 'BOGIE.1'){
      $filter = 5;
      $bfilter = $type;
      $msg = $type;
    }elseif($type === '5.11'){
      $filter = 6;
      $bfilter = $type;
      $msg = $type;
    }elseif($type === 'MAGNUM' || $type === 'magnum'){
      $filter = 7;
      $bfilter = $type;
      $msg = $type;
    }elseif($type == 'BANG BANG!' || $type == 'bang bang!'){
      $filter = 8;
      $bfilter = $type;
      $msg = $type;
    }elseif($type === 'DELTA' || $type === 'delta'){
      $filter = 9;
      $bfilter = $type;
      $msg = $type;
    }elseif($type == 'SECTOR SEVEN' || $type == 'sector seven'){
      $filter = 10;
      $bfilter = $type;
      $msg = $type;
    }elseif($type === 'TACTICAL' || $type === 'tactical'){
      $filter = 11;
      $bfilter = $type;
      $msg = $type;
    }elseif($type === 'glove'){
      $filter = 12;
      $msg = 'ถุงมือ'; 
    }else{
      $filter = 0;
      $msg = 'สินค้าทั้งหมด';
    }
    // print_r($filter);
    // print_r($url);exit;
    if($filter == 0){
      $product = Product::getproductData();
      $count = Product::getproductData()->count();
    }elseif($filter == 1){
      $product = Product::getproductType($filter);
      $count = Product::getproductType($filter)->count();
    }elseif($filter == 2){
      $product = Product::getproductType($filter);
      $count = Product::getproductType($filter)->count();
    }elseif($filter == 3){
      $product = Product::getproductType($filter);
      $count = Product::getproductType($filter)->count();
    }elseif($filter == 4){
      $product = Product::getproductType($filter);
      $count = Product::getproductType($filter)->count();
    }elseif($filter == 5 || $filter == 6 || $filter == 7 || $filter == 8 || $filter == 9  || $filter == 10 || $filter == 11){
      $product = Product::getProductBrand($bfilter);
      $count = Product::getproductBrand($bfilter)->count();
    }elseif($filter == 12){
      $product = Product::getproductType($filter);
      $count = Product::getproductType($filter)->count();
    }
    
    // print_r($product[0]->name);exit;
    return view('pages.shop')->with('product', $product)->with('type', $msg)->with('count', $count);
  }

}