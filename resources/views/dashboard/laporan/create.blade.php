@extends('dashboard.layouts.main')

@section('content')
<div class="card-content">
    <div class="card-body">

        <form class="form form-vertical" method="post" action="/pelanggan">
            @csrf
            <div class="form-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="first-name-vertical">Tanggal</label>
                            <input type="date" id="first-name-vertical" class="form-control" name="nama"
                                placeholder="Masukkan Nama Lengkap">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="first-name-vertical">Penjualan</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="hp"
                                placeholder="Masukkan Nama Lengkap">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="first-name-vertical">Pembelian</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="hp"
                                placeholder="Masukkan Nama Lengkap">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="first-name-vertical">Pengeluaran</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="hp"
                                placeholder="Masukkan Nama Lengkap">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="first-name-vertical">Pendapatan</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="hp"
                                placeholder="Masukkan Nama Lengkap">
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection
