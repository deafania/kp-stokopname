<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemTypeController extends Controller
{
    public function index()
    {
        return view('pages.item.inventory.type.index');
    }

    public function create()
    {
        return view('pages.item.inventory.type.create');
    }
}
