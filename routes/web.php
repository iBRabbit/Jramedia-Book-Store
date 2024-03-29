<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
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
    return view('home', [
        'title' => 'Home',
        'active' => 'home'
    ]);
}) -> middleware('auth');

Route::get('/about',function (){
    return view('about',[
        'title' => 'About',
        'active' => 'about'
    ]);
}) -> middleware('guest');

Route::get('/register', [RegisterController::class, 'index']) -> middleware('guest');
Route::post('/register', [RegisterController::class, 'store']) -> middleware('guest');
Route::get('/login', [LoginController::class, 'index']) ->  name('login') -> middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']) ->  name('login') -> middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']) -> middleware('auth');

Route::resource('/cart', CartController::class) -> middleware('user');
Route::post('/products/cart/{product}', [CartController::class, 'addCart']) -> middleware('auth');
Route::post('/cart/checkout', [CartController::class, 'checkout']) -> middleware('auth');

Route::resource('/products', ProductController::class) -> middleware('auth');
Route::resource('/users', UserController::class) -> middleware('admin');

Route::get('/transactions', [TransactionController::class, 'index']) -> middleware('admin');