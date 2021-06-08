@extends('layouts.backend')

@section('content')
<div class="content-wrapper p-3">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <h1 class="ml-2">Edit Satuan Barang</h1>
                </div>
            </div>
        </div>
    </div>
    
    <section class="content">
        <div class="container-fluid">
            
            <div class="card" style="width: 100%;">
                <div class="card-body pl-4">

                    <form action="{{ route('databarang-update-databarang', $databarang->id_barang) }}" method="POST">
                        @csrf
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="id_namabarang">Nama Barang</label>
                                <select class="form-control @error('id_namabarang') is-invalid @enderror" id="id_namabarang" name="id_namabarang">
                                    <option value="">--- PILIH NAMA BARANG ---</option>
                                    @foreach ($namabarang as $item)
                                        <option value="{{ $item->id_namabarang }}" {{ $databarang->id_namabarang == $item->id_namabarang ? 'selected' : '' }}>{{ $item->nama_barang }}</option>
                                    @endforeach
                                </select>
                                @error('id_namabarang')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control @error('stok') is-invalid @enderror"
                                    id="stok" name="stok" value="{{ $databarang->Namabarang->stok }}">
                                @error('stok')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="usr">Satuan Barang</label>
                                <select class="form-control @error('id_satuanbarang') is-invalid @enderror" id="inputGroupSelect01" name="id_satuanbarang">
                                    <option value="">--- PILIH SATUAN BARANG ---</option>
                                    @foreach ($satuanbarang as $item)
                                        <option value="{{ $item->id_satuanbarang }}" {{ $databarang->id_satuanbarang == $item->id_satuanbarang ? 'selected' : '' }}>{{ $item->satuan_barang }}</option>
                                    @endforeach
                                </select>
                                @error('id_satuanbarang')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary mr-3">Simpan</button>
                            <button class="btn btn-light">Batal</button>
                        </div>
                    </form>
                    
                </div>
            </div>
            
        </div>
    </section>
</div>
@endsection