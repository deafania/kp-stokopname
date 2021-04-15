<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemUnitController extends Controller
{
    public function index()
    {
        return view('pages.items.unit.index');
    }

    public function create()
    {
        return view('pages.items.unit.create');
    }
}
