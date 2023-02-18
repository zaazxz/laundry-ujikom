@extends('dashboard.layouts.main')

@section('content')
    {{-- Form --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <div class="card-content">
        <div class="card-body">

            <form class="form form-vertical" method="post" action="/user" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" id="nama"
                                    class="form-control @error('nama') is-invalid @enderror" name="nama"
                                    placeholder="Masukkan Nama Lengkap" value="{{ old('nama') }}">
                            </div>
                            @error('nama')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="level">level</label>
                                <select name="level" id="level"
                                    class="form-select @error('level') is-invalid @enderror" value="{{ old('level') }}">
                                    <option value="kasir">Kasir</option>
                                    <option value="admin">Admin</option>
                                    <option value="owner">Owner</option>
                                </select>
                            </div>
                            @error('level')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="outlet_id">Penempatan</label>
                                <select name="outlet_id" id="outlet_id"
                                    class="form-select @error('outlet_id') is-invalid @enderror"
                                    value="{{ old('outlet_id') }}">
                                    @foreach ($outlets as $outlet)
                                        <option value="{{ $outlet->id }}">{{ $outlet->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('outlet_id')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="contact-info-vertical">Pratinjau Gambar</label>
                                <div class="container border mt-2 py-3 d-flex justify-content-center">
                                    <img id="imgPreview" src="#" alt="your image"
                                        style="max-width: 400px;" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input class="form-control @error('gambar') is-invalid @enderror" type="file"
                                    id="gambar" name="gambar" value="{{ old('gambar') }}" onchange="previewImage()">
                            </div>
                            @error('gambar')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    placeholder="Masukkan Username" value="{{ old('username') }}">
                            </div>
                            @error('username')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Masukkan Password" value="{{ old('password') }}">
                            </div>
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
