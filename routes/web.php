<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AtasanController;
use App\Http\Controllers\ExportPesananController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\KendaraanController;

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

// Authenticate
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Homepage
Route::get('/homepage', [HomepageController::class, 'index'])->middleware('auth:web');

//Grafik
Route::get('/dashboard/grafik', [GrafikController::class, 'index'])->name('grafik')->middleware('auth:web');

// Kendaraan
Route::resource('/dashboard/kendaraan', KendaraanController::class)->middleware('auth:web');

// Pesanan
Route::resource('/dashboard/pesanan', PesananController::class)->middleware('auth:web');

// Export Pesanan
Route::get('/Exel-export', [ExportPesananController::class, 'export']);

// Atasan
Route::get('/atasan', [AtasanController::class, 'index'])->name('atasan')->middleware('auth:atasan');
Route::post('/atasan/{pesanan:id}/izin', [AtasanController::class, 'izin'])->name('izin')->middleware('auth:atasan');

