<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Hari;
use App\Models\Petugas;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class JadwalController extends Controller
{
    public function index()
    {
        
        $jadwal = Jadwal::paginate(10);
        // $petugas = DB::table('petugas')->leftJoin('hari','petugas.jadwal', '=', 'hari.hari')->orderBy('hari.id')->get();
        $senin = DB::table('petugas')->where('jadwal', '=', 'senin')->get('nama_petugas');
        $selasa = DB::table('petugas')->where('jadwal', '=', 'selasa')->get('nama_petugas');
        $rabu = DB::table('petugas')->where('jadwal', '=', 'rabu')->get('nama_petugas');
        $kamis = DB::table('petugas')->where('jadwal', '=', 'kamis')->get('nama_petugas');
        $jumat = DB::table('petugas')->where('jadwal', '=', 'jumat')->get('nama_petugas');
        $sabtu = DB::table('petugas')->where('jadwal', '=', 'sabtu')->get('nama_petugas');
        $minggu = DB::table('petugas')->where('jadwal', '=', 'minggu')->get('nama_petugas');
        return view('jadwal.index', compact('jadwal','senin','selasa','rabu','kamis','jumat','sabtu','minggu'));
    }
}
