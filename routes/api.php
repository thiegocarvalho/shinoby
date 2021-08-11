<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register-channel', [\App\Http\Controllers\ChannelController::class, 'registerChannel']);
Route::get('find-channel/{keyword}', [\App\Http\Controllers\ChannelController::class, 'findChannel']);
Route::match(['get', 'post'], '/toyotomi', 'App\Http\Controllers\BotController@handle');

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
