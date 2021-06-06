<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangkeluar extends Model
{
    use HasFactory;

    protected $table = "barang_keluar";

    protected $primaryKey = "id_barangkeluar";

    protected $fillable = [
        'id_barangkeluar', 'tanggal', 'id_namabarang', 'jumlah_keluar', 'status'
    ];

    public function Namabarang()
    {
        return $this->belongsTo(Namabarang::class, 'id_namabarang', 'id_namabarang');
    }
}
