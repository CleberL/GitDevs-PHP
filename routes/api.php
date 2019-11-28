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

//Route::resource('dev','DevController');
Route::middleware('cors')->group(function(){
    Route::post('dev/{username}', 'DevController@store')->name('store');
    Route::get('dev/', 'DevController@index')->name('index');
    Route::get('dev/{username}', 'DevController@search')->name('search');
    Route::delete('dev/{username}', 'DevController@delete')->name('delete');
 });
