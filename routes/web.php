<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;

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

Route::get('/home', [PegawaiController::class, 'home'])->name('home')->middleware('auth');

Route::get('/form-tambah', function () {
    return view('form-tambah');
})->middleware('auth');

Route::post('/tambah', [PegawaiController::class, 'tambah'])->middleware('auth');
Route::get('/hapus-pegawai/{id}', [PegawaiController::class, 'hapus'])->middleware('auth');
Route::get('/ubah-pegawai/{id}', [PegawaiController::class, 'formUbah'])->middleware('auth');
Route::post('/ubah-pegawai', [PegawaiController::class, 'ubah'])->middleware('auth');
Route::get('/download-pdf', [PegawaiController::class, 'downloadPDF']);
