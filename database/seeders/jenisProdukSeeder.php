<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class JenisProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh data untuk diisi ke dalam tabel jenis_produk
        $jenisProdukData = [
            ['nama' => 'Elektronik'],
            ['nama' => 'Fashion'],
            ['nama' => 'Kesehatan'],
            ['nama' => 'Otomotif'],
        ];

        // Insert data ke dalam tabel jenis_produk
        foreach ($jenisProdukData as $jenisProduk) {
            DB::table('jenis_produk')->insert($jenisProduk);
        }
    }
}
