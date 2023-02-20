<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Outlet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.index', [
            'title' => 'Pengguna',
            'deskripsi' => 'Halaman Pengelolaan pengguna sistem dry and clean',
            'users' => User::latest()->filter()->paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.create', [
            'title' => 'Pengguna',
            'deskripsi' => 'Halaman Penambahan data pengguna sistem dry and clean',
            'outlets' => Outlet::all()
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
            'outlet_id' => 'required',
            'level' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
            'nama' => 'required',
            'gambar' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:20000'
        ]);

        if ($request->file('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('post-images');
        }

        $data['password'] = Crypt::encrypt($data['password']);

        User::create($data);

        if($data) {
            return redirect('/user')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect('/user')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', [
            'title' => 'Pengguna',
            'deskripsi' => 'Halaman ubah data pengguna sistem laundry dry and clean',
            'users' => $user,
            'outlets' => Outlet::all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'outlet_id' => 'required',
            'level' => 'required',
            'username' => 'required',
            'password' => 'required|min:8',
            'nama' => 'required',
            'gambar' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:20000'
        ];

        if($request->username != $user->username) {
            $rules['username'] = 'required';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            if($user->gambar){
                Storage::delete($user->gambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('post-images');
        }

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::where('id', $user->id)
            ->update($validatedData);

        if($validatedData) {
            return redirect('/user')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect('/user')->with(['error' => 'Data Gagal Diubah!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->gambar){
            Storage::delete($user->gambar);
        }
        User::destroy($user->id);

        if($user) {
            return redirect('/user')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect('/user')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
