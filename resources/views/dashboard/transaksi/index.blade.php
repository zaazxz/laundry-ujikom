@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            {{-- Order --}}
            <div class="col-md-4 ">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="/store1" method="post">
                                @csrf
                                @method('POST')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="pelanggan_id">Pelanggan</label>
                                                <select
                                                name="pelanggan_id"
                                                id="pelanggan_id"
                                                class="form-select">
                                                    <option value="0">Pilih Pelanggan</option>
                                                    @foreach ($pelanggans as $pelanggan)
                                                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="paket_id">Paket</label>
                                                <select
                                                name="paket_id"
                                                id="paket_id"
                                                class="form-select"
                                                >
                                                    <option value="0">Pilih Paket</option>
                                                    @foreach ($pakets as $paket)
                                                        <option value="{{ $paket->id }}">{{ $paket->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Jumlah</label>
                                                <input
                                                type="number"
                                                name="qty"
                                                id="qty"
                                                class="form-control"
                                                required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="first-name-vertical">Kasir</label>
                                            <input class="form-control" type="text" name="" id="" placeholder="Kasir" value="1" disabled>
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="first-name-vertical">Outlet</label>
                                            <input class="form-control" type="text" name="" id="" placeholder="Outlet" value="1" disabled>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            </div>
                                        </div>
                                        @if ($message = Session::get('pesan'))
                                            <div class="alert alert-primary">
                                                <button class="close">
                                                    <span>&times;</span>
                                                </button>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Table Detail Order --}}
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Paket</th>
                                    <th>Pelanggan</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Meledak</td>
                                    <td>Mirza Qamaruzzaman</td>
                                    <td>1</td>
                                    <td>10000</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-12 my-1">
                                                <div class="d-grid gap-2">
                                                    <button type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalCenter"
                                                    aria-controls="exampleModalCenter"
                                                    class="button btn btn-primary">Detail</button>
                                                </div>
                                            </div>

                                        </div>
                                        {{-- Modal --}}
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                                        \
                                                    </h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <div class="mx-auto">

                                                    </div>
                                                    <hr>
                                                    <ul>
                                                        <li></li>
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
                            </tbody>
                        </table>
                    </div>
                </div>

                <hr>
                Total Pembayaran :
                <hr>
                <button type="submit" class="btn btn-success">Order</button>
            </div>

        </div>
    </div>
@endsection
