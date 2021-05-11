<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemIncomingManagementController extends Controller
{
    public function index()
    {
        return view('pages.item.management.incoming.index');
    }

    public function create()
    {
        // return view('pages.item.management.incoming.create');
    }
}
