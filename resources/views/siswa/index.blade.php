@extends('layouts.template')

@section('tab')
    Siswa
@endsection

@section('title')
    Data Siswa
@endsection

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
                        <div style="justify-content: left">
                            <form class="navbar-search col-md-3 mb-3 float-right" action="{{ route('siswa.search') }}" method="get">
                                <div class="input-group">
                                  <input name="search" type="text" class="form-control bg-light border-1 small"
                                    placeholder="Cari Siswa.." aria-label="Search" aria-describedby="basic-addon2"
                                    style="border-color: #66bb6a;">
                                  <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">
                                      <i class="fas fa-search fa-sm"></i>
                                    </button>
                                  </div>
                                </div>
                              </form>
                        </div>
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
                                               
                                                        <button type="button" type="button" data-toggle="modal"
                                                        data-target="#exampleModal{{ $row->id }}" class="btn btn-warning"><i
                                                            class="fa fa-edit"></i></button>
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fa fa-trash"></i></button>
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
                                <label>Jenis Kelamin</label>
                                    <div class="custom-control custom-checkbox">
                                        <input name="jenis_kelamin" value="Laki-laki" type="radio" class="custom-control-input" id="Laki-laki" required>
                                        <label class="custom-control-label" for="Laki-laki">Laki-laki</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input name="jenis_kelamin" value="Perempuan" type="radio" class="custom-control-input" id="Perempuan" required>
                                        <label class="custom-control-label" for="Perempuan">Perempuan</label>
                                    </div>
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
                            <div class="form-group">
                                <label class="form-label">Penyakit Bawaan</label>
                                <textarea name="penyakit_bawaan" value="{{ old('penyakit_bawaan') }}"
                                     class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Alergi</label>
                                <textarea name="alergi" value="{{ old('alergi') }}"
                                    class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Hobi </label>
                                <input type="text" name="hobi" value="{{ old('hobi') }}"
                                    required='required' class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Makanan Kesukaan </label>
                                <input type="text" name="makanan_kesukaan" value="{{ old('makanan_kesukaan') }}"
                                    required='required' class="form-control">
                            </div>
                            {{-- <div class="form-group">
                                <label class="form-label">Catatan</label>
                                <textarea name="catatan" value="{{ old('catatan') }}"
                                     class="form-control" rows="4"></textarea>
                            </div> --}}

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

     <!-- Modal edit -->
     @foreach ($siswa as $row)
     <div class="modal fade" id="exampleModal{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
             </div>
             <form action="{{ route('siswa.update', $row->id) }}" method="POST">
                 @csrf
                 @method('PUT')
                 <div class="modal-body">
                     <div class="form-group">
                         <label class="form-label">NIS</label>
                         <input type="number" name="nis" value="{{ $row->nis }}" required='required'
                             class="form-control">
                     </div>
                     <div class="form-group">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" value="{{ $row->nama }}" required='required'
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ $row->tanggal_lahir }}" required='required'
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Jenis Kelamin</label>
                        <input type="text" name="jenis_kelamin" value="{{ $row->jenis_kelamin }}" required='required'
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Rayon</label>
                                <select name="rayon" required="required" class="form-control">
                                    @foreach ($rayon as $ray)
                                    <option value="{{$ray->nama_rayon}}" @if($row->rayon == $ray->nama_rayon)selected @endif>{{$ray->nama_rayon}}</option>
                                    @endforeach
                                </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Rombel</label>
                                <select name="rombel" required="required" class="form-control">
                                    @foreach ($rombel as $rom)
                                    <option value="{{$rom->nama_rombel}}" @if($row->rombel == $rom->nama_rombel)selected @endif>{{$rom->nama_rombel}}</option>
                                    @endforeach
                                </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" value="{{ $row->alamat }}"
                            required='required' class="form-control" rows="4">{{ $row->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tinggi Badan</label>
                        <input type="number" name="tinggi_badan" value="{{ $row->tinggi_badan }}" required='required'
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Berat Badan</label>
                        <input type="number" name="berat_badan" value="{{ $row->berat_badan }}" required='required'
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Penyakit Bawaan</label>
                        <textarea name="penyakit_bawaan" value="{{ $row->penyakit_bawaan }}"
                             class="form-control" rows="4">{{ $row->penyakit_bawaan }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Alergi</label>
                        <textarea name="alergi" value="{{ $row->alergi }}"
                            class="form-control" rows="4">{{ $row->alergi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Hobi</label>
                        <input type="text" name="hobi" value="{{ $row->hobi }}" required='required'
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Makanan Kesukaan</label>
                        <input type="text" name="makanan_kesukaan" value="{{ $row->makanan_kesukaan }}" required='required'
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Catatan Perkembangan</label>
                        <textarea name="catatan" value="{{ $row->catatan }}"
                             class="form-control" rows="4">{{ $row->catatan }}</textarea>
                    </div>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-outline-primary">Update</button>            
                 </div>
 
             </form>
         </div>
     </div>
 </div>
 @endforeach
@endsection
