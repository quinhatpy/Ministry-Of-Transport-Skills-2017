<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', 'Auth\LoginController@login');
        Route::get('logout', 'Auth\LoginController@logout');
    });
    Route::middleware('auth:api')->group(function () {
//        airline
        Route::post('airline', 'AirlineController@storeAirlineCompany');
        Route::post('flight', 'AirlineController@storeAirlineFlight');
        Route::get('flight/{from_date}/{from_city_name}/{to_city_name}', 'AirlineController@indexAirlineFlight');
        Route::post('flight-book', 'AirlineController@bookFlight');
        Route::put('flight/{id}', 'AirlineController@updateAirlineFlight');
        Route::delete('flight/{id}', 'AirlineController@destroyAirlineFlight');
//        hotel
        Route::post('hotel', 'HotelController@store');
        Route::get('hotel/{city_name}', 'HotelController@index');
        Route::post('hotel-book', 'HotelController@book');
        Route::put('hotel/{id}', 'HotelController@update');
        Route::delete('hotel/{id}', 'HotelController@destroy');
//        transaction
        Route::post('transaction', 'TransactionController@store');
    });
});
