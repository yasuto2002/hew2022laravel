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
Route::get('serch','SearchController@index');
Route::post('serch','SearchController@post');
Route::get('admin/upload','Uppropertie@index');
Route::post('admin/upload','Uppropertie@upload');
Route::resource('rest','RestappController');
Route::resource('checkmaile','CheckmaileController');
Route::resource('reg','RegController');
Route::resource('auth','AuthenController');
Route::resource('LoginAuth','LoginAuthController');
Route::resource('Wordserch','WordserchController');
Route::resource('Condiserch','CondiserchController');
Route::resource('Detail','DetailController');
Route::resource('Good','GoodController');
Route::resource('Bad','BadController');
Route::resource('Mypage','MypageController');
Route::resource('PasChange','PasChangeController');
Route::resource('UserUpdate','UserUpdateController');
Route::resource('DeleteUser','DeleteUserUpdateController');
Route::resource('Content','ContentController');
Route::resource('GetProperty','GetPropertyController');
Route::resource('GpsSerch','GpsSerchController');
Route::resource('NewArrivals','NewArrivalsController');
Route::resource('Favorites','FavoritesController');
Route::get('/', function () {
    return view('welcome');
});
Route::get('admin','LoginController@index');
Route::post('admin','LoginController@post');
Route::get('admin/home','LoginController@home');
Route::get('maile',function(){
    return view('maile');
});
Route::get('admin/img',function(){
    return view('admin/imgup');
});
Route::get('admin/images',function(){
    return view('admin/imagesup');
});
Route::post('images','ImagesController@create');
Route::post('img','ImgController@create');
Route::get('search','SearchController@index');
