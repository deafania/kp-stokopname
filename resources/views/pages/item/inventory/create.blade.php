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
                    <h1 class="ml-2">Input Barang</h1>
                </div>
            </div>
        </div>
    </div>
    
    <section class="content">
        <div class="container-fluid">
            
            <div class="card" style="width: 100%;">
                <div class="card-body pl-4">

                    <form action="{{ route('item.store') }}" method="POST">
                        @csrf
                        {{-- <div class="col-md-5">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal">
                                @error('tanggal')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-5">
                            
                            <div class="form-group">
                                <label for="stok">Id Barang</label>
                                <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="">
                                @error('stok')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        
                        </div> --}}
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <select name="namabarang" id="nama_barang" class="form-control">
                                    @foreach ($nama_barang as $item)
                                        <option value="{{ $item->id_namabarang }}">{{ $item->nama_barang }}</option>
                                    @endforeach
                                </select>
                                @error('nama_barang')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" name="stok" id="stok" min="0" value="0" class="form-control">
                                @error('stok')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="id_satuanbarang">Satuan Barang</label>
                                <select name="id_satuanbarang" id="id_satuanbarang" class="form-control">
                                    @foreach ($item_units as $item)
                                        <option value="{{ $item->id_satuanbarang }}">{{ $item->satuan_barang }}</option>
                                    @endforeach
                                </select>
                                @error('id_satuanbarang')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="col-md-5">
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok">
                                @error('stok')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-5">
                            <div class="form-group">
                                <label for="stok">Jumlah Masuk</label>
                                <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok">
                                @error('stok')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="stok">Total Stok</label>
                                <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok">
                                @error('stok')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div> --}}
                        
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