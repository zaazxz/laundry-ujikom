@extends('dashboard.layouts.main')

@section('content')
    <div class="card-content">
        <div class="card-body">

            <form class="form form-vertical" method="post" action="/pelanggan/{{$pelanggans->id}}">
                @method('put')
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Nama Lengkap</label>
                                <input type="text" id="first-name-vertical" class="form-control"
                                value="{{ old('nama', $pelanggans->nama) }}"
                                name="nama"
                                placeholder="Masukkan Nama Lengkap">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">No Telepon</label>
                                <input type="number" id="first-name-vertical" class="form-control"
                                value="{{ old('hp', $pelanggans->hp) }}"
                                name="hp"
                                    placeholder="Masukkan Nama Lengkap">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                value="{{ old('alamat') }}"
                                name="alamat"
                                placeholder="Masukkan Alamat">{{ $pelanggans->alamat }}</textarea>
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
