@extends('layouts.backend')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="data-keluar-masuk"></div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Barang dibawah 5</h5>
                        </div>
                        <div class="card-body">
                            @if (count($barangDibawahLima) > 0)
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Barang</th>
                                                <th scope="col">Stok</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($barangDibawahLima as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama_barang }}</td>
                                                    <td>{{ $item->stok }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    Tidak ada barang dengan stok dibawah 5
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@push('custom_js')
<script src="https://code.highcharts.com/highcharts.src.js"></script>

<script>
    Highcharts.chart('data-keluar-masuk', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Barang Keluar - Masuk per Bulan Tahun 2021'
    },
    subtitle: false,
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agt',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} barang</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Keluar',
        data: [
            @foreach (getDataBarangKeluar() as $data)
                @if ($data[0]->jumlah_keluar == null)
                    0,
                @else
                    {{ $data[0]->jumlah_keluar }},
                @endif
            @endforeach
        ]

    }, {
        name: 'Masuk',
        data: [
            @foreach (getDataBarangMasuk() as $data)
                @if ($data[0]->jumlah_masuk == null)
                    0,
                @else
                    {{ $data[0]->jumlah_masuk }},
                @endif
            @endforeach
        ]

    }]
});
</script>
@endpush