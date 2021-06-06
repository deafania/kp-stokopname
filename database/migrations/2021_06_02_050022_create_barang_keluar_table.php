<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id('id_barangkeluar');
            $table->date('tanggal');
            $table->unsignedBigInteger('id_namabarang');
            $table->foreign('id_namabarang')->references('id_namabarang')->on('nama_barang');
            $table->integer('jumlah_keluar');
            $table->enum('status', ['approve', 'process', 'reject']);
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
        Schema::dropIfExists('barang_masuk');
    }
}
