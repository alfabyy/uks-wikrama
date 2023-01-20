@extends('layouts.template')

@section('tab')
    Jadwal Piket
@endsection

@section('title')
    Jadwal Piket
@endsection


@section('content')
<div class="container-home" id="container-wrapper">
    <div class="row mb-3">
    <!-- Jumlah Data Pasien -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="haha row align-items-center">
                    <div class="col mr-5">
                        <div class="text-xl font-weight-bold text-uppercase mb-1">Senin</div>
                        <div class="h7 mb-0 font-weight-bold text-gray-800">
                            @foreach ($senin as $row)
                            <ul>
                                <li>{{$row->nama_petugas}}</li> 
                            </ul>
                            @endforeach
                        </div>
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
                        <div class="text-xl font-weight-bold text-uppercase mb-1">Selasa</div>
                        <div class="h7 mb-0 font-weight-bold text-gray-800">
                        @foreach ($selasa as $row)
                            <ul>
                                <li>{{$row->nama_petugas}}</li> 
                            </ul>
                            @endforeach
                        </div>
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
                    <div class="text-xl font-weight-bold text-uppercase mb-1">Rabu</div>
                        <div class="h7 mb-0 font-weight-bold text-gray-800">
                        @foreach ($rabu as $row)
                            <ul>
                                <li>{{$row->nama_petugas}}</li> 
                            </ul>
                            @endforeach
                        </div>
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
                    <div class="text-xl font-weight-bold text-uppercase mb-1">Kamis</div>
                        <div class="h7 mb-0 font-weight-bold text-gray-800">
                        @foreach ($kamis as $row)
                            <ul>
                                <li>{{$row->nama_petugas}}</li> 
                            </ul>
                            @endforeach
                        </div>
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
                        <div class="text-xl font-weight-bold text-uppercase mb-1">Jumat</div>
                        <div class="h7 mb-0 font-weight-bold text-gray-800">
                        @foreach ($jumat as $row)
                            <ul>
                                <li>{{$row->nama_petugas}}</li> 
                            </ul>
                            @endforeach
                        </div>
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
                    <div class="text-xl font-weight-bold text-uppercase mb-1">Sabtu</div>
                        <div class="h7 mb-0 font-weight-bold text-gray-800">
                        @foreach ($sabtu as $row)
                            <ul>
                                <li>{{$row->nama_petugas}}</li> 
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumlah Obat -->
    <div class="col-xl-4 col-md-5 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="haha row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xl font-weight-bold text-uppercase mb-1">Minggu</div>
                        <div class="h7 mb-0 font-weight-bold text-gray-800">
                        @foreach ($minggu as $row)
                            <ul>
                                <li>{{$row->nama_petugas}}</li> 
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection