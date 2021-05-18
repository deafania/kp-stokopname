<?php

namespace App\Http\Controllers;

use App\Models\Satuanbarang;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(){
        return view('pages.item.inventory.index');
    }

    public function create(){
        $item_units = Satuanbarang::all();
        return view('pages.item.inventory.create', compact('item_units'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
