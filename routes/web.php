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

Route::group(['middleware' => 'locale'], function () {
    // Top page
    Route::get('/', function () {
        // return view('welcome');
        return view('toppage');
    });

    // User
    Route::resource('users', 'UserController');

    // Post
    Route::resource('posts', 'PostController');

    // Foo
    Route::get('foo', function () {
        return 'Foo!';
    });
    Route::get('foo/foo1', 'FooController@foo1');
    Route::get('foo/foo2', 'FooController@foo2');
    Route::get('foo/foo3', 'FooController@foo3');
    Route::get('foo/foo4', 'FooController@foo4');

    // Auth
    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
});