@extends('layouts.template')

@section('tab')
Edit Rombel
@endsection

@section('title')
Edit Rombel
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Rombel
                </div>
                <div class="card-body">
                    <form action="{{route('rombel.update', $rombel->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Nama Rombel</label>
                                <input type="text" name="nama_rombel" value="{{$rombel->nama_rombel}}" required='required' class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button href="{{ route('rombel.index') }}" type="submit" class="btn btn-danger">Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
