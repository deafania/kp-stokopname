<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('satuan_barang')->insert([
            ['id_satuanbarang' => 1, 'satuan_barang' => 'Racun', 'created_at' => now(), 'updated_at' => now()],
            ['id_satuanbarang' => 2, 'satuan_barang' => 'Alat Tulis', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
