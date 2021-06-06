<?php

namespace App\Http\Controllers;

use App\Models\Barangkeluar;
use App\Models\Namabarang;
use Illuminate\Http\Request;

class ItemOutcomingManagementController extends Controller
{
    public function index(){
        $barangkeluar = Barangkeluar::all();

        return view('pages.item.management.outcoming.index' , compact('barangkeluar'));
    }

    public function create()
    {
        $namabarang = Namabarang::all();
        return view('pages.item.management.outcoming.create', compact('namabarang'));
    }

    public function edit(Barangkeluar $barangkeluar)
    {
        $barang = Namabarang::all();

        return view('pages.item.management.outcoming.edit', compact('barangkeluar', 'barang'));
    }

    public function store(Request $request)
    {
        $rules = [
            'tanggal' => 'required',
            'id_namabarang' => 'required',
            'jumlah_keluar' => 'required'
        ];
        $message = [
            'tanggal.required' => 'Tanggal tidak boleh kosong!',
            'id_namabarang.required' => 'Nama barang tidak boleh kosong!',
            'jumlah_keluar.required' => 'Jumlah keluar tidak boleh kosong!',
        ];
        $validate = $this->validate($request, $rules, $message);

        if($validate){
            Barangkeluar::create([
                'tanggal' => $request->tanggal,
                'id_namabarang' => $request->id_namabarang,
                'jumlah_keluar' => $request->jumlah_keluar,
                'status' => 'process'
            ]);

            $barang = Namabarang::findOrFail($request->id_namabarang);
            $barang->save();

            return redirect()
                ->route('item.management-outcoming.index')
                ->withSuccess('Data barang keluar berhasil ditambahkan!');
        }
    }
    
    public function getDataBarang($id_namabarang){
        if($id_namabarang != null){
            $getDataBarang = Namabarang::findOrFail($id_namabarang);
            return response()->json($getDataBarang->stok);
        }
    }

    public function update(Request $request, Barangkeluar $barangkeluar)
    {
        $rules = [
            'tanggal' => 'required',
            'id_namabarang' => 'required',
            'jumlah_keluar' => 'required',
            'status' => 'process'
        ];
        $message = [
            'tanggal.required' => 'Nama barang tidak boleh kosong!',
            'id_namabarang.required' => 'Nama Barang tidak boleh kosong!',
            'jumlah_keluar.required' => 'Jumlah keluar tidak boleh kosong!',
            'status.required' => 'Satuan barang tidak boleh kosong!'
        ];
        $validate = $this->validate($request, $rules, $message);

        if($validate){
            $barangkeluar->update([
                'tanggal' => $request->tanggal,
                'id_namabarang' => $request->id_namabarang,
                'jumlah_keluar' => $request->jumlah_keluar,
            ]);

            return redirect()->route('item.management-outcoming.index')->with('success', 'Data barang berhasil diupdate');
        }
    }

    public function delete(Barangkeluar $barangkeluar)
    {
        $barangkeluar->delete();
        return redirect()->route('item.management-outcoming.index')->with('success', 'Data barang berhasil didelete!');
    }


    public function action($id, $action)
    {
        $barangKeluar = Barangkeluar::findOrFail($id);
        $barang = Namabarang::findOrFail($barangKeluar->id_namabarang);

        if ($action == 'approve') {
           $barangKeluar->status = $action;
           $barangKeluar->save();

           $barang->stok -= $barangKeluar->jumlah_keluar;
           $barang->save();

           return redirect()
            ->back()
            ->withSuccess('Berhasil memperbarui data');
        }
        else if ($action == 'reject') {
            $barangKeluar->status = $action;
           $barangKeluar->save();

         

           return redirect()
            ->back()
            ->withSuccess('Berhasil menolak barang keluar');
        }
        else {
          echo 'tidak ada';
        }
    }
}