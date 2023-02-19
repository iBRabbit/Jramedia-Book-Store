<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
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

Route::get('/register', [RegisterController::class, 'index']) -> middleware('guest');
Route::post('/register', [RegisterController::class, 'store']) -> middleware('guest');
Route::get('/login', [LoginController::class, 'index']) ->  name('login') -> middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']) ->  name('login') -> middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']) -> middleware('auth');

Route::get('/products', [ProductController::class, 'index']) -> middleware('auth');
Route::get('/products/add', [ProductController::class, 'add']) -> middleware('auth');
Route::post('/products/add', [ProductController::class, 'store']) -> middleware('auth');