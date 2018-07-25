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

Route::get('/', 'BlogController@home');

Route::get('post/{slug}', 'BlogController@show');


Route::get('/COD', function(){
	return view('lineup/cod');
});

Route::get('/Fifa', function(){
	return view('lineup/fifa');
});

Route::get('/Fortnite', function(){
	return view('lineup/fortnite');
});

Route::get('/LoL', function(){
	return view('lineup/lol');
});

Route::get('/Overwatch', function(){
	return view('lineup/overwatch');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
