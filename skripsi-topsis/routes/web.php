<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route halaman tampilan awal
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'WelcomeController@index')->name('welcome');


// Auth::routes();
Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::group(['prefix' => 'Administrator', 'middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    // Route Halaman Dashboard

    // Route Karyawan ( Create, Edit, Delete, Update, Show )
    Route::resource('karyawan', 'KaryawanController')->except(['create', 'show']);
    // Trash Karyawan
    Route::get('karyawan/trash/', 'KaryawanController@trash')->name('karyawan.trash');
    Route::get('Karyawan/deleted/{id}/', 'KaryawanController@deleted')->name('karyawan.deleted');
    Route::get('Karyawan/restore/{id}/', 'KaryawanController@restore')->name('karyawan.restore');
    Route::get('Karyawan/restore_all/', 'KaryawanController@restore_all')->name('karyawan.restore_all');

    // Route Kriteria ( Create, Edit, Delete, Update, Show )
    Route::resource('kriteria', 'KriteriaController')->except(['create', 'show']);

    // Route Nilai Master ( Create, Edit, Delete, Update, Show )
    Route::resource('nilai', 'NilaiController')->except(['show']);
    Route::post('nilai/import_excel', 'NilaiController@import_excel')->name('nilai.import_excel');
    Route::post('nilai', 'NilaiController@hitungTopsis');

    // Route Inisial ( Create, Edit, Delete, Update, Show )
    Route::resource('nilai_insial', 'NilaiInisialController')->except(['create', 'show']);

    // Route Hasil Topsis ( Create, Edit, Delete, Update, Show )
    Route::resource('hasil_topsis', 'HasilTopsisController')->except(['create', 'update', 'delete']);
    Route::get('normalisasi', 'TopsisNormalisasiController@index')->name('normalisasi.index');
    Route::post('normalisasi', 'TopsisNormalisasiController@store')->name('normalisasi.store');
    Route::post('bobot', 'TopsisBobotController@store')->name('bobot.store');
    Route::post('ideal', 'TopsisIdealController@store')->name('ideal.store');
    Route::post('jarak', 'TopsisJarakController@store')->name('jarak.store');
    Route::post('preferensi', 'TopsisPreferensiController@store')->name('preferesnsi.store');


    // Route Hasil Bonus ( Create, Edit, Delete, Update, Show )
    Route::resource('hasil_bonus', 'HasilBonusController')->except(['create', 'show', 'update']);
    // fungsi except untuk tidak ditampilkannya function 'create','show';

    // Import csv Siswa
    Route::resource('siswa', 'SiswaController');
    Route::post('siswa/import_excel', 'SiswaController@import_excel')->name('siswa.import_excel');
});
