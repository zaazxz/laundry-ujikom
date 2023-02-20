@extends('dashboard.layouts.main')

@section('content')
    {{-- Tabel Pelanggan --}}
    <div class="container">
        <div class="card">
            <div class="card-header">
                Tabel Laporan/Hari
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-outline-success float-end me-2"><i class="fa-solid fa-print"></i>Export PDF</button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Transaksi</th>
                            <th>Pemasukan</th>
                            <th>Pengeluaran</th>
                            <th>Total Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>
                            {{-- @foreach ($pelanggans as $pelanggan ) --}}
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Create Page --}}
    <div class="container">
        <div class="d-grid gap-2">
            <a href="/laporan/create" style="color:white;" class="btn form-control bg-primary">
                <i class="fa-solid fa-plus"></i> Tambah
            </a>
        </div>
    </div>
@endsection
