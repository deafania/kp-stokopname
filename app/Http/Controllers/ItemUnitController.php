<?php

namespace App\Http\Controllers;

use app\Http\Requests\SatuanBarangRequest;
use App\Models\Satuanbarang;
use Illuminate\Http\Request;

class ItemUnitController extends Controller
{
    public function index()
    {
        $SatuanBarang = Satuanbarang::all();

        return view('pages.item.inventory.unit.index', compact('SatuanBarang'));
    }

    public function edit(Satuanbarang $satuanbarang)
    {
        return view('pages.item.inventory.unit.edit', compact('satuanbarang'));
    }

    public function create()
    {
        return view('pages.item.inventory.unit.create');
    }

    public function store(Request $request)
    {
        $rules = ['satuan_barang' => 'required|string'];
        $message = ['satuan_barang.required' => 'Satuan barang tidak boleh kosong!'];
        $validate = $this->validate($request, $rules, $message);

        if($validate){
            Satuanbarang::create([
                'satuan_barang' => $request->satuan_barang
            ]);
            return redirect()->route('item.unit.index')->with('success', 'Data berhasil ditambahkan!');
        }

    }

    public function update(Request $request, Satuanbarang $satuanbarang)
    {
        $rules = ['satuan_barang' => 'required|string'];
        $message = ['satuan_barang.required' => 'Satuan barang tidak boleh kosong!'];
        $validate = $this->validate($request, $rules, $message);

        if($validate){
            $satuanbarang->update([
                'satuan_barang' => $request->satuan_barang
            ]);
            return redirect()->route('item.unit.index')->with('success', 'Data berhasil di update!');
        }

    }

    public function delete(Satuanbarang $satuanbarang)
    {   
        $satuanbarang->delete();
        return redirect()->route('item.unit.index')->with('success', 'Data barang berhasil dihapus!');
    }
}
