<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Petugas;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use DB;

class JadwalController extends Controller
{
    public function index()
    {

        $jadwal = Jadwal::paginate(10);
        // $petugas = Petugas::all();
        $senin = DB::table('petugas')->where('jadwal', '=', 'Senin')->get('nama_petugas');
        $selasa = DB::table('petugas')->where('jadwal', '=', 'Selasa')->get('nama_petugas');
        $rabu = DB::table('petugas')->where('jadwal', '=', 'Rabu')->get('nama_petugas');
        $kamis = DB::table('petugas')->where('jadwal', '=', 'Kamis')->get('nama_petugas');
        $jumat = DB::table('petugas')->where('jadwal', '=', 'Jumat')->get('nama_petugas');
        $sabtu = DB::table('petugas')->where('jadwal', '=', 'Sabtu')->get('nama_petugas');
        $minggu = DB::table('petugas')->where('jadwal', '=', 'Minggu')->get('nama_petugas');
        return view('jadwal.index', compact('jadwal','senin','selasa','rabu','kamis','jumat','sabtu','minggu'));
    }
}
