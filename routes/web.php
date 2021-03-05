<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PerbandinganController;
<<<<<<< HEAD
use App\Http\Controllers\PrediksiController;
=======
use App\Http\Controllers\BeritaController;
>>>>>>> 92f6c85c639c6fe79cf7843c4e7f56ef0310b321
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

<<<<<<< HEAD
// Route::get('/prediksi', function () {
//     return view('prediksi');
// });
=======
//Route::get('/berita', function () {
//    return view('berita/berita');
//});
Route::get('/berita', [BeritaController::class, 'index']);

Route::get('/prediksi', function () {
    return view('prediksi');
});
>>>>>>> 92f6c85c639c6fe79cf7843c4e7f56ef0310b321

// Route::get('/perbandingan', function () {
//     return view('perbandingan');
// });

Route::get('/perbandingan', [PerbandinganController::class, 'index']);
Route::get('/prediksi', [PrediksiController::class, 'index']);