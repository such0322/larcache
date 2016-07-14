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

Route::get('/', "IndexController@index");
Route::get("list","PostController@index");
Route::get("post/create","PostController@create");
Route::get("post/random","PostController@showRandom");
Route::get("post/{id}","PostController@show");
