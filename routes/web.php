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

// Route::get('user/foo', 'UserController@foo');
// Route::get('user/edit/{id}', 'UserController@editGet');
// Route::post('user/edit/{id}', 'UserController@editPost');
// Route::get('user/{id}', 'UserController@show');
// Route::get('user', 'UserController@all');


Route::resource('users', 'UserController');

Route::get('foo', function () {
    return 'Foo!';
});
Route::get('foo/foo1', 'FooController@foo1');
Route::get('foo/foo2', 'FooController@foo2');
Route::get('foo/foo3', 'FooController@foo3');
Route::get('foo/foo4', 'FooController@foo4');