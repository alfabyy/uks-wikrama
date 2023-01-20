@extends('layouts.template')

@section('tab')
    Rawat Sementara
@endsection

@section('title')
    Pasien Rawat Sementara
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- Pasien Dirujuk --}}
                        {{-- <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a> --}}
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Nama Pasien</th>
                                    <th>Keluhan</th>
                                    <th>Status Pasien</th>
                                    {{-- <th>Diupdate</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasien as $row)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration + $pasien->perpage() * ($pasien->currentpage() - 1) }}
                                        </td>
                                        <td>{{ $row->nama_pasien }}</td>
                                        <td>{{ $row->keluhan }}</td>
                                        <td>
                                            <span class="badge bg-primary"
                                                style="color: white">{{ $row->status_pasien }}</span>
                                        </td>
                                        {{-- <td>{{ $row->updated_at->format('d-m-y H:m:s') }}</td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pasien->appends(Request::all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
