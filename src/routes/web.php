<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\MenuController;
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


Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/thanks',[RegisterController::class,'register']);
Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'login']);
Route::get('/logout', [LogoutController::class, 'destroy'])->middleware('auth');
Route::get('/',[ShopController::class,'index']);
Route::get('/shop/search',[ShopController::class,'search']);
Route::get('/detail/{id}',[ShopController::class, 'shopDetail']);
Route::get('/menu',[MenuController::class,'menuView']);
Route::post('/favorite', [UserController::class, 'favorite'])->name('users.favorite');
Route::get('/favorite-delete/{id}',[UserController::class, 'favoriteDelete']);
Route::get('/mypage',[UserController::class,'mypageView']);
Route::post('/reserve/{shop_id}',[UserController::class,'reserveAdd']);
Route::post('/reserve/update/{shop_id}',[UserController::class, 'reserveUpdate']);
Route::get('/reserve-delete/{id}',[UserController::class,'reserveDelete']);