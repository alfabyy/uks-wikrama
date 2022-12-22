<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PasienController;

use App\Http\Controllers\PetugasController;

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

Route::resource('/rayon', RayonController::class);
Route::resource('/obat', ObatController::class);
Route::resource('/rombel', RombelController::class);

Route::resource('/siswa', SiswaController::class);
Route::resource('/pasien', PasienController::class);

Route::resource('/petugas', PetugasController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
