<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Namabarang extends Model
{
    use HasFactory;

    protected $table = "nama_barang";

    protected $primaryKey = "id_namabarang";

    protected $fillable = [
        'id_namabarang', 'nama_barang'
    ];

    public function Databarang()
    {
        return $this->hasMany(Databarang::class, 'id_namabarang', 'id_namabarang');
    }

    public function Barangmasuk(){
        return $this->hasMany(Barangmasuk::class, 'id_namabarang', 'id_namabarang');
    }

    public function Barangkeluar(){
        return $this->hasMany(Barangkeluar::class, 'id_namabarang', 'id_namabarang');
    }
}
