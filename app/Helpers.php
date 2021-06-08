<?php

use App\Models\Barangkeluar;
use App\Models\Barangmasuk;
use Illuminate\Support\Facades\DB;

if ( ! function_exists('getRole'))
{
     function getRole() {
          return auth()->user()->role;
     }
}

if ( ! function_exists('isAdmin'))
{
     function isAdmin()
     {
          return (getRole() === 'admin');
     }
}

if ( ! function_exists('getDataBarangKeluar'))
{
     function getDataBarangKeluar($tahun = '2021')
     {
          $months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
          $dataKeluar = [];

          foreach ($months as $mo) {
               $data = Barangkeluar::select(DB::raw('SUM(jumlah_keluar) as jumlah_keluar'))
                    ->whereMonth('tanggal', '=', $mo)
                    ->whereYear('tanggal', '=', $tahun)
                    ->whereStatus('approve')
                    ->get();

               $dataKeluar[] = $data;
          }

          return $dataKeluar;
     }
}

if ( ! function_exists('getDataBarangMasuk'))
{
     function getDataBarangMasuk($tahun = '2021')
     {
          $months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
          $dataKeluar = [];

          foreach ($months as $mo) {
               $data = Barangmasuk::select(DB::raw('SUM(jumlah_masuk) as jumlah_masuk'))
                    ->whereMonth('tanggal', '=', $mo)
                    ->whereYear('tanggal', '=', $tahun)
                    ->get();

               $dataKeluar[] = $data;
          }

          return $dataKeluar;
     }
}