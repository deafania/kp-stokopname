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
        'id_barang','nama_barang','stok','id_satuanbarang'
    ];

    public function unit(){
        return $this->belongsTo(Satuanbarang::class, 'id_satuanbarang', 'id_satuanbarang');
    }
}
