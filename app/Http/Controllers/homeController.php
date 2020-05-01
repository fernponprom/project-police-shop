<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
use App\Cart;

class homeController extends BaseController{
  public function index(Request $req){
    $check = $req->session()->get('user');
    $customerId = $req->session()->get('id');
    $count = Cart::countCart($customerId);
    $req->session()->put('count', $count);
    return view('pages.home');
  }
}