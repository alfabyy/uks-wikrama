@extends('layouts.template')

@section('tab')
    Petugas
@endsection

@section('title')
    Data Petugas
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                            <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal"
                                class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>


                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>Nama</th>
                                    <th>Rayon</th>
                                    <th>Rombel</th>
                                    <th>Jadwal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($petugas as $row)
                                    <tr class="text-center">
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->rayon }}</td>
                                        <td>{{ $row->rombel }}</td>
                                        <td>{{ $row->jadwal }}</td>
                                        <td>
                                            <form action="{{ route('petugas.destroy', $row->id) }}"
                                                onsubmit="return confirm('Hapus Petugas {{ $row->nama_petugas}} ?')"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('petugas.edit', $row->id) }}" class="btn btn-warning"><i
                                                        class="fa fa-edit"></i></a>
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $petugas->appends(Request::all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Tambah Petugas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('petugas.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Nama Petugas</label>
                                <input type="text" name="nama_petugas" value="{{ old('nama_petugas') }}"
                                    required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Rayon</label>
                                <input type="text" name="nama_rayon" value="{{ old('nama_rayon') }}"
                                    required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Rombel</label>
                                <input type="text" name="nama_rombel" value="{{ old('no_rombel') }}"
                                    required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jadwal</label>
                                <input type="date" name="jadwal_petugas" value="{{ old('jadwal_petugas') }}"
                                    required='required' class="form-control">
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-primary">Tambah</button>
                            <button type="reset" class="btn btn-outline-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection