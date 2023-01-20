@extends('layouts.template')

@section('tab')
    Detail Rekam Medis
@endsection

@section('title')
    Detail Rekam Medis
@endsection

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($msg = Session::get('gagal'))
    <div class="alert alert-danger">
        <p>{{ $msg }}</p>
    </div>
@endif

@section('content')
    <div class="container">
        <div class="siswa justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        {{-- <button type="button" type="button" data-toggle="modal"
                            data-target="#exampleModal{{ $pasien->id }}" class="btn btn-success"><i
                                class="fa-solid fa-print"></i> Cetak Raport Kesehatan</button> --}}

                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <th>Nama Pasien</th>
                                <th>: {{ $pasien->nama_pasien }}</th>
                            </tr>
                            <tr>
                                <th>Rombel</th>
                                <th>: {{ $pasien->rombel }}</th>
                            </tr>
                            <tr>
                                <th>Rayon</th>
                                <th>: {{ $pasien->rayon }}</th>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <th>: {{ $pasien->alamat }}</th>
                            </tr>
                            <tr>
                                <th>Tanggal Kunjungan</th>
                                <th>: {{ $pasien->tanggal_kunjungan }}</th>
                            </tr>
                            <tr>
                                <th>Suhu</th>
                                <th>: {{ $pasien->suhu }}</th>
                            </tr>
                            <tr>
                                <th>Tensi Darah</th>
                                <th>: {{ $pasien->tensi_darah }}</th>
                            </tr>
                            <tr>
                                <th>Keluhan</th>
                                <th>: {{ $pasien->keluhan }}</th>
                            </tr>
                            <tr>
                                <th>Status Pasien</th>
                                <th>: {{ $pasien->status_pasien }}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
<h3>Pemberian Makan</h3>
<br>
    <div class="container">
        <div class="siswa justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        {{-- <button type="button" type="button" data-toggle="modal"
                            data-target="#exampleModal{{ $pasien->id }}" class="btn btn-success"><i
                                class="fa-solid fa-print"></i> Cetak Raport Kesehatan</button> --}}

                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <th>Sarapan</th>
                                <th>: {{ $pasien->makan_pagi }}</th>
                            </tr>
                            <tr>
                                <th>Makan Siang</th>
                                <th>: {{ $pasien->makan_siang }}</th>
                            </tr>
                            <tr>
                                <th>Makan Malam</th>
                                <th>: {{ $pasien->makan_malam }}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <h3>Pemberian Obat</h3>
    <br>
        <div class="container">
            <div class="siswa justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
    
                            {{-- <button type="button" type="button" data-toggle="modal"
                                data-target="#exampleModal{{ $pasien->id }}" class="btn btn-success"><i
                                    class="fa-solid fa-print"></i> Cetak Raport Kesehatan</button> --}}
    
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <tr>
                                    <th>Obat Pagi</th>
                                    <th>: {{ $pasien->obat_pagi }}</th>
                                </tr>
                                <tr>
                                    <th>Jenis Obat Yang Diberikan</th>
                                    <th>: {{ $pasien->jenis_obat_pagi }}</th>
                                </tr>
                                <tr>
                                    <th>Jumlah Obat Yang Diberikan</th>
                                    <th>: {{ $pasien->jumlah_obat_pagi }}</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>Obat Siang</th>
                                    <th>: {{ $pasien->obat_siang }}</th>
                                </tr>
                                <tr>
                                    <th>Jenis Obat Yang Diberikan</th>
                                    <th>: {{ $pasien->jenis_obat_siang }}</th>
                                </tr>
                                <tr>
                                    <th>Jumlah Obat Yang Diberikan</th>
                                    <th>: {{ $pasien->jumlah_obat_siang }}</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>Obat Malam</th>
                                    <th>: {{ $pasien->obat_malam }}</th>
                                </tr>
                                <tr>
                                    <th>Jenis Obat Yang Diberikan</th>
                                    <th>: {{ $pasien->jenis_obat_malam }}</th>
                                </tr>
                                <tr>
                                    <th>Jumlah Obat Yang Diberikan</th>
                                    <th>: {{ $pasien->jumlah_obat_malam }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   
@endsection
