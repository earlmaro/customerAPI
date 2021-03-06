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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/customer', 'CustomersController@index');

Route::get('/customer/{id}', 'CustomersController@show');

Route::post('/customer', 'CustomersController@store');
Route::put('/customer/{id}', 'CustomersController@update');

Route::delete('/customer/{id}', 'CustomersController@destroy');




