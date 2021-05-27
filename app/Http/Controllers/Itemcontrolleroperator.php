<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Databarang;
use App\Models\Namabarang;
use App\Models\Satuanbarang;

class Itemcontrolleroperator extends Controller
{
    public function index(){
        $items = Databarang::latest()->get();
    
        return view('pages.item.inventory.index', compact('items'));
    }

    public function create(){
        $item_units = Satuanbarang::all();
        $nama_barang = Namabarang::all();
        return view('pages.item.inventory.create', compact('item_units', 'nama_barang'));
    }

    public function store(ItemRequest $request)
    {   
        $data = $request->validated();
        Databarang::create($data);

        return redirect()->route('item.index')->with('success', 'Data barang berhasil dibuat');
    }

    public function edit($id_barang)
    {
        $item_units = Satuanbarang::all();
        $item = Databarang::where('id_barang', $id_barang)->first();
        return view('pages.item.inventory.edit', compact('item', 'item_units'));
    }

    public function update(ItemRequest $request, $id_barang)
    {
        $data = $request->validated();
        Databarang::where('id_barang', $id_barang)->update($data);

        return redirect()->route('item.index')->with('success', 'Data barang berhasil diupdate');
    }

    public function destroy($id_barang)
    {   
        Databarang::where('id_barang', $id_barang)->delete();

        return redirect()->route('item.index')->with('success', 'Data barang berhasil didelete');
    }

    public function editbarang(Databarang $databarang)
    {
        return view('inventory.edit', compact('databarang'));
    }
    public function delete(Databarang $databarang)
    {
        $databarang->delete();
        return redirect()->route('item.index')->with('success', 'Data barang berhasil didelete!');
    }
}
