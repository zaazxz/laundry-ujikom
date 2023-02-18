<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function paket() {
        return $this->belongsTo(Paket::class);
    }

    public function pelanggan() {
        return $this->belongsTo(Pelanggan::class);
    }

    public function outlet() {
        return $this->belongsTo(Outlet::class);
    }
}
