<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <title>Data Barang</title>

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

     <style>
          @media print {
               .btn-print {
                    display: none;
               }
          }
     </style>
     {{-- <style>
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
      </style> --}}
</head>
<body>
     <div class="container">
          <div class="row">
               <div class="col-12 mt-5">
                    <div class="mb-3 btn-print">
                         <input type="button" value="Cetak" class="btn btn-primary" onclick="window.print();">
                    </div>
                    <div class="table-responsive">
                         <table class="table table-striped table-bordered table-condensed">
                              <thead class="thead-dark">
                                   <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Stok</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   @foreach ($databarang as $item)
                                   <tr>
                                        <td style="border: 1px solid black; padding-left: 10px;">{{ $loop->index + 1 }}</td>
                                        <td style="border: 1px solid black; padding-left: 10px;">{{ $item->Namabarang->nama_barang }}</td>
                                        <td style="border: 1px solid black; padding-left: 10px;">{{ $item->Satuanbarang->satuan_barang  }}</td>
                                        <td style="border: 1px solid black; padding-left: 10px;">{{ $item->Namabarang->stok }}</td>
                                   </tr>
                                   @endforeach
                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
     </div>
</body>
</html>