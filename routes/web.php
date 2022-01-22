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
// Route::get('admin/upload',function(){
//     return view('admin/propertieup');
// });
Route::get('admin/upload','Uppropertie@index');
Route::post('admin/upload','Uppropertie@upload');

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('admin','LoginController@index');
// Route::post('admin','LoginController@post');
// Route::get('admin/home','LoginController@home');
// Route::get('maile',function(){
//     return view('maile');
// });
// Route::get('admin/img',function(){
//     return view('admin/imgup');
// });
// Route::get('admin/images',function(){
//     return view('admin/imagesup');
// });
// Route::post('images','ImagesController@create');
// Route::post('img','ImgController@create');
// Route::get('search','SearchController@index');
