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

Route::get('test-session', function () {
    session(['foo' => 'こんにちはこんにちは!!']);
    return session('foo');
});

// Auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Custom Error
Route::get('custom-error', function () {
    abort('404');
});

// List global functions
Route::get('foo/except-for-helpers', function() {
    $arrDocs = [
        // Exist in documents
        'array_add',
        'array_collapse',
        'array_divide',
        'array_dot',
        'array_except',
        'array_first',
        'array_flatten',
        'array_forget',
        'array_get',
        'array_has',
        'array_last',
        'array_only',
        'array_pluck',
        'array_prepend',
        'array_pull',
        'array_set',
        'array_sort',
        'array_sort_recursive',
        'array_where',
        'array_wrap',
        'head',
        'last',
        'app_path',
        'base_path',
        'config_path',
        'database_path',
        'mix',
        'public_path',
        'resource_path',
        'storage_path',
        'camel_case',
        'class_basename',
        'e',
        'ends_with',
        'kebab_case',
        'snake_case',
        'str_limit',
        'starts_with',
        'str_after',
        'str_before',
        'str_contains',
        'str_finish',
        'str_is',
        'str_plural',
        'str_random',
        'str_singular',
        'str_slug',
        'studly_case',
        'title_case',
        'trans',
        'trans_choice',
        'action',
        'asset',
        'secure_asset',
        'route',
        'secure_url',
        'url',
        'abort',
        'abort_if',
        'abort_unless',
        'auth',
        'back',
        'bcrypt',
        'cache',
        'collect',
        'config',
        'csrf_field',
        'csrf_token',
        'dd',
        'dispatch',
        'env',
        'event',
        'factory',
        'info',
        'logger',
        'method_field',
        'old',
        'redirect',
        'request',
        'response',
        'retry',
        'session',
        'value',
        'view',
        // Not exist in documents.
        'append_config',
        'array_random',
        'class_uses_recursive',
        'data_fill',
        'data_get',
        'data_set',
        'object_get',
        'preg_replace_array',
        'str_replace_array',
        'str_replace_first',
        'str_replace_last',
        'tap',
        'trait_uses_recursive',
        'windows_os',
        'with',
        'app',
        'broadcast',
        'cookie',
        'decrypt',
        'elixir',
        'encrypt',
        'policy',
        'resolve',
        '__',
        'validator',
    ];
    $arrFunc = get_defined_functions();
    $diff = array_diff($arrFunc['user'], $arrDocs);
    $return = '';
    foreach ($diff as $val) {
        $return .= '`'.$val.'`, ';
    }
    return $return;
});