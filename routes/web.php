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

Route::get('/', ['uses'=>'AdminController@getIndex']);
Route::get('login',['uses'=>'AdminController@getLoginAdmin']);
Route::post('login',['uses'=>'AdminController@postLoginAdmin']);

Route::get('logout',['uses' => 'AdminController@getLogout']);


//-----------------------------------------------------------------

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function (){
	Route::group(['prefix'=>'news'],function(){
		Route::get('list', ['as'=>'admin.news.getList','uses' => 'AdminController@getList']);

		Route::get('insert',['as'=>'admin.news.getInsert','uses' => 'AdminController@getInsert']);
		Route::post('insert',['as'=>'admin.news.postInsert','uses' => 'AdminController@postInsert']);

		Route::get('edit/{id}',['as'=>'admin.news.getEdit','uses' => 'AdminController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.news.postEdit','uses' => 'AdminController@postEdit']);

		Route::get('delete/{id}',['as'=>'admin.news.getDelete','uses' => 'AdminController@getDelete']);
	});
	Route::group(['prefix'=>'user'],function(){
		Route::get('list', ['as'=>'admin.user.getList','uses' => 'UserController@getList']);

		Route::get('insert',['as'=>'admin.user.getInsert','uses' => 'UserController@getInsert']);
		Route::post('insert',['as'=>'admin.user.postInsert','uses' => 'UserController@postInsert']);

		Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses' => 'UserController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses' => 'UserController@postEdit']);

		Route::get('delete/{id}',['as'=>'admin.user.getDelete','uses' => 'UserController@getDelete']);
	});
});