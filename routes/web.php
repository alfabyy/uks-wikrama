<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\RombelController;


use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\StatusController;




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

Route::resource('/rayon', RayonController::class);
Route::resource('/obat', ObatController::class);
Route::resource('/rombel', RombelController::class);
Route::resource('/siswa', SiswaController::class);
Route::resource('/pasien', PasienController::class);
Route::resource('/petugas', PetugasController::class);
Route::resource('/rekam-medis', RekamMedisController::class);

Route::get('/rawat', [StatusController::class, 'index_rawat'])->middleware('auth');
Route::get('/rawat-sementara', [StatusController::class, 'index_rawat_sementara'])->middleware('auth');
Route::get('/dirujuk', [StatusController::class, 'index_dirujuk'])->middleware('auth');
Route::get('/sembuh', [StatusController::class, 'index_sembuh'])->middleware('auth');
Route::get('/cari-siswa', [SiswaController::class, 'search'])->name('siswa.search')->middleware('auth');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/rekam-medis', [RekamMedisController::class, 'index'])->name('rekam-medis.index');
// Route::get('/rekam-medis/search', [RekamMedisController::class, 'search'])->name('rekam-medis.search');
// Route::get('/rekam-medis/{id}', [RekamMedisController::class, 'detail'])->name('rekam-medis.detail');
