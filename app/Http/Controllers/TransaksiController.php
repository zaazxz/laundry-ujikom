<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.transaksi.index', [
            'title' => 'Pembayaran',
            'title' => 'Transaksi',
            'deskripsi' => 'Halaman transaksi',
            'pelanggans' => Pelanggan::all(),
            'pakets' => Paket::all()
        ]);
    }

    public function index1()
    {
        return view('kasir.transaksi.index', [
            'title' => 'Pembayaran',
            'title' => 'Transaksi',
            'deskripsi' => 'Halaman transaksi',
            'pelanggans' => Pelanggan::all(),
            'pakets' => Paket::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->pelanggan_id == 0) {
            return redirect('/transaksi')->with('pesan','Anda belum memilih pelanggan');
        }

        if ($request->paket_id == 0) {
            return redirect('/transaksi')->with('pesan','Anda belum memilih paket');
        }

        $checking = Transaksi::where('id', $request->paket_id)->where('status', '0')->first();

        if ($checking == null) {
            $transaksi = new Transaksi;
            $transaksi->pelanggan_id = $request->pelanggan_id;
            $transaksi->paket_id = $request->paket_id;
            $transaksi->user_id = $request->user_id;
            $transaksi->outlet_id = $request->outlet_id;
            $transaksi->qty = $request->qty;
        }

        return view('dashboard.transaksi.index');
    }
    public function store1(Request $request)
    {
        if ($request->pelanggan_id == 0) {
            return redirect('/transaksi1')->with('pesan','Anda belum memilih pelanggan');
        }

        if ($request->paket_id == 0) {
            return redirect('/transaksi1')->with('pesan','Anda belum memilih paket');
        }

        $checking = Transaksi::where('id', $request->paket_id)->where('status', '0')->first();

        if ($checking == null) {
            $transaksi = new Transaksi;
            $transaksi->pelanggan_id = $request->pelanggan_id;
            $transaksi->paket_id = $request->paket_id;
            $transaksi->user_id = $request->user_id;
            $transaksi->outlet_id = $request->outlet_id;
            $transaksi->qty = $request->qty;
        }

        return view('kasir.transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
