@extends('layouts.template')

@section('tab')
    Pasien
@endsection

@section('title')
    Pasien
@endsection

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- @if (Auth::user()->role == 'admin')
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal" class="btn btn-success"><i
                            class="fa fa-plus"></i> Tambah</a>
                    @elseif (Auth::user()->role == 'petugas') --}}
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal" class="btn btn-success"><i
                                class="fa fa-plus"></i> Tambah</a>
                        {{-- @else
                    @endif --}}
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Nama Pasien</th>
                                    <th>Rombel</th>
                                    <th>Rayon</th>
                                    <th>Status Pasien</th>
                                    <th>Tanggal Kunjungan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasien as $row)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration + $pasien->perpage() * ($pasien->currentpage() - 1) }}
                                        </td>
                                        <td>{{ $row->nama_pasien }}</td>
                                        <td>{{ $row->rombel }}</td>
                                        <td>{{ $row->rayon }}</td>
                                        <td class="">
                                            @if ($row->status_pasien == 'Rawat')
                                                <span class="badge bg-warning" style="color: white">Rawat</span>
                                            @elseif ($row->status_pasien == 'Rawat Sementara')
                                                <span class="badge bg-primary" style="color: white">Rawat Sementara</span>
                                            @elseif ($row->status_pasien == 'Dirujuk')
                                                <span class="badge bg-danger" style="color: white">Dirujuk</span>
                                            @else
                                                <span class="badge bg-success" style="color: white">Sembuh</span>
                                            @endif
                                        </td>
                                        <td>{{ $row->tanggal_kunjungan }}</td>
                                        <td>
                                            <form action="{{ route('pasien.destroy', $row->id) }}"
                                                onsubmit="return confirm('Hapus Data Sakit {{ $row->nama_pasien }} ?')"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                {{-- @if (Auth::user()->role == 'admin') --}}
                                                <button type="button" type="button" id="edit-btn" data-toggle="modal"
                                                    data-target="#exampleModal{{ $row->id }}"
                                                    class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                                    @if (Auth::user()->role == 'admin')
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                                        @endif
                                                {{-- @elseif (Auth::user()->role == 'petugas') --}}
                                                {{-- <a href="{{route('pasien.edit', $row->id)}}" class="btn btn-warning"><i
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
                        {{ $pasien->appends(Request::all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal edit -->
        @foreach ($pasien as $row)
            <div class="modal fade" id="exampleModal{{ $row->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Pasien</h5>
                        </div>
                        <form action="{{ route('pasien.update', $row->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="form-label">Nama Pasien</label>
                                    <input type="text" name="nama_pasien" value="{{ $row->nama_pasien }}"
                                        required='required' class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Rombel</label>
                                    <select name="rombel" required="required" class="form-control">
                                        @foreach ($rombel as $rom)
                                            <option value="{{ $rom->nama_rombel }}"
                                                @if ($row->rombel == $rom->nama_rombel) selected @endif>{{ $rom->nama_rombel }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Rayon</label>
                                    <select name="rayon" required="required" class="form-control">
                                        @foreach ($rayon as $ray)
                                            <option value="{{ $ray->nama_rayon }}"
                                                @if ($row->rayon == $ray->nama_rayon) selected @endif>{{ $ray->nama_rayon }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Alamat</label>
                                    <textarea name="alamat" value="{{ $row->alamat }}" required='required' class="form-control" rows="4">{{ $row->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tanggal Kunjungan</label>
                                    <input type="date" name="tanggal_kunjungan" value="{{ $row->tanggal_kunjungan }}"
                                        required='required' class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Suhu</label>
                                    <input type="number" name="suhu" value="{{ $row->suhu }}" required='required'
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tensi Darah</label>
                                    <input type="number" name="tensi_darah" value="{{ $row->tensi_darah }}"
                                        required='required' class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Penyakit / Keluhan</label>
                                    <textarea name="keluhan" value="{{ $row->keluhan }}" required='required' class="form-control" rows="4">{{ $row->keluhan }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Sarapan</label>
                                    <br>
                                    <input type="radio" name="makan_pagi" value="Sudah" {{$row->makan_pagi == 'Sudah'? 'checked' : ''}} required> Sudah
                                    <input type="radio" name="makan_pagi" value="Belum" {{$row->makan_pagi == 'Belum'? 'checked' : ''}} required> Belum
                                </div>
                                {{-- <div id="cek" style="display: none;"> --}}
                                    <div class="form-group">
                                        <label class="form-label">Makan Siang</label>
                                        <br>
                                        <input type="radio" name="makan_siang" value="Sudah" {{$row->makan_siang == 'Sudah'? 'checked' : ''}} > Sudah
                                        <input type="radio" name="makan_siang" value="Belum" {{$row->makan_siang == 'Belum'? 'checked' : ''}} > Belum
                                    </div>
                                {{-- </div> --}}
                                {{-- <div id="cekk" style="display: none;"> --}}
                                    <div class="form-group">
                                        <label class="form-label">Makan Malam</label>
                                        <br>
                                        <input type="radio" name="makan_malam" value="Sudah" {{$row->makan_malam == 'Sudah'? 'checked' : ''}} > Sudah
                                        <input type="radio" name="makan_malam" value="Belum" {{$row->makan_malam == 'Belum'? 'checked' : ''}} > Belum
                                    </div>
                                    <br>
                                {{-- </div> --}}

                                <div class="form-group">
                                    <label class="form-label">Obat Pagi</label>
                                    <br>
                                    <input type="radio" name="obat_pagi" value="Sudah" {{$row->obat_pagi == 'Sudah'? 'checked' : ''}} required> Sudah
                                    <input type="radio" name="obat_pagi" value="Belum" {{$row->obat_pagi == 'Belum'? 'checked' : ''}} required> Belum
                                </div>
                                {{-- <div id="cekk" style="display: none;"> --}}
                                    <div class="form-group">
                                        <label class="form-label">Jenis Obat</label>
                                        <select name="jenis_obat_pagi" class="form-control">
                                            @foreach ($obat as $o)
                                                <option value="{{ $o->nama_obat }}"
                                                    @if ($row->jenis_obat_pagi == $o->nama_obat) selected @endif>{{ $o->nama_obat }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Jumlah</label>
                                        <input type="number" name="jumlah_obat_pagi" value="{{ $row->jumlah_obat_pagi }}"
                                            class="form-control">
                                    </div>
                                    <br>
                                {{-- </div> --}}

                                <div class="form-group">
                                    <label class="form-label">Obat Siang</label>
                                    <br>
                                    <input type="radio" id="y" onclick="javascript:yescek()" name="obat_siang" value="Sudah" {{$row->obat_siang == 'Sudah'? 'checked' : ''}} required> Sudah
                                    <input type="radio" id="n" onclick="javascript:yescek()" name="obat_siang" value="Belum" {{$row->obat_siang == 'Belum'? 'checked' : ''}} required> Belum
                                </div>
                                <div id="cekk" style="display: none;">
                                    <div class="form-group">
                                        <label class="form-label">Jenis Obat</label>
                                        <select name="jenis_obat_siang" class="form-control">
                                            @foreach ($obat as $o)
                                                <option value="{{ $o->nama_obat }}"
                                                    @if ($row->jenis_obat_siang == $o->nama_obat) selected @endif>{{ $o->nama_obat }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Jumlah</label>
                                        <input type="number" name="jumlah_obat_siang" value="{{ $row->jumlah_obat_siang }}"
                                            class="form-control">
                                    </div>
                                    <br>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Obat Malam</label>
                                    <br>
                                    <input type="radio" id="yes3" onclick="javascript:ngecek3()" name="obat_malam" value="Sudah" {{$row->obat_malam == 'Sudah'? 'checked' : ''}} required> Sudah
                                    <input type="radio" id="no3" onclick="javascript:ngecek3()" name="obat_malam" value="Belum" {{$row->obat_malam == 'Belum'? 'checked' : ''}} required> Belum
                                </div>
                                <div id="cek3" style="display: none;">
                                    <div class="form-group">
                                        <label class="form-label">Jenis Obat</label>
                                        <select name="jenis_obat_malam"  class="form-control">
                                            @foreach ($obat as $o)
                                                <option value="{{ $o->nama_obat }}"
                                                    @if ($row->jenis_obat_malam == $o->nama_obat) selected @endif>{{ $o->nama_obat }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Jumlah</label>
                                        <input type="number" name="jumlah_obat_malam" value="{{ $row->jumlah_obat_malam }}"
                                             class="form-control">
                                    </div>
                                    <br>
                                </div>

                                
                                <div class="form-group">
                                    <label class="form-label">Status Pasien</label>
                                    <select name="status_pasien" id="status_pasien" required="required"
                                        class="form-control">

                                        {{-- <option value="{{ $row->status_pasien }}" id="status_active">
                                            {{ $row->status_pasien }}</option> --}}
                                        <option @if ($row->status_pasien == 'Rawat sementara') : selected @endif value="Rawat sementara"
                                            id="rawat_sementara">Rawat Sementara</option>
                                        <option @if ($row->status_pasien == 'Rawat') : selected @endif value="Rawat"
                                            id="rawat">Rawat</option>
                                        <option @if ($row->status_pasien == 'Dirujuk') : selected @endif value="Dirujuk"
                                            id="rujuk">Dirujuk</option>
                                            <option @if ($row->status_pasien == 'Sembuh') : selected @endif value="Sembuh"
                                                id="sembuh">Sembuh</option>

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
        <div class="modal fade" id="addModal" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Tambah Rekam Medis</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('pasien.store') }}" method="post">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="form-label">Nama Pasien</label>
                                <input name="nama_pasien" value="{{ old('nama_pasien') }}" required='required'
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Rombel</label>
                                <select name="nama_rombel" required="required" class="form-control">
                                    <option value="">-- Pilih Rombel --</option>
                                    @foreach ($rombel as $row)
                                        <option value="{{ $row->nama_rombel }}">
                                            {{ $row->nama_rombel }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Rayon</label>
                                <select name="nama_rayon" required="required" class="form-control">
                                    <option value="">-- Pilih Rayon --</option>
                                    @foreach ($rayon as $row)
                                        <option value="{{ $row->nama_rayon }}">{{ $row->nama_rayon }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" value="{{ old('alamat') }}" required='required' class="form-control" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Tanggal Kunjungan</label>
                                <input type="date" name="tanggal_kunjungan" value="{{ old('tanggal_kunjungan') }}"
                                    required='required' class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Suhu</label>
                                <input type="number" name="suhu" value="{{ old('suhu') }}" required='required'
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Tensi Darah</label>
                                <input type="number" name="tensi_darah" value="{{ old('tensi_darah') }}" required='required'
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Penyakit/Keluhan</label>
                                <textarea name="keluhan" value="{{ old('keluhan') }}" required='required' class="form-control" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Sarapan</label>
                                <br>
                                <input type="radio" name="makan_pagi" value="Sudah" required> Sudah
                                <input type="radio" name="makan_pagi" value="Belum" required> Belum
                            </div>
                            {{-- <div id="c" style="display: none;"> --}}
                                <div class="form-group">
                                    <label class="form-label">Makan Siang</label>
                                    <br>
                                    <input type="radio" name="makan_siang" value="Sudah" required> Sudah
                                    <input type="radio" name="makan_siang" value="Belum" required> Belum
                                </div>
                            {{-- </div> --}}
                            {{-- <div id="ce" style="display: none;"> --}}
                                <div class="form-group">
                                    <label class="form-label">Makan Malam</label>
                                    <br>
                                    <input type="radio" name="makan_malam" value="Sudah" required> Sudah
                                    <input type="radio" name="makan_malam" value="Belum" required> Belum
                                </div>
                                <br>
                            {{-- </div> --}}

                            <div class="form-group">
                                <label class="form-label">Obat Pagi</label>
                                <br>
                                <input type="radio" id="yes" onclick="javascript:yescheck()" name="obat_pagi" value="Sudah" required> Sudah
                                <input type="radio" id="no" onclick="javascript:yescheck()" name="obat_pagi" value="Belum" required> Belum
                            </div>
                            <div id="cek" style="display: none;">
                                <div class="form-group">
                                <label class="form-label">Jenis Obat</label>
                                <select name="jenis_obat_pagi" class="form-control">
                                    <option value="">-- Pilih Obat --</option>
                                    @foreach ($obat as $row)
                                        <option value="{{ $row->nama_obat }}">{{ $row->nama_obat }}
                                        </option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Jumlah Obat</label>
                                    <input type="number" name="jumlah_obat_pagi" value="{{ old('jumlah_obat_pagi') }}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Obat Siang</label>
                                <br>
                                <input type="radio" id="yes1" onclick="javascript:ngecek()" name="obat_siang" value="Sudah" required> Sudah
                                <input type="radio" id="no1" onclick="javascript:ngecek()" name="obat_siang" value="Belum" required> Belum
                            </div>
                            <div id="c" style="display: none;">
                                <div class="form-group">
                                <label class="form-label">Jenis Obat</label>
                                <select name="jenis_obat_siang" class="form-control">
                                    <option value="">-- Pilih Obat --</option>
                                    @foreach ($obat as $row)
                                        <option value="{{ $row->nama_obat }}">{{ $row->nama_obat }}
                                        </option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Jumlah Obat</label>
                                    <input type="number" name="jumlah_obat_siang" value="{{ old('jumlah_obat_malam') }}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Obat Malam</label>
                                <br>
                                <input type="radio" id="yes2" onclick="javascript:ngecek2()" name="obat_malam" value="Sudah" required> Sudah
                                <input type="radio" id="no2" onclick="javascript:ngecek2()" name="obat_malam" value="Belum" required> Belum
                            </div>
                            <div id="ce" style="display: none;">
                                <div class="form-group">
                                <label class="form-label">Jenis Obat</label>
                                <select name="jenis_obat_malam" class="form-control">
                                    <option value="">-- Pilih Obat --</option>
                                    @foreach ($obat as $row)
                                        <option value="{{ $row->nama_obat }}">{{ $row->nama_obat }}
                                        </option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Jumlah Obat</label>
                                    <input type="number" name="jumlah_obat_malam" value="{{ old('jumlah_obat_malam') }}" class="form-control">
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label class="form-label">Status Pasien</label>
                                <select name="status_pasien" required="required" class="form-control">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Rawat Sementara">Rawat Sementara</option>
                                    <option value="Rawat">Rawat</option>
                                    <option value="Dirujuk">Dirujuk</option>
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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.js-states').select2();
                });
                $("#id_pasien").select2({
                    placeholder: "Select a programming language",
                    allowClear: true
                });
            </script>
            <script>
                $(document).ready(function() {
                    $('#status_pasien').on('click', function() {
                        var status = $('#status_active').val();
                        var rawat_sementara = $('#rawat_sementara').val();
                        var rawat = $('#rawat').val();
                        var rujuk = $('#rujuk').val();
                        var sembuh = $('#sembuh').val();
                        if (status == rawat_sementara) {
                            $('#rawat_sementara').remove();
                        }

                        if (status == rawat) {
                            $('#rawat').remove();
                        }

                        if (status == rujuk) {
                            $('#rujuk').remove();
                        }

                        if (status == sembuh) {
                            $('#sembuh').remove();
                        }
                    });
                });
            </script>
             <script>
                function yescheck(){
                    if (document.getElementById('yes').checked) {
                        document.getElementById('cek').style.display = 'block';
                    }else
                    document.getElementById('cek').style.display = 'none';
                }
               </script>
                <script>
                    function yescek(){
                        if (document.getElementById('y').checked) {
                            document.getElementById('cekk').style.display = 'block';
                        }else
                        document.getElementById('cekk').style.display = 'none';
                    }
                   </script>
                    <script>
                        function ngecek(){
                            if (document.getElementById('yes1').checked) {
                                document.getElementById('c').style.display = 'block';
                            }else
                            document.getElementById('c').style.display = 'none';
                        }
                       </script>
                        <script>
                            function ngecek2(){
                                if (document.getElementById('yes2').checked) {
                                    document.getElementById('ce').style.display = 'block';
                                }else
                                document.getElementById('ce').style.display = 'none';
                            }
                           </script>
                           <script>
                            function ngecek3(){
                                if (document.getElementById('yes3').checked) {
                                    document.getElementById('cek3').style.display = 'block';
                                }else
                                document.getElementById('cek3').style.display = 'none';
                            }
                           </script>
        </div>
    </div>
@endsection
