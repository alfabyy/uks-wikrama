@extends('layouts.template')

@section('tab')
    Obat
@endsection

@section('title')
    Data Obat
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- @if (Auth::user()->role == 'admin') --}}
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal" class="btn btn-success"><i
                            class="fa fa-plus"></i> Tambah</a>
                        {{-- @elseif (Auth::user()->role == 'petugas') --}}
                            {{-- <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal"
                                class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a> --}}
                        {{-- @else
                        @endif --}}
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($obat as $row)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration + $obat->perpage() * ($obat->currentpage() - 1) }}</td>
                                        <td>{{ $row->nama_obat }}</td>
                                        <td>{{ $row->jumlah_obat }}</td>
                                        <td>
                                            @if ($row->status_obat == 'Tersedia')
                                                <span class="badge bg-success" style="color: white"><i
                                                        class="fas fa-check"></i> Tersedia</span>
                                            @else
                                                <span class="badge bg-danger" style="color: white"><i
                                                        class="fas fa-times"></i> Tidak Tersedia</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('obat.destroy', $row->id) }}"
                                                onsubmit="return confirm('Hapus obat {{ $row->nama_obat }} ?')"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('obat.show', $row->id) }}" class="btn btn-primary"><i
                                                    class="fa fa-eye"></i></a>
                                                <button type="button" type="button" data-toggle="modal"
                                                data-target="#exampleModal" class="btn btn-warning"><i
                                                    class="fa fa-edit"></i></button>
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $obat->appends(Request::all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Tambah obat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('obat.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Nama Obat</label>
                                <input type="text" name="nama_obat" value="{{ old('nama_obat') }}" required='required'
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Fungsi Obat</label>
                                <input type="text" name="fungsi_obat" value="{{ old('fungsi_obat') }}" required='required'
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jumlah Obat</label>
                                <input type="number" name="jumlah_obat" value="{{ old('jumlah_obat') }}"
                                    required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select name="status_obat" required="required" class="form-control">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Kadaluarsa</label>
                                <input type="date" name="kadaluarsa_obat" value="{{ old('kadaluarsa_obat') }}"
                                    required='required' class="form-control">
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Rombel</h5>
            </div>
            <form action="{{ route('obat.update', $row->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label for="" class="form-label">Nama Obat :</label>
                    <input required type="text" name="nama_obat" value="{{ $row->nama_obat }}"
                        class="form-control" placeholder="Nama Obat...">
                    <label for="" class="form-label">Fungsi Obat :</label>
                    <input required type="text" class="form-control" name="fungsi_obat"
                        value="{{ $row->fungsi_obat }}" placeholder="Fungsi...">
                    <label for="" class="form-label">Jumlah stok :</label>
                    <input required type="number" min={{ $row->jumlah_obat }} class="form-control"
                        value="{{ $row->jumlah_obat }}" name="jumlah_obat" placeholder="Jumlah Obat...">
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select name="status_obat" id="status-edit" required="required" class="form-control">
                            <option value="Tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
