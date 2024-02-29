<?php

namespace Database\Seeders;

use App\Models\Mahasantri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 10; $i++) {
        Mahasantri::create([
            'nama_mhs' => 'Mahasantri ' . $i,
            'alamat_mhs' => 'Alamat ' . $i,
            'umur_mhs' => 20 + $i,
            'id_jrs' => $i,
        ]);
    }
    }
}
