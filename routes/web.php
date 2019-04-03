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

Route::get('index', 'IndexController@index');
Route::get('addpay', 'IndexController@tambah');
Route::post('tambah', 'IndexController@add');
Route::get('editpay/{id}', 'IndexController@edit');
Route::post('/updatepay', 'IndexController@update');
Route::get('hapuspay/{id}', 'IndexController@delete');

Route::get('santri', 'SantriController@index');
Route::get('addsantri', 'SantriController@tambah');
Route::post('tambahsantri', 'SantriController@add');
Route::get('editsantri/{id}', 'SantriController@edit');
Route::post('/updatesantri', 'SantriController@update');
Route::get('hapussantri/{id}', 'SantriController@delete');


