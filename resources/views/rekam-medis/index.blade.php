@extends('layouts.template')

@section('tab')
Rekam Medis
@endsection

@section('title')
Rekam Medis
@endsection

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- @if(Auth::user()->role == 'admin')
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal" class="btn btn-success"><i
                            class="fa fa-plus"></i> Tambah</a>
                    @elseif (Auth::user()->role == 'petugas') --}}
                    {{-- @else
                    @endif --}}
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>ID Rekam Medis</th>
                                <th>Nama Pasien</th>
                                <th>Rombel</th>
                                <th>Rayon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasien as $row)
                            <tr class="text-center">
                                <td>RM--{{$loop->iteration + ($pasien->perpage() * ($pasien->currentpage() -1)) }}
                                </td>
                                <td>{{$row->nama_pasien}}</td>
                                <td>{{$row->rombel}}</td>
                                <td>{{$row->rayon}}</td>
                                <td>
                                    <form action="" method="post">
                                        @csrf
                                        <a href="{{route('rekam-medis.show', $row->id)}}" class="btn btn-primary"><i
                                                class="fa fa-eye"></i></a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$pasien->appends(Request::all())->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addModal" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    @csrf
                    
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
    </div>
</div>
@endsection
