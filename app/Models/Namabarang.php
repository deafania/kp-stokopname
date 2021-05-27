<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Namabarang extends Model
{
    use HasFactory;

    protected $table = "nama_barang";

    protected $primaryKey = "id_jenisbarang";

    protected $fillable = [
        'id_jenisbarang', 'nama_barang'
    ];
}
