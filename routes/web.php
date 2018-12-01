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

Route::get('/', 'ContactController@index');
Route::get('/contacts', 'ContactController@index');
Route::post('/contact', 'ContactController@create');
Route::delete('/contact/{contact}', 'ContactController@destroy');

Route::delete('/auth/logout', 'Auth\AuthController@getLogout');
Auth::routes();
