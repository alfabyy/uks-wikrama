@extends('layouts.template')

@section('tab')
    Siswa
@endsection

@section('title')
    Data Siswa
@endsection

@section('content')
<link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- @if (Auth::user()->role == 'admin') --}}
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal"
                                class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
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
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Rayon</th>
                                    <th>Rombel</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $row)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration + $siswa->perpage() * ($siswa->currentpage() - 1) }}</td>
                                        <td>{{ $row->nis }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->rayon }}</td>
                                        <td>{{ $row->rombel }}</td>
                                        
                                        <td>
                                            <form action="{{ route('siswa.destroy', $row->id) }}"
                                                onsubmit="return confirm('Hapus Siswa {{ $row->nama }} ?')"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('siswa.show', $row->id) }}" class="btn btn-primary"><i
                                                        class="fa fa-eye"></i></a>
                                                {{-- @if (Auth::user()->role == 'admin') --}}
                                                    <a href="{{ route('siswa.edit', $row->id) }}" class="btn btn-warning"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash"></i></button>
                                                {{-- @elseif (Auth::user()->role == 'petugas') --}}
                                                    {{-- <a href="{{ route('siswa.edit', $row->id) }}" class="btn btn-warning"><i
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
                        {{ $siswa->appends(Request::all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Tambah Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('siswa.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">NIS</label>
                                <input type="number" name="nis" value="{{ old('nis') }}" required='required'
                                    class="form-control" min=1>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nama Siswa</label>
                                <input type="text" name="nama" value="{{ old('nama') }}" required='required'
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
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
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" value="{{ old('alamat') }}"
                                    required='required' class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tinggi Badan </label>
                                <input type="number" name="tinggi_badan" value="{{ old('tinggi_badan') }}"
                                    required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Berat Badan </label>
                                <input type="number" name="berat_badan" value="{{ old('berat_badan') }}"
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
