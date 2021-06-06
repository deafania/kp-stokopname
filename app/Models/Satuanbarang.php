<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuanbarang extends Model
{
    use HasFactory;

    protected $table = "satuan_barang";

    protected $primaryKey = "id_satuanbarang";

    protected $fillable = [
        'id_satuanbarang', 'satuan_barang'
    ];

    public function Databarang()
    {
        return $this->hasMany(Databarang::class, 'id_satuanbarang', 'id_satuanbarang');
    }
}
