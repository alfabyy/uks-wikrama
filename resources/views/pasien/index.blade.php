@extends('layouts.template')

@section('tab')
Pasien
@endsection

@section('title')
Pasien
@endsection

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- @if(Auth::user()->role == 'admin')
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal" class="btn btn-success"><i
                            class="fa fa-plus"></i> Tambah</a>
                    @elseif (Auth::user()->role == 'petugas') --}}
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal" class="btn btn-success"><i
                            class="fa fa-plus"></i> Tambah</a>
                    {{-- @else
                    @endif --}}
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nama Pasien</th>
                                <th>Rombel</th>
                                <th>Rayon</th>
                                <th>Status Pasien</th>
                                <th>Tanggal Kunjungan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasien as $row)
                            <tr class="text-center">
                                <td>{{$loop->iteration + ($pasien->perpage() * ($pasien->currentpage() -1)) }}
                                </td>
                                <td>{{$row->nama_pasien}}</td>
                                <td>{{$row->rombel}}</td>
                                <td>{{$row->rayon}}</td>
                                <td class="">
                                    @if ($row->status_pasien == 'Rawat')
                                    <span class="badge bg-warning" style="color: white">Rawat</span>
                                    @elseif ($row->status_pasien == 'Rawat Sementara')
                                    <span class="badge bg-primary" style="color: white">Rawat Sementara</span>
                                    @elseif ($row->status_pasien == 'Dirujuk')
                                    <span class="badge bg-danger" style="color: white">Dirujuk</span>
                                    @else
                                    <span class="badge bg-success" style="color: white">Sembuh</span>
                                    @endif
                                </td>
                                <td>{{$row->tanggal_kunjungan}}</td>
                                <td>
                                    <form action="{{route('pasien.destroy', $row->id)}}"
                                        onsubmit="return confirm('Hapus Data Sakit {{$row->nama_pasien}} ?')"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        {{-- @if(Auth::user()->role == 'admin') --}}
                                        <a href="{{route('pasien.edit', $row->id)}}" class="btn btn-warning"><i
                                                class="fa fa-edit"></i></a>
                                        <button type="submit" class="btn btn-danger"><i
                                                class="fa fa-trash"></i></button>
                                        {{-- @elseif (Auth::user()->role == 'petugas') --}}
                                        {{-- <a href="{{route('pasien.edit', $row->id)}}" class="btn btn-warning"><i
                                                class="fa fa-edit"></i></a>
                                        <button type="submit" class="btn btn-danger"><i
                                                class="fa fa-trash"></i></button> --}}
                                        {{-- @else
                                        @endif --}}
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$pasien->appends(Request::all())->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addModal" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Tambah Rekam Medis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('pasien.store')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="form-label">Nama Pasien</label>
                            <input name="nama_pasien" value="{{old('nama_pasien')}}" required='required' class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Rombel</label>
                            <select name="nama_rombel" required="required" class="form-control">
                                <option value="">-- Pilih Rombel --</option>
                                @foreach ($rombel as $row)
                                    <option value="{{ $row->nama_rombel }}">{{ $row->nama_rombel }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Rayon</label>
                            <select name="nama_rayon" required="required" class="form-control">
                                <option value="">-- Pilih Rayon --</option>
                                @foreach ($rayon as $row)
                                    <option value="{{ $row->nama_rayon }}">{{ $row->nama_rayon }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" value="{{old('alamat')}}" required='required' class="form-control"
                                rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Tanggal Kunjungan</label>
                            <input type="date" name="tanggal_kunjungan" value="{{old('tanggal_kunjungan')}}" required='required' class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Suhu</label>
                            <input name="suhu" value="{{old('suhu')}}" required='required' class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Tensi Darah</label>
                            <input name="tensi_darah" value="{{old('tensi_darah')}}" required='required' class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Penyakit/Keluhan</label>
                            <textarea name="keluhan" value="{{old('keluhan')}}" required='required' class="form-control"
                                rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Status Pasien</label>
                            <select name="status_pasien" required="required" class="form-control">
                                <option value="">-- Pilih Status --</option>
                                <option value="Rawat Sementara">Rawat Sementara</option>
                                <option value="Rawat">Rawat</option>
                                <option value="Dirujuk">Dirujuk</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-primary">Tambah</button>
                        <button type="reset" class="btn btn-outline-warning">Reset</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script>
        $(document).ready(function() {
            $('.js-states').select2();
        });
        $("#id_pasien").select2({
            placeholder: "Select a programming language",
            allowClear: true
        });
        </script>
    </div>
</div>
@endsection
