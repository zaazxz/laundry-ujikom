@extends('dashboard.layouts.main')

@section('content')
    {{-- Tabel --}}
    <div class="container">
        <div class="card">
            <div class="card-header">
                List Tabel Paket
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>Jenis Cucian</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($pakets as $paket)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $paket->nama }}</td>
                                <td>{{ $paket->jenis }}</td>
                                <td>{{ $paket->harga }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <div class="d-grid gap-2">
                                                <a href="/paket/{{ $paket->id }}/edit" class="btn btn-warning">
                                                    Edit
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <form action="/paket/{{ $paket->id }}" method="post">
                                                <div class="d-grid gap-2 mb-2">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger">
                                                        Hapus
                                                    </button>
                                                </div>
                                            </form>
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
            <a href="/paket/create" class="btn form-control bg-primary" style="color: white;">
                <i class="fa-solid fa-plus"></i> Tambah
            </a>
        </div>
    </div>

    <script>
        //message with toastr
        @if (session()->has('success'))

            alert('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            alert('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endsection
