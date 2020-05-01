<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'homeController@index');
Route::get('/login', 'loginController@index');
Route::get('/shop', 'shopController@index');
Route::get('/product', 'productController@index');
Route::get('/product/{product_name}', ['uses' => 'productDetailController@index', 'as' => 'name']);
Route::get('/shop/{type}', ['uses' => 'shopController@index', 'as' => 'type']);
// Route::get('/shop/{type}', ['uses' => 'shopController@index', 'as' => 'type']);
// Route::post('/image-upload', 'productController@addImage')->name('image.upload.post');
Route::get('/contact', 'contactController@index');
Route::get('/manage', 'manageController@index');
Route::get('/err', 'errController@index');
Route::get('/getData/{data}', 'productDetailController@getData');
Route::get('/user', 'userController@index');
Route::get('/user/{data}', 'userController@getUser');
Route::get('/cart', 'cartController@index');
Route::get('/orderlist', 'orderController@index');
Route::get('/orderlist_all', 'orderController@orderListAll');
Route::get('/order/{data}', 'orderController@orderDetail');


Route::post('/login', 'loginController@login');
Route::get('/logout', 'loginController@logout');
Route::post('/addProduct', 'productController@addProduct');
Route::get('/register', 'registerController@index');
Route::post('/register', 'registerController@register');
Route::post('/deleteProduct', 'productController@deleteProduct');
Route::post('/editProduct', 'productController@editProduct');
Route::post('/editUser', 'userController@updateUser');
Route::post('/deleteUser', 'userController@deleteUser');
Route::post('/addCart', 'cartController@addCart');
Route::post('/incCart', 'cartController@incCart');
Route::post('/decCart', 'cartController@decCart');
Route::post('/delCart', 'cartController@delCart');
Route::post('/payment', 'orderController@summaryOrder');
Route::post('/paysuccess', 'orderController@paymentSuccess');
Route::post('/payfail', 'orderController@paymentFail');

Route::get('/bestseller', 'statController@index');
Route::get('/statbydate', 'statController@totalByDate');

