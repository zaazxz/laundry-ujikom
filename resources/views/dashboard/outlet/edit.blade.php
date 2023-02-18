@extends('dashboard.layouts.main')

@section('content')
    {{-- Form --}}
    <div class="card-content">
        <div class="card-body">

            <form class="form form-vertical" method="post" action="/outlet/{{$outlets->id}}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Nama Outlet</label>
                                <input
                                type="text"
                                id="first-name-vertical"
                                class="form-control @error('nama') is-invalid @enderror"
                                name="nama"
                                placeholder="Masukkan Nama Outlet"
                                value="{{ old('nama', $outlets->nama) }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">No Telepon</label>
                                <input
                                type="number"
                                id="first-name-vertical"
                                class="form-control @error('telp') is-invalid @enderror"
                                name="telp"
                                placeholder="Masukkan No Telepon"
                                value="{{ old('telp', $outlets->telp) }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="contact-info-vertical">Pratinjau Gambar</label>
                                <div class="container border mt-2 py-3 d-flex justify-content-center">
                                    @if ($outlets->gambar)
                                        <img src="{{ asset('storage/' . $outlets->gambar) }}" alt="no-picture" id="imgPreview"
                                            style="max-width: 400px;" />
                                    @else
                                        <img id="imgPreview" src="#" alt="your image" style="max-width: 400px;" />
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="contact-info-vertical">Gambar</label>
                                <input
                                class="form-control @error('gambar') is-invalid @enderror"
                                type="file"
                                id="gambar"
                                name="gambar"
                                value="{{ old('gambar', $outlets->gambar) }}"
                                onchange="previewImage()">
                            </div>
                            @error('gambar')
                                {{ $error }}
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Nama Jalan</label>
                                    <input
                                    type="text"
                                    id="first-name-column"
                                    class="form-control @error('jalan') is-invalid @enderror"
                                    placeholder="Masukkan Nama Jalan"
                                    name="jalan"
                                    value="{{ old('jalan', $outlets->jalan) }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Rukun tetangga</label>
                                    <input
                                    type="text"
                                    id="last-name-column"
                                    class="form-control @error('RT') is-invalid @enderror"
                                    name="RT"
                                    placeholder="Masukkan No RT"
                                    name="lname-column"
                                    value="{{ old('RT', $outlets->RT) }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="city-column">Rukun Warga</label>
                                    <input
                                    type="text"
                                    id="city-column"
                                    class="form-control @error('RW') is-invalid @enderror"
                                    name="RW"
                                    placeholder="Masukkan No RW"
                                    name="city-column"
                                    value="{{ old('RW', $outlets->RW) }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="country-floating">Kecamatan</label>
                                    <input
                                    type="text"
                                    id="country-floating"
                                    class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan"
                                    placeholder="Masukkan Kecamatan"
                                    value="{{ old('kecamatan', $outlets->kecamatan) }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="company-column">Kabupaten</label>
                                    <input
                                    type="text"
                                    id="company-column"
                                    class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten"
                                    placeholder="Masukkan Kabupaten / Kota"
                                    value="{{ old('kabupaten', $outlets->kabupaten) }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email-id-column">Provinsi</label>
                                    <input
                                    type="text"
                                    id="email-id-column"
                                    class="form-control @error('provinsi') is-invalid @enderror"
                                    name="provinsi"
                                    placeholder="Masukkan Provinsi"
                                    value="{{ old('provinsi', $outlets->provinsi) }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email-id-column">Negara</label>
                                    <input
                                    type="text"
                                    id="email-id-column"
                                    class="form-control @error('negara') is-invalid @enderror"
                                    name="negara"
                                    placeholder="Masukkan Negara"
                                    value="{{ old('negara', $outlets->negara) }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email-id-column">Kode POS</label>
                                    <input
                                    type="number"
                                    id="email-id-column"
                                    class="form-control @error('kode_pos') is-invalid @enderror"
                                    name="kode_pos"
                                    placeholder="Masukkan Kode POS"
                                    value="{{ old('kode_pos', $outlets->kode_pos) }}">
                                </div>
                            </div>
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
