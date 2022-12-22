@extends('layouts.template')

@section('tab')
Edit Rayon
@endsection

@section('title')
Edit Rayon
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Rayon
                </div>
                <div class="card-body">
                    <form action="{{route('rayon.update', $rayon->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Nama Rayon</label>
                                <input type="text" name="nama_rayon" value="{{$rayon->nama_rayon}}" required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Pembimbing Siswa</label>
                                <input type="text" name="nama_pembimbing" value="{{$rayon->nama_pembimbing}}" required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">No Telp</label>
                                <input type="text" name="no_telp" value="{{$rayon->no_telp}}" required='required' class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button href="{{ route('rayon.index') }}" type="submit" class="btn btn-danger">Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
