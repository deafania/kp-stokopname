@extends('layouts.backend')

@section('custom_head')
    <style>
        @media print {
            @page {
                size: A4;
            }

            nav, aside, footer {
                display: none
            }

            * {
                 width: 100%
            }
        }
    </style>
@endsection

@section('content')
<div class="content-wrapper p-3">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex align-items-center">
                    <input type="button" value="Print" class="btn btn-primary btn-print">
                </div>
            </div>
        </div>
    </div>
    
    <section class="content">
        <div class="container-fluid" id="print">
          <div class="row">
               <div class="col-12">
                    <div class="card">
                         <div class="card-body">
                                  <div class="print_head">
                                   <table class="table th m-0 borderless" style="border-bottom: 3px;">
                                        <tr class="bb2">
                                            <td class="border-none" style="width: 20%; text-align: center">
                                              <img alt="Logo 1"
                                              src="https://www.unib.ac.id/wp-content/uploads/2019/10/thumb-300x300.png"
                                              class="img-fluid img_logo img-responsive"
                                              style="width: 65%">
                                            </td>
                                            <td class="text-center border-none" style="text-align: center; width: 60%">
                                            <h5 style="font-weight: bold;;">
                                              <span class="s1">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</span>
                                            <br>
                                            <span class="s2">UNIVERSITAS BENGKULU</span>

                                           <br>
                                           <span class="s3">FAKULTAS TEKNIK</span>
                                          
                                            <br>
                                            <span class="s4">UKM MOSLEM’S STATION OF ENGINEERING (MOSTANEER)</span>
                                            </h5>
         
                                            <span class="address">
                                              <i><span class="s5">Sekretariat: Aula Terpadu Fakultas Teknik UNIB Jl. WR. Supratman Kandang Limun Bengkulu</span></i>
                                            </span>
                                            </td>
                                            <td style="border-left: none; width: 20%;  text-align: center">
                                              <img alt="Logo 2"
                                                  src="https://www.unib.ac.id/wp-content/uploads/2019/10/thumb-300x300.png"
                                                  class="img-fluid img_logo img-responsive"
                                                  style="width: 65%">
                                            </td>
                                        </tr>
                                    </table>
         
                                    <div style="border: 1px solid #333; margin-bottom: 3px;" class="line-1"></div>
                                    <div style="border: 2px solid #333; margin-bottom: 30px;"></div>
                                  </div>

                                  <div>Tanggal awal: {{ date('l, d F Y', strtotime($startDate)) }}</div>
                                  <div>Tanggal akhir: {{ date('l, d F Y', strtotime($endDate)) }}</div>

                              <table class="table table-bordered table-striped"
                                   style="width: 100%;border-collapse: collapse; margin-top: 15px;">
                                   <thead>
                                        <tr>
                                             <th style="border: 1px solid black;">No</th>
                                             <th style="border: 1px solid black;">Tanggal</th>
                                             <th style="border: 1px solid black;">Nama Barang</th>
                                             <th style="border: 1px solid black;">Jumlah Masuk</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                 <td style="border: 1px solid black; padding-left: 10px;">{{ $loop->index + 1 }}</td>
                                                 <td style="border: 1px solid black; padding-left: 10px;">{{ $item->tanggal }}</td>
                                                 <td style="border: 1px solid black; padding-left: 10px;">{{ $item->Namabarang->nama_barang }}</td>
                                                 <td style="border: 1px solid black; padding-left: 10px;">{{ $item->jumlah_masuk }}</td>
                                            </tr>
                                        @endforeach
                                   </tbody>
                              </table>
                         </div>
                    </div>
               </div>
          </div>
        </div>
    </section>
</div>
@endsection

@push('custom_js')
    <script>
     //     window.print();
         let btnPrint = document.querySelector('.btn-print');
         btnPrint.addEventListener('click', function (e) {
          var printContent = document.getElementById('print');
         var windowUrl = 'about:blank';
         var uniqueName = new Date();
         var windowName = 'Laporan {{ $startDate }} sampai {{ $endDate }}';
        
         var printWindow = window.open(windowUrl, windowName, 'left=5000,top=5000,width=800,height=600');                                   
         var cssNode = document.createElement('link');
         cssNode.type = 'text/css';
         cssNode.rel = 'stylesheet';
         cssNode.href = '../../css/print.css';
         cssNode.media = 'print';
         printWindow.document.head.appendChild(cssNode);         
         printWindow.document.body.innerHTML = printContent.innerHTML;
         printWindow.document.close();
         printWindow.focus();
         printWindow.print();
         printWindow.close();
         return false;
         })
    </script>
@endpush