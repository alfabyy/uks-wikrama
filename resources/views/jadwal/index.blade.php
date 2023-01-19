@extends('layouts.template')

@section('tab')
    Jadwal Piket
@endsection

@section('title')
    Jadwal Piket
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>Hari</th>
                                    <th>Nama</th>
                                    </tr>
                            </thead>
                            <tbody>
                            <!-- @foreach ($petugas as $row)
                                    <tr class="text-center">
                                    <td>{{ $row->jadwal }}</td>
                                    <td>{{ $row->nama_petugas }}</td>
                                    </tr>
                            @endforeach -->
                            @foreach ($petugas as $row)
                                    <tr class="text-center">
                                    <td>{{ $row->jadwal }}</td>
                                    <td>{{ $row->nama_petugas }}</td>
                                    </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
