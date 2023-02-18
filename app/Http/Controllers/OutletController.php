<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreOutletRequest;
use App\Http\Requests\UpdateOutletRequest;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.outlet.index', [
            'title' => 'Outlet',
            'deskripsi' => 'Halaman pengelolaan outlet sistem kasir Dry and Clean',
            'outlets' => Outlet::latest()->filter()->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.outlet.create', [
            'title' => 'Outlet',
            'deskripsi' => 'Halaman tambah data outlet'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOutletRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $request->validate([
            'nama' => 'required',
            'jalan' => 'required',
            'RT' => 'required',
            'RW' => 'required',
            'kode_pos' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'negara' => 'required',
            'telp' => 'required',
            'gambar' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:20000'
        ]);

        if ($request->file('gambar')) {
            $rules['gambar'] = $request->file('gambar')->store('post-images');
        }

        Outlet::create($rules);

        if($rules) {
            return redirect('/outlet')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect('/outlet')->with(['error' => 'Data Gagal Disimpan!']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(Outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit(Outlet $outlet)
    {
        return view('dashboard.outlet.edit', [
            'title' => 'Outlet',
            'deskripsi' => 'Halaman ubah data outlet',
            'outlets' => $outlet
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOutletRequest  $request
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outlet $outlet)
    {
        $rules = [
            'nama' => 'required',
            'jalan' => 'required',
            'RT' => 'required',
            'RW' => 'required',
            'kode_pos' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'negara' => 'required',
            'telp' => 'required',
            'gambar' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:20000'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            if($outlet->gambar){
                Storage::delete($outlet->gambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('post-images');
        }

        Outlet::where('id', $outlet->id)
            ->update($validatedData);
        
        if($validatedData) {
            return redirect('/outlet')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect('/outlet')->with(['error' => 'Data Gagal Diubah!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outlet $outlet)
    {
        if($outlet->gambar){
            Storage::delete($outlet->gambar);
        }

        Outlet::destroy($outlet->id);
        
        if($outlet) {
            return redirect('/outlet')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect('/outlet')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
