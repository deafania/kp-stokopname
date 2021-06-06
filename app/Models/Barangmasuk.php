<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangmasuk extends Model
{
    use HasFactory;

    protected $table = "barang_masuk";

    protected $primaryKey = "id_barangmasuk";

    protected $fillable = [
        'id_barangmasuk', 'tanggal', 'id_namabarang', 'jumlah_masuk'
    ];

    public function Namabarang()
    {
        return $this->belongsTo(Namabarang::class, 'id_namabarang', 'id_namabarang');
    }
}
