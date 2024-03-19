<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminLogoutController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\Manager\ManagerRegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\StoreManagerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Manager\ManagerLoginController;
use App\Http\Controllers\Manager\ManagerLogoutController;

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
Route::get('/thanks', [RegisterController::class, 'register']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/thanks');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LogoutController::class, 'destroy']);

Route::get('/', [ShopController::class, 'index']);
Route::get('/shop/search', [ShopController::class, 'search']);
Route::get('/detail/{id}', [ShopController::class, 'shopDetail']);
Route::get('/menu', [MenuController::class, 'menuView']);
Route::post('/favorite', [UserController::class, 'favorite'])->name('users.favorite');
Route::get('/favorite-delete/{id}', [UserController::class, 'favoriteDelete']);
Route::get('/mypage', [UserController::class, 'mypageView']);

Route::group(['prefix' => 'reserve'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::post('{shop_id}', [UserController::class, 'reserveAdd']);
        Route::post('update/{shop_id}', [UserController::class, 'reserveUpdate']);
        Route::get('delete/{id}', [UserController::class, 'reserveDelete']);
    });
});

Route::get('/review/{id}', [UserController::class, 'reviewIndex']);
Route::post('/review/{id}', [UserController::class, 'reviewAdd']);

Route::group(['prefix' => 'admin'], function () {
    Route::get('register', [AdminRegisterController::class, 'create'])
        ->name('admin.register');
    Route::post('register', [AdminRegisterController::class, 'store']);

    Route::get('login', [AdminLoginController::class, 'index'])
        ->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'login']);

    Route::get('logout', [AdminLogoutController::class, 'destroy']);

    Route::get('menu', [AdminController::class, 'showMenu']);

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('admin-page', [AdminController::class, 'index'])
            ->name('admin.page');
        Route::post('area/add', [AdminController::class, 'areaAdd']);
        Route::post('genre/add', [AdminController::class, 'genreAdd']);
    });
});

Route::group(['prefix' => 'manager'], function () {
    Route::post('register', [ManagerRegisterController::class, 'store']);

    Route::get('login', [ManagerLoginController::class, 'index'])
        ->name('manager.login');
    Route::post('login', [ManagerLoginController::class, 'login']);

    Route::get('logout', [ManagerLogoutController::class, 'destroy']);

    Route::get('menu', [StoreManagerController::class, 'showMenu']);

    Route::middleware(['auth:store_manager'])->group(function () {
        Route::get('shop-data', [StoreManagerController::class, 'index']);
        Route::post('shop-data/add', [StoreManagerController::class, 'shopDataAdd']);
    });
});
