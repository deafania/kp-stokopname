<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
