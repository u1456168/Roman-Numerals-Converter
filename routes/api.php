<?php

use Illuminate\Http\Request;
use App\record;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/convert/{SearchValue}', 'ConversionAPIController@index');
Route::get('/top', 'ConversionAPIController@showTop');
Route::get('/recent', 'ConversionAPIController@showRecent');
