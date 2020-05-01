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

class productDetailController extends BaseController{
  public function index(Request $req, $product_name){
    $check = $req->session()->get('user');
    $url = url()->full();
    $type = substr($url, 30);
    $code_product = $type;
    $customerId = $req->session()->get('id');
    $count = Cart::countCart($customerId);
    $req->session()->put('count', $count);
    $product = Product::getProductFromCode($code_product);
    return view('pages.product_detail')->with('product', $product[0]);
  }

  public function getData(Request $req){
    $url = url()->full();
    // print_r($url);
    $type = substr($url, 30);
    $code_product = $type;
    $product = Product::getProductFromCode($code_product);
    return $product;
  }

}