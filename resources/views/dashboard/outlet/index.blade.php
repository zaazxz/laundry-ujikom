@extends('dashboard.layouts.main')

@section('content')
    {{-- Search Bar --}}
    <div class="container">
        <form action="/outlet">
            <div class="input-group mb-3">
                <button class="btn btn-primary" type="submit" id="button-addon1">
                    <i class="fa-solid fa-magnifying-glass"></i> Cari
                </button>
                <input type="text" class="form-control" placeholder="Cari Outlets"
                    name="search"value="{{ request('search') }}">
            </div>
        </form>
    </div>


    {{-- List Outlet --}}
    <div class="container text-center">
        <div class="row">
            @foreach ($outlets as $outlet)
                <table class="col-lg-6">
                    <tr>
                        <td>
                            <div class="col-lg-11 mx-auto my-4">
                                <div class="card">
                                    <div class="card-content">
                                        @if ($outlet->gambar)
                                            <img class="card-img-top img-fluid justify-content-centered"
                                                style="height: 20rem" src="{{ asset('storage/' . $outlet->gambar) }}"
                                                alt="" srcset="">
                                        @else
                                            <img class="card-img-top img-fluid " src="{{ asset('img/laundry-1.jpg') }}"
                                                alt="Card image cap" style="height: 20rem" />
                                        @endif
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $outlet->nama }}</h4>
                                            <p class="card-text">
                                                Jl. {{ $outlet->jalan }}, RT {{ $outlet->RT }}/RW {{ $outlet->RW }},
                                                Kec. {{ $outlet->kecamatan }}, {{ $outlet->kabupaten }},
                                                {{ $outlet->provinsi }}, {{ $outlet->negara }},
                                                {{ $outlet->kode_pos }}
                                            </p>
                                            <div class="row">
                                                <div class="col-lg-8 my-1">
                                                    <div class="d-grid gap-2">
                                                        <div class="d-grid gap-2">
                                                            <button type="button" class="btn btn-outline-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalCenter{{ $outlet->id }}"
                                                                aria-controls="exampleModalCenter">
                                                                Detail Outlet
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 my-1">
                                                    <div class="d-grid gap-2">
                                                        <a href="/outlet/{{ $outlet->id }}/edit" class="btn btn-warning">
                                                            <i class="fa-solid fa-pen"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 my-1">
                                                    <div class="d-grid gap-2">
                                                        <form action="/outlet/{{ $outlet->id }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <div class="d-grid gap-2">
                                                                <button onclick="return confirm('Kamu Yakin?')"
                                                                    class="btn btn-danger">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Modal --}}
                            <div class="modal fade" id="exampleModalCenter{{ $outlet->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">{{ $outlet->nama }}
                                            </h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body text-start">
                                            <div class="mx-auto">
                                                @if ($outlet->gambar)
                                                    <img class="card-img-top img-fluid justify-content-centered"
                                                    style="height: 20rem" src="{{ asset('storage/' . $outlet->gambar) }}"
                                                    alt="" srcset="">
                                                @else
                                                    <img class="card-img-top img-fluid justify-content-centered"
                                                    style="height: 20rem" src="{{ asset('img/laundry-1.jpg') }}"
                                                    alt="" srcset="">
                                                @endif
                                            </div>
                                            <hr>
                                            <ul>
                                                <li>Jalan : {{ $outlet->jalan }}</li>
                                                <li>Rukun Tetangga (RT) : {{ $outlet->RT }}</li>
                                                <li>Rukun Warga (RW) : {{ $outlet->RW }}</li>
                                                <li>Kecamatan : {{ $outlet->kecamatan }}</li>
                                                <li>Kabupaten / Kota : {{ $outlet->kabupaten }}</li>
                                                <li>Provinsi : {{ $outlet->provinsi }}</li>
                                                <li>Negara : {{ $outlet->negara }}</li>
                                                <li>Kode Pos : {{ $outlet->kode_pos }}</li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Close</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            @endforeach
        </div>
    </div>

    {{-- Pagination --}}
    <div class="container d-flex justify-content-center">
        {{ $outlets->links() }}
    </div>

    {{-- Divider --}}
    <div class="divider">
        <div class="divider-text">
            ===========
        </div>
    </div>

    {{-- Create Page --}}
    <div class="container">
        <a href="/outlet/create" class="btn btn-primary form-control">
            <i class="fa-solid fa-plus"></i> Tambah Outlet
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
