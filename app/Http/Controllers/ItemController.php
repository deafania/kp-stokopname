<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Databarang;
use App\Models\Satuanbarang;

class ItemController extends Controller
{
    public function index(){
        return view('pages.item.inventory.index');
    }

    public function create(){
        $item_units = Satuanbarang::all();
        return view('pages.item.inventory.create', compact('item_units'));
    }

    public function store(ItemRequest $request)
    {   
        $data = $request->validated();
        Databarang::create($data);

        return redirect()->route('item.index')->with('success', 'Data barang berhasil dibuat');
    }
}
