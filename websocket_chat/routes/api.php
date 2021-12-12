<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "Api" middleware group. Enjoy building your Api!
|
*/

// Route::middleware('auth:Api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['namespace' => 'Api'],function(){
	Route::get('user/login', 'UserController@login_request');
	Route::post('user/signup', 'UserController@signup_request');

	Route::group(['middleware' => 'auth'],function(){
		
	});
});

