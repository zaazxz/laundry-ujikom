@extends('dashboard.layouts.main')

@section('content')
    <div class="card-content">
        <div class="card-body">

            <form class="form form-vertical" method="post" action="/paket">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Nama Paket</label>
                                <input type="text" id="first-name-vertical" class="form-control" name="nama"
                                    value="{{ old('nama') }}" placeholder="Masukkan Nama Paket">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Jenis Paket</label>
                                <select name="jenis" id="" class="form-select">
                                    <option value="Kiloan">Kiloan</option>
                                    <option value="Selimut">Selimut</option>
                                    <option value="Bedcover">Bedcover</option>
                                    <option value="Kaos">Kaos</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Harga Paket</label>
                                <input type="text" id="first-name-vertical" class="form-control" name="harga"
                                    value="{{ old('harga') }}">
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
