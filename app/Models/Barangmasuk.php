<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangmasuk extends Model
{
    use HasFactory;

    protected $tabel = "barang_masuk";

    protected $fillable = [
        'id_transaksi', 'id_databarang','tanggal', 'jumlah_masuk'
    ];
}
