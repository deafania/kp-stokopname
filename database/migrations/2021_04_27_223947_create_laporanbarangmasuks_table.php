<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanbarangmasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_barangmasuk', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->timestamps();
        });
        
        Schema::table('laporan_barangmasuk', function (Blueprint $table) {
            $table->renameColumn('id','id_laporanbarangmasuk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_barangmasuk');
    }
}
