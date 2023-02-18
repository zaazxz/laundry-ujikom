@extends('dashboard.layouts.main')

@section('content')
    {{-- Search Bar --}}
    <div class="container">
        <form action="/karyawan">
            <div class="input-group mb-3">
                <button class="btn btn-primary" type="submit" id="button-addon1">
                    <i class="fa-solid fa-magnifying-glass"></i> Cari
                </button>
                <input type="text" class="form-control" placeholder="Cari Pengguna"
                    name="search"value="{{ request('search') }}">
            </div>
        </form>
    </div>

    {{-- Kelola Pengguna --}}
    <div class="container">
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4">
                    <div class="card">
                        @if ($user->gambar)
                            <img src="{{ asset('storage/' . $user->gambar) }}" alt="" srcset="" class="rounded-top" style="max-height: 300px;"">
                        @else
                            <img src="{{ asset('img/person.png') }}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <div class="text-center">
                                <h3 class="">{{ $user->nama }}</h3>
                                <p class="mb-1">{{ $user->outlet->nama }}</p>
                                <small class="text-muted">{{ $user->level }}</small>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6 my-1">
                                    <div class="d-grid gap-2">
                                        <a class="btn btn-warning me-md-2" type="button"
                                            href="/user/{{ $user->id }}/edit">
                                            <i class="fa-solid fa-pen-to-square"></i> Ubah
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 my-1">
                                    <div class="d-grid gap-2">
                                        <form action="/user/{{ $user->id }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <div class="d-grid gap-2">
                                                <form action="/user/{{ $user->id }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button onclick="return confirm('Kamu Yakin?')" class="btn btn-danger">
                                                        <i class="fa-solid fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Pagination --}}
    <div class="container">
        <div class="container d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>

    {{-- Divider --}}
    <div class="divider">
        <div class="divider-text">
            ==========
        </div>
    </div>

    {{-- Page Create --}}
    <div class="d-grid gap-2">
        <a href="/user/create" class="btn btn-primary" type="button">
            <i class="fa-solid fa-plus"></i> Tambah Karyawan
        </a>
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
