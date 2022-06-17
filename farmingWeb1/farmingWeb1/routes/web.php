<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/shop', 'HomeController@shop')->name('home.shop');
Route::get('/detail/{id}', 'HomeController@detail')->name('detail');
Route::get('/shop', 'HomeController@shop')->name('home.shop');
Route::get('/login', 'LogIn@index')->name('login')->middleware('CheckUser');
Route::get('/signin', 'SignIn@index')->name('signin');
Route::post('/signin', 'SignIn@SignUp');
Route::post('/login', 'LogIn@DangNhap');
Route::get('/logout', 'LogIn@logout')->name('logout');
Route::get('/blogs', 'BlogController@show')->name('blogs');
Route::get('/blog_detail/{id}', 'HomeController@blog_detail')->name('blog_detail');
Route::get('/order_shop', 'OrderController@create')->name('order_shop');
Route::get('/order_store/{id}', 'OrderController@store')->name('order_store');

Route::middleware(['CheckLogout'])->group( function () {
    Route::get('/admin', 'AdminConTroller@dashboard')->name('admin.dashboard');
    Route::resources([
        'category' => 'CategoryController',
        'product' => 'ProductController',
        'banner' => 'BannerController',
        'account' => 'AccountController',
        'blog' => 'BlogController',
        'order' => 'OrderController',
        'order_detail' => 'OrderDetailController',
    ]);
});


Route::get('remove_detail/{order_id}/{product_id}', 'OrderDetailController@destroy')->name('remove_detail');
Route::group(['prefix' => 'cart'], function(){
    Route::get('view', 'CartController@view')->name('view');
    Route::get('add/{id}/{user}', 'CartController@add')->name('cart.add');
    Route::get('remove/{id}', 'CartController@remove')->name('cart.remove');
    Route::get('update/{id}', 'CartController@update')->name('cart.update');
    Route::get('clear', 'CartController@clear')->name('cart.clear');
});

