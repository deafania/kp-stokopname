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
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="username">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="usr">Satuan Barang</label>
                                <select class="custom-select" id="inputGroupSelect01" name="id_satuanbarang">
                                    <option selected>--- PILIH SATUAN BARANG ---</option>
                                    @foreach ($item_units as $item_unit)
                                        <option value="{{ $item_unit->id_satuanbarang }}">{{ $item_unit->satuan_barang }}</option>
                                    @endforeach
                                </select>
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