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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/siswa', 'siswaController@index')->name('siswa');
Route::get('/addSiswa', 'siswaController@add')->name('addSiswa');
Route::post('/postSiswa', 'siswaController@postSiswa')->name('postSiswa');
Route::get('/delSiswa/{id}', 'siswaController@delete');
Route::get('/editSiswa/{id}', 'siswaController@edit');
Route::post('/updateSiswa/{id}', 'siswaController@update');

Route::get('/guru', 'guruController@index')->name('guru');
Route::get('/addGuru', 'guruController@add')->name('addGuru');
Route::post('/postGuru', 'guruController@postGuru')->name('postGuru');
Route::get('/delGuru/{id}', 'guruController@delete');
Route::get('/editGuru/{id}', 'guruController@edit');
Route::post('/updateGuru/{id}', 'guruController@update');

Route::get('/Mapel', 'mapelController@index')->name('Mapel');
Route::get('/addMapel', 'mapelController@add')->name('addMapel');
Route::post('/postMapel', 'mapelController@postMapel')->name('postMapel');
Route::get('/delMapel/{id}', 'mapelController@delete');
Route::get('/editMapel/{id}', 'mapelController@edit');
Route::post('/updateMapel/{id}', 'mapelController@update');

Route::get('/Kelas', 'kelasController@index')->name('Kelas');
Route::get('/addKelas', 'kelasController@add')->name('addKelas');
Route::post('/postKelas', 'kelasController@postKelas')->name('postKelas');
Route::get('/delKelas/{id}', 'kelasController@delete');
Route::get('/editKelas/{id}', 'kelasController@edit');
Route::post('/updateKelas/{id}', 'kelasController@update');

Route::get('/Jadwal', 'jadwalController@index')->name('Jadwal');
Route::get('/addJadwal', 'jadwalController@add')->name('addJadwal');
Route::post('/postJadwal', 'jadwalController@postJadwal')->name('postJadwal');
Route::get('/delJadwal/{id}', 'jadwalController@delete');
Route::get('/editJadwal/{id}', 'jadwalController@edit');
Route::post('/updateJadwal/{id}', 'jadwalController@update');

Route::get('/Registrasi', 'registrasiController@index')->name('Registrasi');
Route::get('/addRegistrasi', 'registrasiController@add')->name('addRegistrasi');
Route::post('/postRegistrasi', 'registrasiController@postRegistrasi')->name('postRegistrasi');
Route::get('/delRegistrasi/{id}', 'registrasiController@delete');
Route::get('/editRegistrasi/{id}', 'registrasiController@edit');
Route::post('/updateRegistrasi/{id}', 'registrasiController@update');