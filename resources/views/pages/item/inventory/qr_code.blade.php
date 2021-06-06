@extends('layouts.backend')

@section('custom_head')
    <style>
         @media print {
              footer, .cta {
                   display: none;
              }

              .img-qr {
                   margin-top: 200px
              }
         }
    </style>
@endsection

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
               </div>
          </div>
     </div>
    <div class="card">
     <div class="card-body text-center">
          <div class="img-qr">
               {!! QrCode::size(250)->generate($target); !!}
          </div>

          <div class="cta">
               <h3 class="mt-3">Scan QR Code</h3>
               <a href="#" class="btn btn-info print-qr">Print QR Code</a>
          </div>
         </div>
       </div>
      </div>
    </div>
</div>
{{-- <livewire:item.inventory :items="$items"> --}}
@endsection

@push('custom_js')
    <script>
         document.title = 'QR Code Barang';
         
         let printQr = document.querySelector('.print-qr');
         printQr.addEventListener('click', function (e) {
               const svg = document.querySelector('.img-qr svg');
               svg.setAttribute('width', '500');
               svg.setAttribute('height', '500');

               window.print();
         });
    </script>
@endpush