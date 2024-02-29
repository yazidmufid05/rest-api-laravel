<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh data untuk diisi ke dalam tabel produk
        $produkData = [
            [
                'namaProduk' => 'Mie Goreng',
                'deskripsiProduk' => 'Mie Goreng Spesial',
                'hargaProduk' => 8000,
                'kategoriProduk' => 'makanan',
            ],
            [
                'namaProduk' => 'Teh Botol',
                'deskripsiProduk' => 'Minuman Teh Botol',
                'hargaProduk' => 5000,
                'kategoriProduk' => 'minuman',
            ],
            [
                'namaProduk' => 'Sabun Mandi',
                'deskripsiProduk' => 'Sabun Mandi Aromaterapi',
                'hargaProduk' => 15000,
                'kategoriProduk' => 'perlengkapan mandi',
            ],
            [
                'namaProduk' => 'Lipstik',
                'deskripsiProduk' => 'Lipstik Matte',
                'hargaProduk' => 25000,
                'kategoriProduk' => 'kosmetik',
            ],
        ];

        // Insert data ke dalam tabel produk
        foreach ($produkData as $produk) {
            DB::table('produk')->insert($produk);
        }
    }
}
