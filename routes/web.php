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
/*
Route::get('/', function () {
    return view('home');
});
*/
Auth::routes();
// Route::get('/Register', function(){
//     return view('auth.register');
//     });

// !@rogUGErj^iOMY^sA3d
Route::get('/home', 'HomeController@index')->name('home');  
Route::get('/', 'HomeController@index');

Route::get('/user', 'UserController@index');
Route::get('/user-register', 'UserController@create');
Route::post('/user-register', 'UserController@store');
Route::get('/user-edit/{id}', 'UserController@edit');

Route::resource('user', 'UserController');
// Route::group(['prefix' => 'agt'], function (){
//     Route::resource('/anggota', 'AnggotaController');
//     Route::get('/cetak_pdf/{$id}', ['uses' => 'AnggotaController@cetak_pdf', 'as' => 'anggota.cetak_pdf']);
// });

Route::resource('anggota', 'AnggotaController');
Route::resource('gerwil', 'GerwilController');
Route::resource('talenta', 'TalentaController');
Route::resource('nikah', 'NikahController');
Route::resource('jabatan', 'JabatanController');

//kepala keluarga
Route::resource('kk', 'kkController');

//Istri
Route::resource('istri', 'IstriController');
Route::get('/detailkk/create/istri/{id}', 'IstriController@tambah_istri');
Route::post('/detailkk/create/istri/simpan', 'IstriController@simpan_istri');
Route::get('/detailkk/status/istri/{id}', 'kkController@sts_istri');
Route::get('/status/update', 'IstriController@updateStatus')->name('istri.update.sts_istri');
//detail kk
Route::resource('detailkk', 'detKkController');
Route::get('/detailkk/index/{id}', 'detKkController@tampil_detkk');
Route::get('/detailkk/create/{id}', 'detKKController@tambah_kk');
Route::get('/detailkk/destroy/{id}', 'detKKController@hapus');

Route::resource('export', 'ExportController');
Route::resource('kategori', 'KategoriController');
Route::resource('bank', 'BankController');
Route::get('/format_kategori', 'KategoriController@format');
Route::post('/import_kategori', 'KategoriController@import');
Route::get('/laporan/excel', 'AnggotaController@laporan_excel')->name('laporan_excel');

Route::resource('list', 'ListController');

Route::resource('transaksi', 'TransaksiController');

Route::resource('transnikah', 'TransNikahController');


Route::resource('transaksi1', 'TransaksiController');
Route::get('/laporan/gwl', 'LaporanController@gerwil');
Route::get('/laporan/gwl/pdf', 'LaporanController@gerwilPdf');

Route::get('/laporan/agt', 'LaporanController@anggota');
Route::get('/laporan/agt/pdf', 'LaporanController@anggotaPdf');

// Talenta
Route::get('/laporan/talenta/pdf', 'LaporanController@talentaPdf');
Route::get('talenta/pdf/{id}', ['as' => 'talenta.laporan', 'uses' => 'TalentaController@cetak_pdf']);

Route::get('/laporan/trs', 'LaporanController@transaksi');
Route::get('/laporan/trs/pdf', 'LaporanController@transaksiPdf');
Route::get('/laporan/trs/excel', 'LaporanController@transaksiExcel');

Route::get('/laporan/kategori', 'LaporanController@kategori');
Route::get('/laporan/kategori/pdf', 'LaporanController@kategoriPdf');
Route::get('/laporan/kategori/excel', 'LaporanController@kategoriExcel');

Route::get('/laporan/dashboard', 'LaporanController@dashboard');
Route::get('/laporan/dashboard/pdf', 'LaporanController@dashboardPdf');

Route::get('/laporan/kk', 'LaporanController@kk');
// Route::get('/laporan/kk/{$id}', 'LaporanController@kkPdf');

Route::get('kk/pdf/{id}', ['as' => 'laporan.kk_pdf', 'uses' => 'kkController@cetak_pdf']);
Route::get('laporan/kk/{id}', ['as' => 'laporan.kk_pdf', 'uses' => 'LaporanController@kkPdf']);
Route::get('kk/bukupernikahan/{id}', ['as' => 'laporan.pernikahan_pdf', 'uses' => 'LaporanController@pernikahanPdf']);

//Download per anggota

// Route::get('/anggota/cetak_pdf', 'AnggotaController@cetak_pdf');

Route::get('anggota/pdf/{id}', ['as' => 'anggota.laporan', 'uses' => 'AnggotaController@cetak_pdf']);
