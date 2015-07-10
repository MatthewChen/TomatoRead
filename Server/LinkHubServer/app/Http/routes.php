<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('','IndexController@index');
Route::get('topic','TopicController@index');

Route::group(['prefix'=>'home','namespace'=>'User','middleware'=>'auth'],function(){
    Route::get('','IndexController@index');

    Route::resource('category','CategoryController');
    Route::post('category/{id}/order/inc','CategoryController@orderInc');
    Route::post('category/{id}/order/dec','CategoryController@orderDec');

    Route::resource('group','GroupController');
    Route::post('group/{id}/order/inc','GroupController@orderInc');
    Route::post('group/{id}/order/dec','GroupController@orderDec');

    Route::resource('link','LinkController');

    Route::get('setting','SettingController@index');
});

Route::controllers([
    'auth'=>'Auth\AuthController',
    'password'=>'Auth\PasswordController'
]);

Route::group(['prefix'=>'api','namespace'=>'Api'],function(){
    Route::post("login","AuthController@login");

});