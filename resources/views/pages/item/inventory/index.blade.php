@extends('layouts.backend')

@section('content')
<div class="content-wrapper p-3">
     <div class="content-header">
          <div class="container-fluid">
               <div class="row mb-2 d-flex justify-content-between">
                    <div class="col-sm-6 d-flex align-items-center">
                         <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                         </svg>
                         <h1 class="ml-2">Data Barang</h1>
                    </div>
                    @hasrole('admin')
                    <a href="{{ route('item.create') }}" class="btn btn-primary">Tambah</a>
                    @endhasrole
               </div>
          </div>
     </div>
     
     <section class="content">
          <div class="container-fluid">
               
               <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                         <p>Tampilkan</p>
                         <select name="count" id="count">
                              <option value="5">5</option>
                              <option value="10">10</option>
                              <option value="15">15</option>
                         </select>
                    </div>
                    <div class="d-flex align-items-center">
                         <p class="mr-2">Cari</p>
                         <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                   <span class="input-group-text" id="basic-addon1">@</span>
                              </div>
                              <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                         </div>
                    </div>
               </div>
               
               <table class="table">
                    <thead>
                         <tr>
                              <th scope="col">No</th>
                              <th scope="col">Nama Barang</th>
                              <th scope="col">Jenis Barang</th>
                              <th scope="col">Stok</th>
                              <th scope="col">Satuan</th>
                              <th scope="col">Action</th>
                         </tr>
                    </thead>
                    <tbody>
                         @foreach ($items as $item)
                         <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>{{ $item->nama_barang }}</td>
                              <td>##</td>
                              <td>{{ $item->stok }}</td>
                              <td>{{ $item->unit->satuan_barang }}</td>
                              <td>
                                   <a href="{{ route('item.edit', $item->id_barang) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="green">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                   </a>
                                   
                                   <livewire:item.inventory :item="$item">

                              </td>
                         </tr>
                         @endforeach
                    </tbody>
               </table>
               
          </div>
     </section>
     
</div>
{{-- <livewire:item.inventory :items="$items"> --}}
@endsection