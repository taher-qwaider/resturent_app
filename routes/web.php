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

Route::get('/', function () {
    return view('welcome');
});

Route::get('restaurant/home', [\App\Http\Controllers\home\HomeController::class, 'index']);

Route::post('restaurant/reservation/store', [\App\Http\Controllers\home\ReservationController::class, 'store'])->name('home.reservation.store');
Route::post('restaurant/message/store', [\App\Http\Controllers\home\MessageController::class, 'store'])->name('home.message.store');

Route::get('restaurant/locale/{locale}', [\App\Http\Controllers\home\LangController::class, 'setLocal'])->name('lang.locale');
