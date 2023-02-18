<?php

namespace App\Models;

use App\Models\User;
use App\Models\Paket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Outlet extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query) {
            if (request('search')) {
                return $query->where('nama', 'like', '%' . request('search') . '%')
                             ->orWhere('jalan', 'like', '%' . request('search') . '%')
                             ->orWhere('RT', 'like', '%' . request('search') . '%')
                             ->orWhere('RW', 'like', '%' . request('search') . '%')
                             ->orWhere('kecamatan', 'like', '%' . request('search') . '%')
                             ->orWhere('kabupaten', 'like', '%' . request('search') . '%')
                             ->orWhere('provinsi', 'like', '%' . request('search') . '%')
                             ->orWhere('negara', 'like', '%' . request('search') . '%')
                             ->orWhere('kode_pos', 'like', '%' . request('search') . '%');
            }
    }

    public function user() {
        return $this->hasMany(User::class);
    }

    public function paket() {
        return $this->hasMany(Paket::class);
    }

}
