<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Petugas;
use App\Models\DataSakit;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index_rawat()
    {
        $pasien = Pasien::where('status_pasien', 'Rawat')->paginate(10);
        $petugas = Petugas::all();
        return view('rawat.index', compact('pasien', 'petugas'));
    }

    public function index_rawat_sementara()
    {
        $pasien = Pasien::where('status_pasien', 'Rawat sementara')->paginate(10);
        $petugas = Petugas::all();
        return view('rawat-sementara.index', compact('pasien', 'petugas'));
    }

    public function index_dirujuk()
    {
        $pasien = Pasien::where('status_pasien', 'Dirujuk')->paginate(10);
        $petugas = Petugas::all();
        return view('dirujuk.index', compact('pasien', 'petugas'));
    }

    public function index_sembuh()
    {
        $pasien = Pasien::where('status_pasien', 'Sembuh')->paginate(10);
        $petugas = Petugas::all();
        return view('sembuh.index', compact('pasien', 'petugas'));
    }
}
