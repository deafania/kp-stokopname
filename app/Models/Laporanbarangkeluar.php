<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporanbarangkeluar extends Model
{
    use HasFactory;
    protected $table = "laporan_barangkeluar";

    protected $fillable = [
        'id_transaksi', 'id_databarang','tanggal', 'jumlah_keluar'
    ];
}
