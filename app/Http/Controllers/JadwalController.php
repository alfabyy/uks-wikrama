<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Petugas;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;


class JadwalController extends Controller
{
    public function index()
    {

        $jadwal = Jadwal::paginate(10);
        $petugas = Petugas::all();

        return view('jadwal.index', compact('jadwal','petugas'));
    }
}
