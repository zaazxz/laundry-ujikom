<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Paket;
use App\Models\Outlet;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Outlet::create([
            'nama' => 'Insan Rahayu',
            'jalan' => 'Kencana',
            'RT' => '01',
            'RW' => '04',
            'kode_pos' => '40394',
            'provinsi' => 'Jawa Barat',
            'kabupaten' => 'Bandung',
            'kecamatan' => 'Rancaekek',
            'negara' => 'Indonesia',
            'telp' => '089681238317'
        ]);

        User::create([
            'outlet_id' => '1',
            'level' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'gambar' => '',
            'nama' => 'Achyara Narasya Marlanda',
        ]);

        Paket::create([
            'jenis' => 'Kiloan',
            'nama' => 'Meledak',
            'harga' => '20000'
        ]);

    }
}
