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

Route::get('/', "TopController@index");
Route::get('/login', "LoginController@index");
Route::post('/login/regist', "LoginController@regist");
Route::post('/login/login', "LoginController@login");

Route::get('/main', "MainController@index");
Route::get('/readlist', "ReadlistController@index");
Route::get('/newbook', "NewbookController@index");
Route::post('/newbook/regist', "NewbookController@regist");
Route::post('/readlist/regist', "ReadlistController@regist");
Route::get('/kiroku', "KirokuController@index"); 