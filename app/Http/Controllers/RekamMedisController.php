<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedis;
use App\Models\Siswa;
use App\Models\Rayon;
use App\Models\Rombel;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = Pasien::orderBy('updated_at', 'desc')->paginate(10);
        $siswa = Siswa::all();
        $rombel = Rombel::all();
        $rayon = Rayon::all();
        return view('rekam-medis.index', compact('pasien','siswa','rombel','rayon'));
    }


    public function show($id)
    {
        $pasien = Pasien::find($id);
        $siswa = Siswa::all();
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        return view('rekam-medis.show', compact('pasien', 'siswa', 'rayon', 'rayon'));
    }


    public function search(Request $request)
    {
        $keyword = $request->search;
        $siswa = Siswa::where('nama', 'like', "%" . $keyword . "%")->paginate(5);
        return view('rekam-medis.index', compact('siswa'));
    }
}
