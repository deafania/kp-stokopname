<?php

namespace App\Http\Controllers;

use App\Models\Barangmasuk;
use App\Models\Databarang;
use App\Models\Namabarang;
use Illuminate\Http\Request;

class ItemIncomingManagementController extends Controller
{
    public function index()
    {
        $barangmasuk = Barangmasuk::all();
    
        return view('pages.item.management.incoming.index' , compact('barangmasuk'));
    }

    public function create()
    {
        $namabarang = Namabarang::all();
        return view('pages.item.management.incoming.create', compact('namabarang'));
    }

    public function edit(Barangmasuk $barangmasuk)
    {
        $namabarang = Namabarang::all();
        return view('pages.item.management.incoming.edit', compact('namabarang', 'barangmasuk'));
    }

    public function update(Request $request, Barangmasuk $barangmasuk)
    {
        $jumlahMasukLama = $barangmasuk->jumlah_masuk;
        $jumlahMasukBaru = $request->jumlah_masuk;
        $idBarang = $request->id_namabarang;

        $barang = Namabarang::findOrFail($idBarang);

        if ($jumlahMasukBaru > $jumlahMasukLama) {
            $margin = $jumlahMasukBaru - $jumlahMasukLama;
            $barang->stok += $margin;
        }
        else if ($jumlahMasukBaru < $jumlahMasukLama) {
            $margin = $jumlahMasukLama - $jumlahMasukBaru;
            $barang->stok -= $margin;
        }

        $barangmasuk->jumlah_masuk = $jumlahMasukBaru;
        $barangmasuk->save();

        $barang->save();

        return redirect()
            ->route('item.management-incoming.index')
            ->withSuccess('Berhasil memperbarui data masuk');
    }

    public function store(Request $request)
    {
        $rules = [
            'tanggal' => 'required',
            'id_namabarang' => 'required',
            'jumlah_masuk' => 'required'
        ];
        $message = [
            'tanggal.required' => 'Tanggal tidak boleh kosong!',
            'id_namabarang.required' => 'Nama barang tidak boleh kosong!',
            'jumlah_masuk.required' => 'Jumlah masuk tidak boleh kosong!',
        ];
        $validate = $this->validate($request, $rules, $message);

        if($validate){
            Barangmasuk::create([
                'tanggal' => $request->tanggal,
                'id_namabarang' => $request->id_namabarang,
                'jumlah_masuk' => $request->jumlah_masuk
            ]);

            $barang = Namabarang::findOrFail($request->id_namabarang);
            $barang->stok += $request->jumlah_masuk;
            $barang->save();

            return redirect()->route('item.management-incoming.index')->with('success', 'Data barang masuk berhasil ditambahkan!');
        }

    }

    public function getDataBarang($id_namabarang){
        if($id_namabarang != null){
            $getDataBarang = Namabarang::findOrFail($id_namabarang);// Databarang::select('stok')->where('id_namabarang', $id_namabarang)->get();
            return response()
                ->json(['stok' => $getDataBarang->stok]);
        }
    }

}
