<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemUnitController extends Controller
{
    public function index()
    {
        return view('pages.item.inventory.unit.index');
    }

    public function create()
    {
        return view('pages.item.inventory.unit.create');
    }
}
