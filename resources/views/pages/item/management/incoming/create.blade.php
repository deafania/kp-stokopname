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
                    <h1 class="ml-2">Input Nama Barang</h1>
                </div>
            </div>
        </div>
    </div>
    
    <section class="content">
        <div class="container-fluid">
            
            <div class="card" style="width: 100%;">
                
                <div class="card-body pl-4">
                    
                    <form action="{{ route('item.management-incoming.store') }}" method="POST">
                        @csrf
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal">
                                @error('tanggal')
                                            <div>
                                                <p class="text-danger">{{ $message }}</p>
                                            </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="id_namabarang">Nama Barang</label>
                                <select name="id_namabarang" id="id_namabarang" class="form-control @error('id_namabarang') is-invalid @enderror">
                                    <Option value="">Pilih Nama Barang</Option>
                                    @foreach ($namabarang as $item)
                                        <option value="{{ $item->id_namabarang }}">{{ $item->nama_barang }}</option>
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
                                <input type="number" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror" readonly>
                                @error('stok')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="jumlah_masuk">Jumlah Masuk</label>
                                <input type="number" name="jumlah_masuk" id="jumlah_masuk" class="form-control @error('jumlah_masuk') is-invalid @enderror">
                                @error('jumlah_masuk')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="total_stok">Total Stok</label>
                                <input type="number" name="total_stok" id="total_stok" class="form-control @error('total_stok') is-invalid @enderror" readonly>
                                @error('total_stok')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary mr-3">Simpan</button>
                            <button type="reset" class="btn btn-light">Batal</button>
                        </div>
                    </form>
                    
                    {{-- <div class="card-body pl-4">
                        
                        <div class="d-flex">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="usr">Awal Tanggal</label>
                                    <input type="date" class="form-control" id="usr" name="username">
                                </div>
                            </div>
                            
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="usr">Akhir Tanggal</label>
                                    <input type="date" class="form-control" id="usr" name="username">
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="d-flex">
                            <button class="btn btn-primary mr-3">Cetak</button>
                            <button class="btn btn-light">Batal</button>
                        </div>
                        
                    </div> --}}
                    
                </div>
                
            </div>
        </section>
    </div>
    @endsection
