<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangkeluar extends Model
{
    use HasFactory;

    protected $table = "barang_keluar";

    protected $fillable = [
        'id_transaksi', 'id_databarang','tanggal', 'jumlah_keluar'
    ];
}
