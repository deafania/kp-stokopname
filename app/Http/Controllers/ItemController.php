<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Databarang;
use App\Models\Namabarang;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Satuanbarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ItemController extends Controller
{
    public function index()
    {
        $databarang = Databarang::all();
    
        return view('pages.item.inventory.index', compact('databarang'));
    }

    public function create(){
        $item_units = Satuanbarang::all();
        $nama_barang = Namabarang::all();
        return view('pages.item.inventory.create', compact('item_units', 'nama_barang'));
    }

    public function store(Request $request)
    {   
        // dd($request->all());
        $rules = [
            'namabarang' => 'required',
            'stok' => 'required|numeric',
            'id_satuanbarang' => 'required'
        ];
        $message = [
            'id_namabarang.required' => 'Nama barang tidak boleh kosong!',
            'stok.required' => 'Stok tidak boleh kosong!',
            'id_satuanbarang.required' => 'Satuan barang tidak boleh kosong!',
        ];
        $validate = $this->validate($request, $rules, $message);

        if($validate) {
            Databarang::create([
                'id_namabarang' => $request->namabarang,
                'stok' => $request->stok,
                'id_satuanbarang' => $request->id_satuanbarang
            ]);
            $barang = Namabarang::find($request->namabarang);
            $barang->stok = $request->stok;
            $barang->save();

            return redirect()->route('item.index')->with('success', 'Data barang berhasil dibuat');
        }

    }

    // public function edit($id_barang)
    // {
    //     $item_units = Satuanbarang::all();
    //     $item = Databarang::where('id_barang', $id_barang)->first();
    //     return view('pages.item.inventory.edit', compact('item', 'item_units'));
    // }

    public function update(Request $request, Databarang $databarang)
    {
        $rules = [
            'id_namabarang' => 'required',
            'stok' => 'required',
            'id_satuanbarang' => 'required'
        ];
        $message = [
            'id_namabarang.required' => 'Nama barang tidak boleh kosong!',
            'stok.required' => 'Stok tidak boleh kosong!',
            'id_satuanbarang.required' => 'Satuan barang tidak boleh kosong!',
        ];
        $validate = $this->validate($request, $rules, $message);

        if($validate){
            $databarang->update([
                'id_namabarang' => $request->id_namabarang,
                'stok' => $request->stok,
                'id_satuanbarang' => $request->id_satuanbarang
            ]);

            $barang = Namabarang::find($request->id_namabarang);
            $barang->stok = $request->stok;
            $barang->save();

            return redirect()->route('item.index')->with('success', 'Data barang berhasil diupdate');
        }
    }

    public function destroy($id_barangkeluar)
    {   
        Databarang::where('id_barang', $id_barangkeluar)->delete();

        return redirect()->route('item.index')->with('success', 'Data barang berhasil didelete');
    }

    public function editbarang(Databarang $databarang)
    {
        $satuanbarang = Satuanbarang::all();
        $namabarang = Namabarang::all();
        return view('pages.item.inventory.edit', compact('databarang', 'satuanbarang', 'namabarang'));
    }
    public function delete(Databarang $databarang)
    {
        $databarang->delete();
        return redirect()->route('item.index')->with('success', 'Data barang berhasil didelete!');
    }

    public function qr_code()
    {
        $base_path = base_path();
        $bases = explode('\\', $base_path);
        $path = $bases[3];
        
        $target = 'http://'. getHostByName(getHostName()) .'/'. $path .'/public/data-barang';

        return view('pages.item.inventory.qr_code', compact('target'));
    }

    public function qr_code_download()
    {
        $base_path = base_path();
        $bases = explode('\\', $base_path);
        $path = $bases[3];
        
        $target = 'http://'. getHostByName(getHostName()) .'/'. $path .'/public/data-barang';
        $time = time();
        
        QrCode::generate($target, '../public/qrcodes/qr_'. $time .'.svg');

       $file = public_path('qrcodes/') . 'qr_'. $time .'.svg';
       return Response::download($file);
    }

    public function data_barang()
    {
        $databarang = Databarang::all();
    
        return view('pages.item.inventory.data', compact('databarang'));
    }
}
