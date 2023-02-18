<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;

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
Route::get('/dashboard', [DashboardController::class, 'index']);

// User
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create']);
Route::resource('/user', UserController::class);

// Outlet
Route::get('/outlet', [OutletController::class, 'index']);
Route::get('/outlet/create', [OutletController::class, 'create']);
Route::resource('/outlet', OutletController::class);

// Paket
Route::get('/paket', [PaketController::class, 'index']);
Route::get('/paket/create', [PaketController::class, 'create']);
Route::resource('/paket', PaketController::class);

// Pelanggan
Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/pelanggan/create', [PelangganController::class, 'create']);
Route::resource('/pelanggan', PelangganController::class);

// Transaksi
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::post('/store', [TransaksiController::class, 'store']);


