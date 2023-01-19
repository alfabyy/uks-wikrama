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
                                    <th>Rayon</th>
                                    <th>Rombel</th>
                                    <th>Jadwal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($petugas as $row)
                                    <tr class="text-center">
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->nama_petugas }}</td>
                                        <td>{{ $row->nama_rayon }}</td>
                                        <td>{{ $row->nama_rombel }}</td>
                                        <td>{{ $row->jadwal }}</td>
                                        <td>
                                            <form action="{{ route('petugas.destroy', $row->id) }}"
                                                onsubmit="return confirm('Hapus Petugas {{ $row->nama_petugas }} ?')"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" type="button" data-toggle="modal"
                                                    data-target="#exampleModal{{ $row->id }}"
                                                    class="btn btn-warning"><i class="fa fa-edit"></i></button>
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
        <!-- Modal edit -->
        @foreach ($petugas as $row)
            <div class="modal fade" id="exampleModal{{ $row->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Rombel</h5>
                        </div>
                        <form action="{{ route('petugas.update', $row->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="form-label">Nama Petugas</label>
                                    <input type="text" name="nama_petugas" value="{{ $row->nama_petugas }}"
                                        required='required' class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Rayon</label>
                                    <select name="nama_rayon" required="required" class="form-control">
                                        <option value="">--Pilih--</option>
                                        @foreach ($rayon as $row)
                                            <option value="{{ $row->nama_rayon }}"
                                                @if ($row->nama_rayon) selected @endif>{{ $row->nama_rayon }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Rombel</label>
                                    <select name="nama_rombel" required="required" class="form-control">
                                        <option value="">--Pilih--</option>
                                        @foreach ($rombel as $row)
                                            <option value="{{ $row->nama_rombel }}"
                                                @if ($row->nama_rombel) selected @endif>{{ $row->nama_rombel }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Jadwal</label>
                                    <select name="jadwal" required="required" class="form-control">
                                        @foreach ($petugas as $row)
                                            <option value="">-- Pilih Hari --</option>
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jumat">Jumat</option>
                                            <option value="Sabtu">Sabtu</option>
                                            <option value="Minggu">Minggu</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- Modal Tambah --}}
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
                                <select name="nama_rayon" required="required" class="form-control">
                                    <option value="">-- Pilih Rayon --</option>
                                    @foreach ($rayon as $row)
                                        <option value="{{ $row->nama_rayon }}">{{ $row->nama_rayon }}</option>
                                    @endforeach
                                </select>
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
                                <label class="form-label">Jadwal</label>
                                <select name="jadwal" required="required" class="form-control">
                                    <option value="">-- Pilih Hari --</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
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
        </div>
    </div>
@endsection













{{-- @extends('layouts.template')

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
@endsection --}}
