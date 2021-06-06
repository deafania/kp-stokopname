@extends('layouts.backend')

@section('content')
<div class="content-wrapper p-3">
    
    <form action="{{ route('item.report.in.print') }}" method="post">
        @csrf

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 d-flex justify-content-between">
                    <div class="col-sm-6 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                        </svg>
                        <h1 class="ml-2">Laporan Data Barang Masuk</h1>
                    </div>
                    <input type="submit" value="Cetak" class="btn btn-primary">
                </div>
            </div>
        </div>
    
        <section class="content">
            <div class="container-fluid">
                <div class="d-flex">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="usr">Awal Tanggal</label>
                            <input type="date" class="form-control" id="usr" name="start_date" required>
                        </div>
                    </div>
    
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="usr">Akhir Tanggal</label>
                            <input type="date" class="form-control" id="usr" name="end_date" required>
                        </div>
                    </div>
                </div>
                {{-- <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          {{-- <th scope="col">Id Barang</th> --}}
                          {{-- <th scope="col">Tanggal</th>
                          <th scope="col">Id Barang</th>
                          <th scope="col">Nama Barang</th>
                          <th scope="col">Jumlah Masuk</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                        $no = 1;
                        @endphp
                         
                        <tr>
                          <td>{{ $no++ }}</td> --}}
                          {{-- <td>{{$kelas->id_kelas}}</td> --}}
                          {{-- <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>
                            {{-- <a class="mb-2 fas fa-edit bg-danger p-2 text-white rounded" href="/datakelas/{{$kelas->id_kelas}}/update"></a> --}}
                            {{-- <a href="" onclick="return confirm('Yakin ingin menghapus data?')" class="mb-2 fas fa-trash-alt bg-danger p-2 text-white rounded"></a>
                            <a href="" class="mb-2 fas fa-edit bg-success p-2 text-white rounded"></a>
                          </td>
                        </tr>
                   
                      </tbody>
                    </table>
                  </div>
                </div> --}}
                {{-- <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nos</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Id Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jumlah Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>20 - 08 -2000</td>
                            <td>000001</td>
                            <td>Pena</td>
                            <td>10</td>
                            <td class="d-flex">
                                <span class="mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                </span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table> --}}
                
            </div>
        </section>
    </form>
</div>
@endsection