<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->unsignedBigInteger('id_namabarang');
            $table->foreign('id_namabarang')->references('id_namabarang')->on('nama_barang');
            $table->integer('stok');
            $table->unsignedBigInteger('id_satuanbarang');
            $table->foreign('id_satuanbarang')->references('id_satuanbarang')->on('satuan_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_barang');
    }
}
