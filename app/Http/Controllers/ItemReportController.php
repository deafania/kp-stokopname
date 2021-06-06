<?php

namespace App\Http\Controllers;

use App\Models\Barangkeluar;
use App\Models\Barangmasuk;
use Illuminate\Http\Request;
use PDF;

class ItemReportController extends Controller
{
    public function incoming_index()
    {
        return view('pages.item.inventory.report.incoming');
    }

    public function outcoming_index()
    {
        return view('pages.item.inventory.report.outcoming');
    }

    public function cetak_masuk(Request $request)
    {
        $startDate = date($request->start_date);
        $endDate = date($request->end_date);

        $data = Barangmasuk::whereBetween('tanggal', [$startDate, $endDate])->get();

        return view('pages.item.laporan.in', compact('data', 'startDate', 'endDate'));
    }

    public function cetak_keluar(Request $request)
    {
        $startDate = date($request->start_date);
        $endDate = date($request->end_date);

        $data = Barangkeluar::whereBetween('tanggal', [$startDate, $endDate])->get();

        return view('pages.item.laporan.out', compact('data', 'startDate', 'endDate'));
    }
}
