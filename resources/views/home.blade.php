@extends('layouts.template')

@section('tab')
Dasboard
@endsection

@section('title')
Dashboard
@endsection

@if(Auth::user()->role == 'admin')
@section('content')

<div class="container-home" id="container-wrapper">
    <script>
        console.log(@json($pasiens))
    </script>

    <div class="row mb-3">
        <!-- Jumlah Data Pasien -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="haha row align-items-center">
                        <div class="col mr-5">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Data Pasien</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pasiencount }}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span>Jumlah Total Pasien UKS</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumlah Pasien Dirawat -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="haha row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pasien Dirawat</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $rawatcount }}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span>Jumlah Pasien Dirawat di UKS</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-procedures fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumlah Pasien Rawat Jalan -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="haha row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pasien Rawat Sementara</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $rawatsementaracount }}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span>Jumlah Pasien Rawat Sementara</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-head-side-mask fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumlah Pasien Dirujuk -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="haha row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pasien Dirujuk</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $rujukcount }}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span>Jumlah Pasien Dirujuk</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-truck-medical fa-2x text-danger"></i><i class=""></i>
                            <i class=""></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumlah Pasien Sembuh -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="haha row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pasien Sembuh</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $sembuhcount }}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span>Jumlah Pasien Sembuh</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-circle-check fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumlah Obat -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="haha row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Data Obat</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $obatcount }}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span>Total Jumlah Obat</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pills fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Chart Data Jumlah Pasien Perbulan -->
        <div class="col-xl-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Rekap Bulanan Data Pasien</h6>
                </div>
                <div class="card-body">
                    <div id="pasienChart"></div>
                </div>
            </div>
        </div>

        <!-- Update Data Pasien -->
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Update Data Pasien</h6>
                    <a class="m-0 float-right btn btn-warning btn-sm" href="/pasien">View More <i class="fas fa-chevron-right"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama Pasien</th>
                                <th>Keluhan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($pasien as $row)
                            <tr class="text-center">
                                <td>{{$i++}}</td>
                                <td>{{$row->created_at->format('d/m/Y')}}</td>
                                <td>{{$row->nama_pasien}}</td>
                                <td>{{$row->keluhan}}</td>
                                <td>
                                    @if ($row->status_pasien == 'Rawat')
                                    <span class="badge bg-warning" style="color: white">Rawat</span>
                                    @else
                                    <span class="badge bg-primary" style="color: white">Rawat Sementara</span>
                                    @endif
                                </td>
                                <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                            </tr>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>

        <!-- List Data Obat -->
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Obat</h6>
                    <a class="m-0 float-right btn btn-warning btn-sm" href="/obat">View More <i class="fas fa-chevron-right"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obat as $row)
                            <tr class="text-center">
                                <td>{{$a++}}</td>
                                <td>{{$row->nama_obat}}</td>
                                <td>{{$row->jumlah_obat}}</td>
                                <td>
                                    @if ($row->status_obat == 'Tersedia')
                                    <span class="badge bg-success" style="color: white"><i class="fas fa-check"></i>
                                        Tersedia</span>
                                    @else
                                    <span class="badge bg-danger" style="color: white"><i class="fas fa-times"></i>
                                        Tidak Tersedia</span>
                                    @endif
                                </td>
                                <td><a href="/obat" class="btn btn-sm btn-primary">Detail</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@elseif (Auth::user()->role == 'petugas')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="row mb-3">
        <!-- Jumlah Data Pasien -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="haha row align-items-center">
                        <div class="col mr-5">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Data Pasien</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pasiencount }}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span>Jumlah Total Pasien UKS</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumlah Pasien Dirawat -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="haha row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pasien Dirawat</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $rawatcount }}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span>Jumlah Pasien Dirawat di UKS</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-procedures fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumlah Pasien Rawat Jalan -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="haha row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pasien Rawat Sementara</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $rawatsementaracount }}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span>Jumlah Pasien Rawat Sementara</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-head-side-mask fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumlah Pasien Dirujuk -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="haha row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pasien Dirujuk</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $rujukcount }}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span>Jumlah Pasien Dirujuk</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-truck-medical fa-2x text-danger"></i><i class=""></i>
                            <i class=""></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumlah Pasien Sembuh -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="haha row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pasien Sembuh</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $sembuhcount }}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span>Jumlah Pasien Sembuh</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-circle-check fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumlah Obat -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="haha row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Data Obat</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $obatcount }}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span>Total Jumlah Obat</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pills fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Chart Data Jumlah Pasien Perbulan -->
        <div class="col-xl-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Rekap Bulanan Data Pasien</h6>
                </div>
                <div class="card-body">
                    <div id="pasienChart"></div>
                </div>
            </div>
        </div>

        <!-- Update Data Pasien -->
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Update Data Pasien</h6>
                    <a class="m-0 float-right btn btn-warning btn-sm" href="/pasien">View More <i class="fas fa-chevron-right"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama Pasien</th>
                                <th>Keluhan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($pasien as $row)
                            <tr class="text-center">
                                <td>{{$i++}}</td>
                                <td>{{$row->created_at->format('d/m/Y')}}</td>
                                <td>{{$row->nama_pasien}}</td>
                                <td>{{$row->keluhan}}</td>
                                <td>
                                    @if ($row->status_pasien == 'Rawat')
                                    <span class="badge bg-warning" style="color: white">Rawat</span>
                                    @else
                                    <span class="badge bg-primary" style="color: white">Rawat Sementara</span>
                                    @endif
                                </td>
                                <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                            </tr>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>

        <!-- List Data Obat -->
        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Obat</h6>
                    <a class="m-0 float-right btn btn-warning btn-sm" href="/obat">View More <i class="fas fa-chevron-right"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obat as $row)
                            <tr class="text-center">
                                <td>{{$a++}}</td>
                                <td>{{$row->nama_obat}}</td>
                                <td>{{$row->jumlah_obat}}</td>
                                <td>
                                    @if ($row->status_obat == 'Tersedia')
                                    <span class="badge bg-success" style="color: white"><i class="fas fa-check"></i>
                                        Tersedia</span>
                                    @else
                                    <span class="badge bg-danger" style="color: white"><i class="fas fa-times"></i>
                                        Tidak Tersedia</span>
                                    @endif
                                </td>
                                <td><a href="/obat" class="btn btn-sm btn-primary">Detail</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@endif

@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
    var datas = <?php echo json_encode($datas) ?>

    Highcharts.chart('pasienChart', {
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Data Pasien'
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 150,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
        },
        xAxis: {
            categories: [
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'October',
                'November',
                'Desember',
            ]
        },
        yAxis: {
            title: {
                text: 'Pasien'
            }
        },
        tooltip: {
            shared: true,
            valueSuffix: ' Orang'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.5
            }
        },
        colors: ['#6777ef'],
        series: [{
            name: 'Pasien',
            data: datas
        }]
    });
</script>
@endsection