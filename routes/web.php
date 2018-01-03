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

Auth::routes();

Route::group(['middleware'=>['auth']], function () {
	Route::resource('supplier','SupplierController');
	Route::resource('karyawan','KaryawanController');
	Route::resource('barang','BarangController');
	Route::resource('tran_masuk','TranMasukController');
	Route::resource('tran_keluar','TranKeluarController');
});
Route::get('/home', 'HomeController@index')->name('home');