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
                    <h1 class="ml-2">Edit Barang Keluar</h1>
                </div>
            </div>
        </div>
    </div>
    
    <section class="content">
        <div class="container-fluid">
            
            <div class="card" style="width: 100%;">
                
                <div class="card-body pl-4">
                    
                    <form action="{{ route('item.barangkeluar-update-barangkeluar', $barangkeluar->id_barangkeluar) }}" method="POST">
                        @csrf
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" value="{{ $barangkeluar->tanggal }}" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal">
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
                                    @foreach ($barang as $item)
                                        <option value="{{ $item->id_namabarang }}" @if ($item->id_namabarang == $barangkeluar->id_namabarang) selected @endif disabled>{{ $item->nama_barang }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="id_namabarang" value="{{ $barangkeluar->id_barangkeluar }}">
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
                                <input type="number" name="stok" id="stok" min="0" value="{{ $barangkeluar->Namabarang->stok }}" class="form-control @error('stok') is-invalid @enderror" disabled>
                                @error('stok')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="jumlah_keluar">Jumlah Keluar</label>
                                <input type="number" name="jumlah_keluar" id="jumlah_keluar" min="0" value="{{ $barangkeluar->jumlah_keluar }}" class="form-control @error('jumlah_keluar') is-invalid @enderror">
                                @error('jumlah_keluar')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror

                                <div class="jumlah-keluar-message"></div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="total_stok">Total Stok</label>
                                <input type="number" name="total_stok" id="total_stok" min="0" value="{{ $barangkeluar->Namabarang->stok }}" class="form-control @error('total_stok') is-invalid @enderror" disabled>
                                @error('total_stok')
                                    <div>
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary mr-3 btn-submit" disabled="disabled">Simpan</button>
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

    <script>
        const jumlahKeluarField = document.querySelector('#jumlah_keluar');
        const stokField = document.querySelector('#stok');
        const totalStokField = document.querySelector('#total_stok');
        const message = document.querySelector('.jumlah-keluar-message');
        const btnSubmit = document.querySelector('.btn-submit');

        jumlahKeluarField.addEventListener('keyup', function (e) {
            let jumlah = jumlahKeluarField.value;
            let stok = stokField.value;

            let current = stok - jumlah;
            
            if (current < 0) {
                message.classList.add('text-danger');
                message.innerHTML = 'Jumlah keluar tidak boleh melebihi stok';
                btnSubmit.setAttribute('disabled', 'disabled');
            }
            else {
                message.classList.remove('text-danger');
                message.innerHTML = null;

                totalStokField.value = current;
                btnSubmit.removeAttribute('disabled');
            }
        })
    </script>
    @endsection