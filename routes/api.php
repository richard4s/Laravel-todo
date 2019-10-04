<?php

use App\Http\Controllers\MainController;
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

Route::get('/', function(Request $request) {
    return "Welcome to the TODO API!";
});

Route::post('/add', 'MainController@create');

Route::put('/edit/{id}', 'MainController@edit');

Route::delete('/destroy/{id}', 'MainController@destroy');

Route::get('/list', 'MainController@show');
