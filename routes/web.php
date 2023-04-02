<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\ShoppingCart;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::controller(LoginController::class)->group(
    function () {
        Route::post('cekLogin', 'cekLogin')->name('cekLogin');
        Route::get('logout', 'logout')->name('logout');
    }
);

Route::group(['middleware' => 'checkLogin'], function () {

    Route::controller(ProductController::class)->group(
        function () {
            Route::get('/product', 'index')->name('product');
        }
    );
    Route::get('/dashboard', function () {
        return view('Templates.index');
    })->name('dashboard');



    Route::controller(ShoppingCart::class)->group(
        function () {
            Route::get('shoppingCart', 'index')->name('shoppingCart');
        }
    );

    Route::controller(reportController::class)->group(
        function () {
            Route::get('report', 'report')->name('report');
        }
    );
});

Route::get('/', [LoginController::class, 'index'])->name('login');
