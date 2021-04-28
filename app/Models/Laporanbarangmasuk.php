<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporanbarangmasuk extends Model
{
    use HasFactory;
    protected $table = "laporan_barangmasuk";

    protected $fillable = [
        'id_transaksi', 'id_databarang','tanggal', 'jumlah_keluar'
    ];
}
