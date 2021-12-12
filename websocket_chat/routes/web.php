<?php

use Illuminate\Http\Request;
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
Route::group(['middleware' => 'guest'],function(){
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('login_request','UserController@login_request')->name('login_request');
    Route::get('logout','UserController@logout')->name('logout');
});

Route::group(['middleware' => 'auth'],function(){
    Route::get('global','GlobalController@index')->name('global');
});


