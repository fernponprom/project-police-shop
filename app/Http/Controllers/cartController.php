<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
use App\Cart;
use App\Product;
use App\Order;
use App\Users;

class cartController extends BaseController{
  public function index(Request $req){
    $check = $req->session()->get('user');
    $customerId = $req->session()->get('id');
    $cart = Cart::getCart($customerId);
    $sum = Cart::sumCart($customerId);
    $product= array();
    if(count($cart) == 0){
      $add = array_push($product, 'empty');
    }else{
      foreach($cart as $carts){
        $itemCode = $carts->product_code;
        $add = array_push($product, Product::getProductFromCode($itemCode));
      } 
    }
    return view('pages.cart')->with('cart', $cart)->with('product', $product)->with('sum', $sum);
  }

  public function addCart(Request $req){
    $itemCode = $_REQUEST['itemCode'];
    $customerId = $_REQUEST['customerId'];
    $checkStock = Product::getProductFromCode($itemCode);
    $checkCart = Cart::getCartValid($itemCode, $customerId);
    $success['status'] = 0;
    $getOrderId = Order::getOrderFromUserId($customerId);
    $i = 0;
    if(count($getOrderId) == 0 && count($checkCart) == 0){
      $openOrder = Order::addOrder($customerId);
      $getOrderId = Order::getOrderFromUserId($customerId);
      $orderId = $getOrderId[$i]->order_id;
      $addCart = Cart::addCart($itemCode, $customerId, $checkStock[0]->price, $orderId);
      $success['status'] = 1;
    }else{
      while($i < count($getOrderId)){
        if($getOrderId[$i]->status == 0){
          $orderId = $getOrderId[$i]->order_id;
          $checkOrder = 0;
        }else{
          $checkOrder = 1;
        }
        $i++;
      }
      if($checkOrder == 0){
        if($checkStock[0]->volume > 0){
          if(count($checkCart) == 0){
            $add = Cart::addCart($itemCode, $customerId, $checkStock[0]->price, $orderId);
          }else if($checkCart[0]->qty > 0){
            $add = Cart::incCart($itemCode, $customerId, $checkCart[0]->qty, $checkStock[0]->price, $checkCart[0]->price);
          }
          $success['status'] = 1;
        }else{
          $success['status'] = 0;
        }
      }
    }
    
    
    return $success;
  }

  public function incCart(Request $req){
    $itemCode = $_REQUEST['itemCode'];
    $customerId = $_REQUEST['customerId'];
    $checkCart = Cart::getCartValid($itemCode, $customerId);
    $checkStock = Product::getProductFromCode($itemCode);
    $success['status'] = 0;
    if($checkStock[0]->volume > 0){
      if($checkCart && $checkCart[0]->qty < $checkStock[0]->volume){
        $inc = Cart::incCart($itemCode, $customerId, $checkCart[0]->qty, $checkStock[0]->price, $checkCart[0]->price);
        $success['status'] = 1;
      }else{
        $success['status'] = 2;
      }
    }
    
    return $success;
  }

  public function decCart(Request $req){
    $itemCode = $_REQUEST['itemCode'];
    $customerId = $_REQUEST['customerId'];
    $checkCart = Cart::getCartValid($itemCode, $customerId);
    $checkStock = Product::getProductFromCode($itemCode);
    $success['status'] = 0;
    if($checkCart && $checkCart[0]->qty != 0){
      $dec = Cart::decCart($itemCode, $customerId, $checkCart[0]->qty, $checkStock[0]->price, $checkCart[0]->price);
      $success['status'] = 1;
    }else{
      $delete = Cart::deleteCart($itemCode, $customerId);
      $success['status'] = 1;
    }

    return $success;
  }

  public function delCart(Request $req){
    $itemCode = $_REQUEST['itemCode'];
    $customerId = $_REQUEST['customerId'];
    $checkCart = Cart::getCartValid($itemCode, $customerId);
    $success['status'] = 0;
    if($checkCart && $checkCart[0]->qty != 0){
      $delete = Cart::deleteCart($itemCode, $customerId);
      $success['status'] = 1;
    }

    return $success;
  }
  
}