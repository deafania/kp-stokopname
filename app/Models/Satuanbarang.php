<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuanbarang extends Model
{
    use HasFactory;

    protected $table = "satuan_barang";

    protected $fillable = [
        'satuan_barang'
    ];
}
