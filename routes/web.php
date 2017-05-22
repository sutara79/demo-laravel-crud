<?php

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

Route::get('/', function () {
    // return view('welcome');
    return view('toppage');
});

Route::get('user/foo', 'UserController@foo');
Route::get('user/{id}', 'UserController@show');

Route::get('bar', function () {
    return 'Bar!';
});