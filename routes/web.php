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
    return view('welcome');
});
Route::get('admin','LoginController@index');
Route::post('admin','LoginController@post');
Route::get('admin/home','LoginController@home');
Route::get('maile',function(){
    return view('maile');
});
Route::get('img',function(){
    return view('admin/imgup');
});
Route::post('img','ImgController@create');
