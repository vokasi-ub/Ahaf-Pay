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

Route::get('/', 'IndexController@queri');

Route::get('redirect', 'IndexController@redirect');
Route::get('index', 'IndexController@index');
Route::get('rekap', 'IndexController@rekap');
Route::get('addpay', 'IndexController@tambah');
Route::post('tambah', 'IndexController@add');
Route::get('editpay/{id}', 'IndexController@edit');
Route::post('/updatepay', 'IndexController@update');
Route::get('hapuspay/{id}', 'IndexController@delete');
Route::get('searchpay', 'IndexController@cari');

Route::get('santri', 'SantriController@index');
Route::get('addsantri', 'SantriController@tambah');
Route::post('tambahsantri', 'SantriController@add');
Route::get('editsantri/{id}', 'SantriController@edit');
Route::post('/updatesantri', 'SantriController@update');
Route::get('hapussantri/{id}', 'SantriController@delete');
Route::get('searchsantri', 'SantriController@cari');

Route::get('izin', 'IzinController@index');
Route::get('addizin', 'IzinController@tambah');
Route::post('tambahizin', 'IzinController@add');
Route::get('editizin/{id}', 'IzinController@edit');
Route::post('/updateizin', 'IzinController@update');
Route::get('hapusizin/{id}', 'IzinController@delete');
Route::get('searchizin', 'IzinController@cari');

Route::get('register', 'LoginController@index');
Route::post('/register', 'LoginController@regis');
Route::get('login', 'LoginController@vlog');
Route::post('/login', 'LoginController@store');
Route::get('logout', 'LoginController@destroy');



