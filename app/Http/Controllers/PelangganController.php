<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pelanggan.index', [
            'title' => 'Pelanggan',
            'deskripsi' => 'Halaman pengelolaan pelanggan sistem kasir Dry and Clean',
            'pelanggans' => Pelanggan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pelanggan.create', [
            'title' => 'Pelanggan',
            'deskripsi' => 'Halaman penambahan data pelanggan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
        ]);

        Pelanggan::create($data);

        if($data) {
            return redirect('/pelanggan')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect('/pelanggan')->with(['error' => 'Data Gagal Disimpan!']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('dashboard.pelanggan.edit', [
            'title' => 'Pelanggan',
            'deskripsi' => 'Halaman ubah data pelanggan',
            'pelanggans' => $pelanggan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
        ];

        $validateData = $request->validate($rules);

        Pelanggan::where('id', $pelanggan->id)->update($validateData);

        if($validateData) {
            return redirect('/pelanggan')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect('/pelanggan')->with(['error' => 'Data Gagal Diubah!']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        Pelanggan::destroy($pelanggan->id);

        if($pelanggan) {
            return redirect('/pelanggan')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect('/pelanggan')->with(['error' => 'Data Gagal Dihapus!']);
        }

    }
}
