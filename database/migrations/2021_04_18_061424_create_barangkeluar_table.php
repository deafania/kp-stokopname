<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangkeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('id_barang');
            $table->integer('id_namabarang');
            $table->integer('jumlah_keluar');
            $table->enum('status', ['approve', 'process', 'reject']);
            $table->timestamps();
        });

        Schema::table('barang_keluar', function (Blueprint $table) {
            $table->renameColumn('id','id_barangkeluar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_keluar');
    }
}
