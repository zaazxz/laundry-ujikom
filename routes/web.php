<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PelangganController1;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;

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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'gas']);

Route::post('/logout', [AuthController::class, 'keluar']);

route::group(['middleware' => ['auth', 'login:admin,kasir,owner']], function () {
    Route::get('/redirect', [AuthController::class, 'cek']);
});

route::group(['middleware' => ['auth','login:admin']], function () {

// Dashboard
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

Route::get('/laporan', [LaporanController::class, 'index']);
Route::get('/laporan/create', [LaporanController::class, 'create']);
Route::resource('/laporan', LaporanController::class);

});

route::group(['middleware' => ['auth','login:kasir']], function () {

Route::get('/1', [DashboardController::class, 'index1']);
Route::get('/dashboard1', [DashboardController::class, 'index1']);

// Pelanggan
Route::get('/pelanggan1', [PelangganController1::class, 'index']);
Route::get('/pelanggan1/create1', [PelangganController1::class, 'create']);
Route::resource('/pelanggan1', PelangganController1::class);

// Transaksi
Route::get('/transaksi1', [TransaksiController::class, 'index1']);
Route::post('/store1', [TransaksiController::class, 'store1']);
});

// route::group(['middleware' => ['auth','login:owner']], function () {

// Route::get('/2', [DashboardController::class, 'index2']);
// Route::get('/dashboard2', [DashboardController::class, 'index2']);

// });
