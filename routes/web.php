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

Route::get('/mapel', 'mapelController@index')->name('Mapel');
Route::get('/addMapel', 'mapelController@add')->name('addMapel');
Route::post('/postMapel', 'mapelController@postMapel')->name('postMapel');
Route::get('/delMapel/{id}', 'mapelController@delete');
Route::get('/editMapel/{id}', 'mapelController@edit');
Route::post('/updateMapel/{id}', 'mapelController@update');

Route::get('/kelas', 'kelasmapelController@index')->name('Kelas');
Route::get('/addKelas', 'kelasmapelController@add')->name('addKelas');
Route::post('/postKelas', 'kelasmapelController@postKelas')->name('postKelas');
Route::get('/delKelas/{id}', 'kelasmapelController@delete');
Route::get('/editKelas/{id}', 'kelasmapelController@edit');
Route::post('/updateKelas/{id}', 'kelasmapelController@update');

Route::get('/jadwal', 'jadwalController@index')->name('Jadwal');
Route::get('/addJadwal', 'jadwalController@add')->name('addJadwal');
Route::post('/postJadwal', 'jadwalController@postJadwal')->name('postJadwal');
Route::get('/delJadwal/{id}', 'jadwalController@delete');
Route::get('/editJadwal/{id}', 'jadwalController@edit');
Route::post('/updateJadwal/{id}', 'jadwalController@update');

Route::get('/registrasi', 'registrasiController@index')->name('Registrasi');
Route::get('/detailRegist/{id}', 'registrasiController@detail')->name('detailKelas');
Route::post('/addRegistrasi/{id}', 'registrasiController@add')->name('addRegist');
Route::get('/hapusRegis/{ids}/{idk}', 'registrasiController@del')->name('hapusRegis');
Route::get('/editNilai/{ids}/{idk}', 'registrasiController@edit')->name('editNilai');
Route::post('/postNilai', 'registrasiController@update')->name('postNilai');
Route::post('/postRegistrasi', 'registrasiController@postRegistrasi')->name('postRegistrasi');
Route::get('/delRegistrasi/{id}', 'registrasiController@delete');
Route::get('/editRegistrasi/{id}', 'registrasiController@edit');
Route::post('/updateRegistrasi/{id}', 'registrasiController@update');

Route::get('/presensi', 'presensiController@index')->name('presensi');
Route::get('/detailPresensiKelas/{id}', 'presensiController@detailPresensiKelas')->name('detailPresensiKelas');
Route::get('/detailPresensi/{idk}/{pk}', 'presensiController@detailPresensi')->name('detailPresensi');
Route::get('/tambahPertemuan/{id}', 'presensiController@tambahPertemuan')->name('tambahPertemuan');
Route::get('/present/{id}', 'presensiController@present')->name('present');
Route::get('/cancel/{id}', 'presensiController@cancel')->name('cancel');
Route::get('/addPresensi', 'presensiController@add')->name('addPresensi');
Route::post('/postPresensi', 'presensiController@post')->name('postPresensi');
Route::get('/delPresensi/{id}', 'presensiController@delete');
Route::get('/editPresensi/{id}', 'presensiController@edit');
Route::post('/updatePresensi/{id}', 'presensiController@update');

Route::get('/nilai', 'registrasiController@nilai')->name('nilai');
Route::get('/cetakNilai/{id}', 'registrasiController@cetakNilai')->name('cetakNilai');