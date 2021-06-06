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
                    <a href="{{ route('item.create') }}" class="btn btn-primary">Tambah</a>
               </div>
          </div>
     </div>
     <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Stock</th>
                <th scope="col">Satuan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
               @foreach ($databarang as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->Namabarang->nama_barang }}</td>
                <td>{{ $item->Namabarang->stok }}</td>
                <td>{{ $item->Satuanbarang->satuan_barang  }}</td>
                <td>
                  <a href="{{ route('databarang-delete-databarang', $item->id_barang) }}" onclick="return confirm('Yakin ingin menghapus data?')" class="mb-2 fas fa-trash-alt bg-danger p-2 text-white rounded"></a>
                  <a href="{{ route('databarang-edit-databarang', $item->id_barang) }}" class="mb-2 fas fa-edit bg-success p-2 text-white rounded"></a>
                </td>
              </tr>
             @endforeach
            </tbody>
          </table>
        </div>
      </div>
     </div>
     {{-- <section class="content">
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
                                             <span class="mr-3">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                             </span>
                                   </a>
                                   {{-- <a href="{{ route('item.delete', $item->id_barang) }}">
                                        <span>
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                         </span>
                                   </a>
                                    --}}
                                   {{-- <livewire:item.inventory :item="$item">

                              </td>
                         </tr>
                         @endforeach
                    </tbody>
               </table>
               
          </div>
     </section> --}}
     
</div>
{{-- <livewire:item.inventory :items="$items"> --}}
@endsection