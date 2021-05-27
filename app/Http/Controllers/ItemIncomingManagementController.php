<?php

namespace App\Http\Controllers;

use App\Models\Barangmasuk;
use Illuminate\Http\Request;

class ItemIncomingManagementController extends Controller
{
    public function index()
    {
        $incoming_items = Barangmasuk::latest()->get();
    
        return view('pages.item.management.incoming.index' , compact('incoming_items'));
    }

    public function create()
    {
        return view('pages.item.management.incoming.create');
    }
}
