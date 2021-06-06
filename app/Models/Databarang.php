<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Databarang extends Model
{
    use HasFactory;

    protected $table = "data_barang";

    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'id_barang', 'id_namabarang', 'stok', 'id_satuanbarang'
    ];

    public function Namabarang(){
        return $this->belongsTo(Namabarang::class, 'id_namabarang', 'id_namabarang');
    }

    public function Satuanbarang(){
        return $this->belongsTo(Satuanbarang::class, 'id_satuanbarang', 'id_satuanbarang');
    }
}
