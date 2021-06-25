<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerbandinganController;
use App\Http\Controllers\PrediksiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GraphBeritaController;
use App\Http\Controllers\TesController;
use App\Http\Controllers\ListBeritaController;
// use App\Http\Controllers\GraphBeritaController;
use App\Http\Controllers\StatistikBeritaController;
use App\Http\Controllers\LoadController;

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


Route::get('/', [DashboardController::class, 'index']);

// Route::get('/prediksi', function () {
//     return view('prediksi');
// });
//Route::get('/berita', function () {
//    return view('berita/berita');
//});
Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/list', [ListBeritaController::class, 'index']);
Route::get('/berita/graph', [GraphBeritaController::class, 'index']);
Route::get('/berita/statistik', [StatistikBeritaController::class, 'index']);
Route::get('/berita/cari/', [ListBeritaController::class, 'cariberita']);
Route::get('/berita/cari/{provinsi}', [ListBeritaController::class, 'cariberitaprovinsi']);
Route::get('/berita/cari/{kota}', [ListBeritaController::class, 'cariberitakota']);
Route::get('/berita/list/{provinsi}/{kota}', [ListBeritaController::class, 'indexkota']);
Route::get('/berita/list/{provinsi}', [ListBeritaController::class, 'indexprovinsi']);


Route::get('/tugas', [TesController::class, 'index']);
Route::post('/tugas/adddata/create', [TesController::class, 'store']);
Route::get('/tugas/adddata', [TesController::class, 'create']);
Route::get('/tugas/makemodel', [TesController::class, 'makemodel']);
Route::get('/tugas/logreg', [TesController::class, 'logreg']);
Route::get('/tugas/temukan/', [TesController::class, 'title']);
Route::get('/tugas/temukan/predict', [TesController::class, 'predict']);
// Route::get('/prediksi', function () {
//     return view('prediksi');
// });

// Route::get('/perbandingan', function () {
//     return view('perbandingan');
// });

Route::get('/perbandingan', [PerbandinganController::class, 'index']);
Route::get('/perbandingan/update',[PerbandinganController::class,'update']);
Route::post('/perbandingan/data',[PerbandinganController::class,'data']);
Route::get('/perbandingan/regresi',[PerbandinganController::class,'regresi']);

Route::get('/prediksi', [PrediksiController::class, 'index']);
Route::get('/load', [LoadController::class, 'index']);

Route::get('/load/semua', [LoadController::class, 'all_algo']);
