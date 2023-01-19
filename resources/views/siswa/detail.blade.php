@extends('layouts.template')

@section('tab')
Detail Siswa
@endsection

@section('title')
Detail Siswa
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
                   
                    <button type="button" type="button" data-toggle="modal"
                                                        data-target="#exampleModal{{ $siswa->id }}" class="btn btn-success"><i
                                                            class="fa-solid fa-print"></i> Cetak Raport Kesehatan</button>
                                                           
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>NIS</th>
                            <th>: {{$siswa->nis}}</th>
                        </tr>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>: {{$siswa->nama}}</th>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <th>: {{$siswa->tanggal_lahir}}</th>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <th>: {{$siswa->jenis_kelamin}}</th>
                        </tr>
                        <tr>
                            <th>Rayon</th>
                            <th>: {{($siswa->rayon)}}</th>
                        </tr>
                        <tr>
                            <th>Rombel</th>
                            <th>: {{$siswa->rombel}}</th>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <th>: {{$siswa->alamat}}</th>
                        </tr>
                        <tr>
                            <th>Tinggi Badan</th>
                            <th>: {{$siswa->tinggi_badan}}</th>
                        </tr>
                        <tr>
                            <th>Berat Badan</th>
                            <th>: {{$siswa->berat_badan}}</th>
                        </tr>
                        <tr>
                            <th>IMT</th>
                            <th>: </th>
                        </tr>
                        <tr>
                            <th>Penyakit Bawaan</th>
                            <th>: {{$siswa->penyakit_bawaan}}</th>
                        </tr>
                        <tr>
                            <th>Alergi</th>
                            <th>: {{$siswa->alergi}}</th>
                        </tr>
                        <tr>
                            <th>Hobi</th>
                            <th>: {{$siswa->hobi}}</th>
                        </tr>
                        <tr>
                            <th>Makanan Kesukaan</th>
                            <th>: {{$siswa->makanan_kesukaan}}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit -->

<div class="modal fade" id="exampleModal{{ $siswa->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
        </div>
        {{-- <form action="{{ route('siswa.update', $siswa->id) }}" method="POST"> --}}
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>NIS</th>
                            <th>: {{$siswa->nis}}</th>
                        </tr>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>: {{$siswa->nama}}</th>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <th>: {{$siswa->tanggal_lahir}}</th>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <th>: {{$siswa->jenis_kelamin}}</th>
                        </tr>
                        <tr>
                            <th>Rayon</th>
                            <th>: {{($siswa->rayon)}}</th>
                        </tr>
                        <tr>
                            <th>Rombel</th>
                            <th>: {{$siswa->rombel}}</th>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <th>: {{$siswa->alamat}}</th>
                        </tr>
                        <tr>
                            <th>Tinggi Badan</th>
                            <th>: {{$siswa->tinggi_badan}}</th>
                        </tr>
                        <tr>
                            <th>Berat Badan</th>
                            <th>: {{$siswa->berat_badan}}</th>
                        </tr>
                        <tr>
                            <th>IMT</th>
                            <th>: </th>
                        </tr>
                        <tr>
                            <th>Penyakit Bawaan</th>
                            <th>: {{$siswa->penyakit_bawaan}}</th>
                        </tr>
                        <tr>
                            <th>Alergi</th>
                            <th>: {{$siswa->alergi}}</th>
                        </tr>
                        <tr>
                            <th>Hobi</th>
                            <th>: {{$siswa->hobi}}</th>
                        </tr>
                        <tr>
                            <th>Makanan Kesukaan</th>
                            <th>: {{$siswa->makanan_kesukaan}}</th>
                        </tr>
                        <tr>
                            <th>Catatan*</th>
                            <th>: {{$siswa->catatan}}</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                    </table>
                    <h6>Keterangan : * Wajib Diisi</h6>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-outline-primary"><i class="fa-solid fa-print"></i> Print</a>            
            </div>

        </form>
    </div>
</div>
</div>



@endsection
