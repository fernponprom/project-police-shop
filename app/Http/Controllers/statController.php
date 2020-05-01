<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
use App\Cart;
use App\Order;
use App\Product;

class statController extends BaseController{
  public function index(Request $req){
    if(empty($req->input('date'))){
      $today = "%".date("Y-m-d")."%";
    }else{
      $today = "%".$req->input('date')."%";
    }

    //chart 7 days
    $week['today'] = "%".date("Y-m-d")."%";
    $week['day2']= "%".date("Y-m-d", strtotime("- 1 days"))."%";
    $week['day3']= "%".date("Y-m-d", strtotime("- 2 days"))."%";
    $week['day4']= "%".date("Y-m-d", strtotime("- 3 days"))."%";
    $week['day5']= "%".date("Y-m-d", strtotime("- 4 days"))."%";
    $week['day6']= "%".date("Y-m-d", strtotime("- 5 days"))."%";
    $week['day7']= "%".date("Y-m-d", strtotime("- 6 days"))."%";
    $sales['today'] = Order::calOrder($today);
    $sales['day2'] = Order::calOrder($week['day2']);
    $sales['day3'] = Order::calOrder($week['day3']);
    $sales['day4'] = Order::calOrder($week['day4']);
    $sales['day5'] = Order::calOrder($week['day5']);
    $sales['day6'] = Order::calOrder($week['day6']);
    $sales['day7'] = Order::calOrder($week['day7']);
  
    //Total sales per week
    $day = date("Y-m-d");
    $presentMonth = substr($day, 5,2);
    $presentYear = substr($day, 0,4);
    $perweek['week1-1'] = $presentYear."-".$presentMonth."-01";
    $perweek['week1-2'] = $presentYear."-".$presentMonth."-07";

    $perweek['week2-1'] = $presentYear."-".$presentMonth."-08";
    $perweek['week2-2'] = $presentYear."-".$presentMonth."-14";

    $perweek['week3-1'] = $presentYear."-".$presentMonth."-15";
    $perweek['week3-2'] = $presentYear."-".$presentMonth."-22";

    $perweek['week4-1'] = $presentYear."-".$presentMonth."-23";
    $perweek['week4-2'] = $presentYear."-".$presentMonth."-30";

    $calPerWeek['week1'] = Order::calOrderPerWeek($perweek['week1-1'], $perweek['week1-2']);
    $calPerWeek['week2'] = Order::calOrderPerWeek($perweek['week2-1'], $perweek['week2-2']);
    $calPerWeek['week3'] = Order::calOrderPerWeek($perweek['week3-1'], $perweek['week3-2']);
    $calPerWeek['week4'] = Order::calOrderPerWeek($perweek['week4-1'], $perweek['week4-2']);
  
    //count order Today
    $orderByDay = Order::getOrderByDay($today);
    $countSuccess = Order::countOrder(2, $today);
    $countHolding = Order::countOrder(1, $today);
    $countCancel = Order::countOrder(3, $today);
    $bestSeller = $this->bestSeller();
    $product = array();
    foreach($bestSeller as $key => $value){
      $getProduct = Product::getProductFromCode($value->product_code);
      $data = array(
        "name" => $getProduct[0]->name,
        "image_url" => $getProduct[0]->image
      );
      $addProduct = array_push($product, $data);
    }
    $count = array(
      "success" => $countSuccess,
      "hold" => $countHolding,
      "cancel" => $countCancel
    );
    return view('pages.stat')->with('count', $count)->with('bestProduct', $product)->with('sales', $sales)->with('order', $orderByDay)->with('day', $week)->with('month', $calPerWeek);
  }

  public function bestSeller(){
    $bestSeller = Cart::bestSeller();
    return $bestSeller;
  }

  public function totalByDate(Request $req){
    $today = "%".$req->input('date')."%";
    $sale = Order::calOrder($today);
    $orderByDay = Order::getOrderByDay($today);
    $countSuccess = Order::countOrder(2, $today);
    $countHolding = Order::countOrder(1, $today);
    $countCancel = Order::countOrder(3, $today);
    $bestSeller = $this->bestSeller();
    $product = array();
    foreach($bestSeller as $key => $value){
      $getProduct = Product::getProductFromCode($value->product_code);
      $data = array(
        "name" => $getProduct[0]->name,
        "image_url" => $getProduct[0]->image
      );
      $addProduct = array_push($product, $data);
    }
    $count = array(
      "success" => $countSuccess,
      "hold" => $countHolding,
      "cancel" => $countCancel
    );

    $endData = array(
      "count" => $count,
      "sales" => $sale
    );
    return json_encode($endData);
  }
}