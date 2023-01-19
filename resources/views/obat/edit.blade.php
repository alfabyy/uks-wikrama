@extends('layouts.template')

@section('tab')
Edit Obat
@endsection

@section('title')
Edit Obat
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Obat
                </div>
                <div class="card-body">
                    <form action="{{route('obat.update', $obat->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Nama Obat</label>
                                <input type="text" name="nama_obat" value="{{$obat->nama_obat}}" required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Fungsi Obat</label>
                                <input name="fungsi_obat" value="{{$obat->fungsi_obat}}" required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jumlah Obat</label>
                                <input type="number" name="jumlah_obat" value="{{$obat->jumlah_obat}}" required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select name="status_obat" required="required" class="form-control">
                                    <option value="{{$obat->status_obat}}">{{$obat->status_obat}}</option>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Kadaluarsa</label>
                                <input type="date" name="kadaluarsa_obat" value="{{$obat->kadaluarsa_obat}}" required='required' class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button href="{{ route('obat.index') }}" type="submit" class="btn btn-danger">Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection