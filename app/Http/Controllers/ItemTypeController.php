<?php

namespace App\Http\Controllers;

use App\Http\Requests\NamaBarangRequest;
use App\Models\Namabarang;

class ItemTypeController extends Controller
{
    public function index()
    {
        $items = Namabarang::latest()->get();

        return view('pages.item.inventory.type.index', compact('items'));
    }

    public function edit($id_namabarang)
    {
        $item = Namabarang::where('id_namabarang', $id_namabarang)->first();
        return view('pages.item.inventory.type.edit', compact('item'));
    }

    public function update(NamaBarangRequest $request, $id_namabarang)
    {
        Namabarang::where('id_namabarang', $id_namabarang)->update([
            'nama_barang' => $request->nama_barang
        ]);

        return redirect()->route('item.type.index')->with('success', 'Data berhasil di update');
    }

    public function create()
    {
        return view('pages.item.inventory.type.create');
    }

    public function store(NamaBarangRequest $request)
    {
        Namabarang::create([
            'nama_barang' => $request->nama_barang
        ]);

        return redirect()->route('item.type.index')->with('success', 'Data Berhasil dibuat');
    }

    public function destroy($id_namabarang)
    {   
        Namabarang::where('id_namabarang', $id_namabarang)->delete();

        return redirect()->route('item.type.index')->with('success', 'Data barang berhasil dihapus');
    }
}
