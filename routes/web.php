<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PerbandinganController;
use App\Http\Controllers\PrediksiController;
use App\Http\Controllers\BeritaController;
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

Route::get('/', function () {
    return view('dashboard');
});

// Route::get('/prediksi', function () {
//     return view('prediksi');
// });
//Route::get('/berita', function () {
//    return view('berita/berita');
//});
Route::get('/berita', [BeritaController::class, 'index']);

// Route::get('/prediksi', function () {
//     return view('prediksi');
// });

// Route::get('/perbandingan', function () {
//     return view('perbandingan');
// });

Route::get('/perbandingan', [PerbandinganController::class, 'index']);
Route::get('/perbandingan/update',[PerbandinganController::class,'update']);

Route::get('/prediksi', [PrediksiController::class, 'index']);
Route::get('/load', [LoadController::class, 'index']);

Route::get('/load/semua', [LoadController::class, 'all_algo']);
