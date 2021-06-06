@extends('layouts.backend')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 d-flex justify-content-between">
            <div class="col-sm-6 d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                </svg>
                <h1 class="ml-2">Satuan Barang</h1>
            </div>
            <a href="{{ route('item.unit.create') }}" class="btn btn-primary">Tambah</a>
        </div>
      </div>
    <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  {{-- <th scope="col">Id Kelas</th> --}}
                  <th scope="col">Satuan Barang</th>
                 
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($SatuanBarang as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->satuan_barang }}</td>
                    <td>
                      <a href="{{ route('item.satuan-delete', $item->id_satuanbarang) }}" onclick="return confirm('Yakin ingin menghapus data?')" class="mb-2 fas fa-trash-alt bg-danger p-2 text-white rounded"></a>
                      <a href="{{ route('item.satuan-edit', $item->id_satuanbarang) }}" class="mb-2 fas fa-edit bg-success p-2 text-white rounded"></a>
                    </td>
                  </tr>
                  @endforeach
               
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
@endsection