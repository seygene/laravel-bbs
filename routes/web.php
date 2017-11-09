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

Route::resource('articles', 'ArticlesController');

/*
DB::listen(function ($query) {
    var_dump($query->sql);
});
*/

Route::get('tags/{slug}/articles', [
    'as'   => 'tags.articles.index',
    'uses' => 'ArticlesController@index'
]);

Route::get('/', 'WelcomeController@index');

Route::get('/home', 'HomeController@index');

/* User Registration */
Route::get('auth/register', [
    'as'   => 'users.create',
    'uses' => 'UsersController@create'
]);

Route::post('auth/register', [
    'as'   => 'users.store',
    'uses' => 'UsersController@store'
]);

Route::get('auth/confirm/{code}', [
    'as'   => 'users.confirm',
    'uses' => 'UsersController@confirm'
])->where('code', '[\pL-\pN]{60}');

/* User login/logout */
Route::get('auth/login', [
    'as'   => 'sessions.create',
    'uses' => 'SessionsController@create'
]);

Route::post('auth/login', [
    'as'   => 'sessions.store',
    'uses' => 'SessionsController@store'
]);

Route::get('auth/logout', [
    'as'   => 'sessions.destroy',
    'uses' => 'SessionsController@destroy'
]);

/* Password Reset */
Route::get('auth/remind', [
    'as'   => 'remind.create',
    'uses' => 'PasswordsController@getRemind'
]);

Route::post('auth/remind', [
    'as'   => 'remind.store',
    'uses' => 'PasswordsController@postRemind'
]);

Route::get('auth/reset/{token}', [
    'as'   => 'reset.create',
    'uses' => 'PasswordsController@getReset'
]);

Route::post('auth/reset', [
    'as'   => 'reset.store',
    'uses' => 'PasswordsController@postReset'
]);
