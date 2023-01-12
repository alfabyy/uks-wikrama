@extends('layouts.template')

@section('tab')
    Rombel
@endsection

@section('title')
    Data Rombel
@endsection

@section('content')
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- @if (Auth::user()->role == 'admin') --}}
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal" class="btn btn-success"><i
                                class="fa fa-plus"></i> Tambah</a>
                        {{-- @elseif (Auth::user()->role == 'petugas')
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal"
                                class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
                        @else
                        @endif --}}
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Nama rombel</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($rombel as $row)
                                    <tr class="text-center">
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->nama_rombel }}</td>
                                        <td>
                                            <form action="{{ route('rombel.destroy', $row->id) }}"
                                                onsubmit="return confirm('Hapus Rombel {{ $row->nama_rombel }} ?')"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" type="button" data-toggle="modal"
                                                    data-target="#exampleModal" class="btn btn-info"><i
                                                        class="fa fa-edit"></i></button>
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $rombel->appends(Request::all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal edit -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Rombel</h5>
                    </div>
                    <form action="{{ route('rombel.update', $row->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Nama Rombel</label>
                                <input type="text" name="nama_rombel" value="{{ $row->nama_rombel }}" required='required'
                                    class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button href="{{ route('rombel.index') }}" type="submit"
                                class="btn btn-danger">Kembali</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        {{-- modal tambah --}}
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Tambah Rombel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('rombel.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Nama rombel</label>
                                <input type="text" name="nama_rombel" value="{{ old('nama_rombel') }}"
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
@endsection
