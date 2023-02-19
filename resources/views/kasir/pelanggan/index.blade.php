@extends('kasir.layouts.main')

@section('content')
    {{-- Tabel Pelanggan --}}
    <div class="container">
        <div class="card">
            <div class="card-header">
                Tabel Pelanggan
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($pelanggans as $pelanggan )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pelanggan->nama }}</td>
                            <td>{{ $pelanggan->alamat }}</td>
                            <td>{{ $pelanggan->hp }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-6 mb-2">
                                        <div class="d-grid gap-2">
                                            <a href="/pelanggan1/{{ $pelanggan->id }}/edit" class="btn btn-warning">
                                                Edit
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="d-grid gap-2 mb-2">
                                            <form action="/pelanggan1/{{ $pelanggan->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                            <button onclick="return confirm('Kamu Yakin?')" class="btn btn-danger">
                                                Hapus
                                            </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Create Page --}}
    <div class="container">
        <div class="d-grid gap-2">
            <a href="/pelanggan1/create1" style="color:white;" class="btn form-control bg-primary">
                <i class="fa-solid fa-plus"></i> Tambah
            </a>
        </div>
    </div>

    <script>
        //message with toastr
        @if(session()->has('success'))

            alert('{{ session('success') }}', 'BERHASIL!');

        @elseif(session()->has('error'))

            alert('{{ session('error') }}', 'GAGAL!');

        @endif
    </script>
@endsection
