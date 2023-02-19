<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Outlet;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard', [
            'title' => 'Dashboard',
            'deskripsi' => 'Halaman berisi informasi singkat mengenai data-data di dalam sistem kasir Dry and Clean',
            'user' => User::count(),
            'pelanggan' => Pelanggan::count(),
            'transaksi' => Transaksi::count(),
            'outlet' => Outlet::count()
        ]);
    }
    public function index1() {
        return view('dashboardkasir', [
            'title' => 'Dashboard',
            'deskripsi' => 'Halaman berisi informasi singkat mengenai data-data di dalam sistem kasir Dry and Clean',
            'user' => User::count(),
            'pelanggan' => Pelanggan::count(),
            'transaksi' => Transaksi::count(),
            'outlet' => Outlet::count()
        ]);
    }
}
