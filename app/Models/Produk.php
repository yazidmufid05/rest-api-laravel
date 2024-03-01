<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaProduk',
        'deskripsiProduk',
        'hargaProduk',
        'kategoriProduk',
    ];
}    
