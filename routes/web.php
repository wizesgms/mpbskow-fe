<?php

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

Route::namespace('Frontend')->group(function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('promotion', 'HomeController@promotion')->name('promotion');
    Route::get('promotion/{slug}', 'HomeController@promotiondetail')->name('promotiond');
    Route::get('popular', 'HomeController@popular')->name('popular');

    Route::get('slot', 'GameController@slot')->name('slot');
    Route::get('slot/{slug}', 'GameController@game')->name('slots');
    Route::get('casino', 'GameController@casino')->name('slot');
    Route::get('casino/{slug}', 'GameController@game')->name('casinos');

    //route checkuser
    Route::post('userCheck', 'HomeController@check')->name('user.check');
    Route::post('userphone', 'HomeController@phone')->name('user.phone');
    Route::post('usernorek', 'HomeController@norek')->name('user.norek');

    Route::middleware(['auth'])->group(function () {
        Route::get('profile', 'UserController@profile')->name('profile');
        Route::post('profile/update-password', 'UserController@update')->name('update.password');

        Route::get('transaksi', 'TransactionController@transaction')->name('transaksi');

        Route::post('transaksi/deposit', 'TransactionController@posttrx')->name('transaksi.deposit');
        Route::post('transaksi/withdraw', 'TransactionController@withdraw')->name('transaksi.withdraw');

        Route::get('gameIframe', 'GameController@launch_game')->name('launchgame');
    });
});

Route::middleware(['auth'])->namespace('Api')->group(function () {
    Route::get('member/Getbalance2', 'SeamlesWsController@getBalance2')->name('api.balance');
});

Route::namespace('Auth')->group(function () {
    Route::get('member/logout', 'LoginController@logout')->name('member.logout');
});

Auth::routes();
