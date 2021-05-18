<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisbarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nama_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang', 50);
            $table->timestamps();
        });

        Schema::table('nama_barang', function (Blueprint $table) {
            $table->renameColumn('id', 'id_jenisbarang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_barang');
    }
}
