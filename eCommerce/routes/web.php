<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('login');
});

Route::get('sign_up', function () {
    return view('sign_up');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::post('/login',[UserController::class,'login']);

Route::get('/my_order',[UserController::class,'my_order']);

Route::post('/sign_up',[UserController::class,'sign_up']);

Route::post('/addtocart',[UserController::class,'add_to_cart']);

Route::get('/index',[UserController::class,'index']);

Route::get('/cart_item',[UserController::class,'cart_item']);

Route::get('/details/{id}',[UserController::class,'details']);

Route::get('/removetocart/{id}',[UserController::class,'removetocart']);

Route::get('/order_now',[UserController::class,'order_now']);

Route::post('/place_order',[UserController::class,'place_order']);

