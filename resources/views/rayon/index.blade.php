@extends('layouts.template')

@section('tab')
Rayon
@endsection

@section('title')
Data Rayon
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>


                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Nama Rayon</th>
                                <th>Pembimbing Siswa</th>
                                <th>No Telp</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rayons as $row)
                            <tr class="text-center">
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->nama_rayon }}</td>
                                <td>{{ $row->nama_pembimbing }}</td>
                                <td>{{ $row->no_telp }}</td>
                                <td>
                                    <form action="{{ route('rayon.destroy', $row->id) }}" onsubmit="return confirm('Yakin Hapus Rayon {{ $row->nama_rayon }} ?')" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button" type="button" data-toggle="modal" data-target="#exampleModal{{ $row->id }}" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $rayons->appends(Request::all())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Tambah --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Tambah Rayon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('rayon.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label">Nama Rayon</label>
                            <input type="text" name="nama_rayon" value="{{ old('nama_rayon') }}" required='required' class="form-control" placeholder="Rayon">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Pembimbing Siswa</label>
                            <input type="text" name="nama_pembimbing" value="{{ old('nama_pembimbing') }}" required='required' class="form-control" placeholder="Pembimbing">
                        </div>
                        <div class="form-group">
                            <label class="form-label">No Telp</label>
                            <input type="number" name="no_telp" value="{{ old('no_telp') }}" required='required' class="form-control" placeholder="Telp">
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

{{-- Modal Edit --}}
@foreach ($rayons as $row)
<div class="modal fade" id="exampleModal{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Rayon</h5>
            </div>
            <form action="{{ route('rayon.update', $row->id) }}" method="POST">

                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label for="" class="form-label">Nama Rayon :</label>
                    <input required type="text" class="form-control" value="{{ $row->nama_rayon }}" name="nama_rayon" placeholder="Rayon...">
                    <label for="" class="form-label">Nama Pembimbing :</label>
                    <input required type="text" class="form-control" value="{{ $row->nama_pembimbing }}" name="nama_pembimbing" placeholder="Pembimbing...">
                    <label for="" class="form-label">No HP Pembimbing :</label>
                    <input required type="number" class="form-control" value="{{ $row->no_telp }}" name="no_telp" placeholder="+62 8xx-xxxx-xxxx">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Modal Tambah --}}
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-body">
            <div class="form-group">
                <label class="form-label">Nama Rayon</label>
                <input type="text" name="nama_rayon" value="{{ old('nama_rayon') }}" required='required' class="form-control">
            </div>
            <div class="form-group">
                <label class="form-label">Pembimbing Siswa</label>
            </div>
            <div class="form-group">
                <label class="form-label">No Telp</label>
                <input type="number" name="no_telp" value="{{ old('no_telp') }}" required='required' class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <div>
                @endforeach
                @endsection