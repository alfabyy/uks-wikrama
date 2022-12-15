@extends('layouts.template')

@section('tab')
Detail Obat
@endsection

@section('title')
Detail Obat
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Obat
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Nama Obat</th>
                            <th>: {{$obat->nama_obat}}</th>
                        </tr>
                        <tr>
                            <th>Fungsi Obat</th>
                            <th>: {{($obat->fungsi_obat)}}</th>
                        </tr>
                        <tr>
                            <th>Jumlah Obat</th>
                            <th>: {{($obat->jumlah_obat)}}</th>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <th>: {{($obat->status_obat)}}</th>
                        </tr>
                        <tr>
                            <th>Kadaluarsa</th>
                            <th>: {{($obat->kadaluarsa_obat)}}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
