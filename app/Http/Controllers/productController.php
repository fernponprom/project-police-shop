<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
use App\Product;

class productController extends BaseController
{
    private $image_name;
    public function index(){
      return view('pages.product');
    }

    function createRandomCode($data) { 

        $date = Date("d/m/Y h:i:sa");
        $hash = md5($data.$date);
        $code = substr($hash, 22);
  
      return $code; 
  
    } 

    public function addImage(Request $req){
      
    }

    public function addProduct(Request $req){
      request()->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
      ]);
      $imageName = time().'.'.request()->image->getClientOriginalExtension();
      request()->image->move(public_path('images'), $imageName);
      // return back()->with('success','You have successfully upload image.')->with('image',$imageName);
      $name = $req->input('product_name');
      $type = $req->input('product_type');
      $color = $req->input('product_color');
      $brand = $req->input('product_brand');
      $size = $req->input('product_size');
      $volume = $req->input('product_volume');
      $price = $req->input('product_price');
      $description = $req->input('product_description');
      $image = 'http://localhost:8000/police-shop/police-shop/public/images/'.$imageName;
      $product_code = $this->createRandomCode($name);
      $addProduct = DB::table('products')->insert([
        'name' => $name,
        'type' => $type,
        'color' => $color,
        'brand' => $brand,
        'size' => $size,
        'volume' => $volume,
        'price' => $price,
        'image' => $image,
        'code' => $product_code,
        'description' => $description
      ]);
      if($addProduct == 1){
        return redirect()->action('productController@index');
      }else{
        return '<script>alert("ไม่สามารถเพิ่มสินค้าได้");</script>';
      }
    }

    function deleteProduct(Request $req){
      $code = $_REQUEST['code'];
      $delete = Product::deleteProduct($code);
      return $delete;
      
    }

    function editProduct(Request $req){
      $code = $_REQUEST['code'];
      $name = $_REQUEST['name'];
      $type = $_REQUEST['type'];
      $color = $_REQUEST['color'];
      $brand = $_REQUEST['brand'];
      $size = $_REQUEST['size'];
      $volume = $_REQUEST['volume'];
      $price = $_REQUEST['price'];

      $update = Product::updateProduct($code, $name, $type, $color, $size, $brand, $volume, $price);
      return $update;
    }
}
