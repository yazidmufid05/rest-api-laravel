<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('namaProduk');
            $table->longText('deskripsiProduk');
            $table->integer('hargaProduk');
            $table->enum('kategoriProduk', ['makanan', 'minuman', 'perlengkapan mandi', 'kosmetik']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
