<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PerbandinganController;
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

Route::get('/berita', function () {
    return view('berita/berita');
});

Route::get('/prediksi', function () {
    return view('prediksi');
});

// Route::get('/perbandingan', function () {
//     return view('perbandingan');
// });

Route::get('/perbandingan', [PerbandinganController::class, 'index']);