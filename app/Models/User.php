<?php

namespace App\Models;

use App\Models\Outlet;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function scopeFilter($query)
    {
        if (request('search')) {
            return $query->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('level', 'like', '%' . request('search') . '%');
        }
    }

    protected $guarded = ['id'];

    public function outlet() {
        return $this->belongsTo(Outlet::class);
    }

}
