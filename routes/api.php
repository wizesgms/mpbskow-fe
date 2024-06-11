<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::namespace('Api')->group(function () {
    Route::post('gold_api/user_balance','SeamlesWsController@getUserBalance')->name('user_balance');
    Route::post('gold_api/game_callback','SeamlesWsController@gameCallback')->name('game_callback');
    Route::post('gold_api','SeamlesWsController@gold_api')->name('gold_api');
});
