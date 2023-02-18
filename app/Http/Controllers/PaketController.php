<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Outlet;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.paket.index', [
            'title' => 'Paket',
            'deskripsi' => 'Halaman pengelolaan paket sistem kasir Dry and Clean',
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
        return view('dashboard.paket.create', [
            'title' => 'Paket',
            'deskripsi' => 'Halaman tambah data paket',
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
            'jenis' => 'required',
            'nama' => 'required',
            'harga' => 'required',
        ]);

        Paket::create($data);
        
        if($data) {
            return redirect('/paket')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect('/paket')->with(['error' => 'Data Gagal Disimpan!']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit(Paket $paket)
    {
        return view('dashboard.paket.edit', [
            'title' => 'Pelanggan',
            'deskripsi' => 'Halaman ubah data paket',
            'pakets' => $paket
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paket $paket)
    {
        $rules = [
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
        ];

        $validateData = $request->validate($rules);

        Paket::where('id', $paket->id)->update($validateData);
        
        if($validateData) {
            return redirect('/paket')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect('/paket')->with(['error' => 'Data Gagal Diubah!']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paket $paket)
    {
        Paket::destroy($paket->id);
        
        if($paket) {
            return redirect('/paket')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect('/paket')->with(['error' => 'Data Gagal Diubah!']);
        }

    }
}
