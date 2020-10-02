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

Route::get('login','userController@login');
Route::post('login_details','userController@login_details');

Route::get('dashboard','userController@dashboard');
Route::post('/add','userController@add');
Route::post('edit','userController@edit');
Route::get('delete/{id}','userController@delete');
Route::get('get_id','userController@get_id');
Route::get('logout','userController@logout');
