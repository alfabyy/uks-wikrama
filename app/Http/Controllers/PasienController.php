<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Siswa;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Obat;

class PasienController extends Controller
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
        $obat = Obat::all();
        return view('pasien.index', compact('pasien', 'siswa', 'rombel', 'rayon', 'obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();
        $pasien = Pasien::create([

            'nama_pasien' => $request->nama_pasien,
            'rombel' => $request->nama_rombel,
            'rayon' => $request->nama_rayon,
            'alamat' => $request->alamat,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'suhu' => $request->suhu,
            'tensi_darah' => $request->tensi_darah,
            'keluhan' => $request->keluhan,
            'makan_pagi' => $request->makan_pagi,
            'makan_siang' => $request->makan_siang,
            'makan_malam' => $request->makan_malam,
            'status_pasien' => $request->status_pasien,
            'obat_pagi' => $request->obat_pagi,
            'jenis_obat_pagi' => $request->jenis_obat_pagi,
            'jumlah_obat_pagi' => $request->jumlah_obat_pagi,
            'obat_siang' => $request->obat_siang,
            'jenis_obat_siang' => $request->jenis_obat_siang,
            'jumlah_obat_siang' => $request->jumlah_obat_siang,
            'obat_malam' => $request->obat_malam,
            'jenis_obat_malam' => $request->jenis_obat_malam,
            'jumlah_obat_malam' => $request->jumlah_obat_malam,

        ]);

        alert()->success('Berhasil!', 'Pasien Berhasil Ditambahkan')->autoClose(1000);
        return redirect('/pasien');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasien = Pasien::find($id);
        $siswa = Siswa::all();
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        $obat = Obat::all();
        return view('pasien.detail', compact('pasien', 'siswa', 'rayon', 'rayon', 'obat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if(auth()->user()->role == 'visitor'){
        //     abort(403);
        // }
        $pasien = Pasien::find($id);
        $siswa = Siswa::all();
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        $obat = Obat::all();
        return view('pasien.edit', compact('pasien', 'siswa', 'rayon', 'rombel', 'obat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pasien = Pasien::find($id);
        $pasien->update([
            'nama_pasien' => $request->nama_pasien,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
            'alamat' => $request->alamat,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'suhu' => $request->suhu,
            'tensi_darah' => $request->tensi_darah,
            'keluhan' => $request->keluhan,
            'makan_pagi' => $request->makan_pagi,
            'makan_siang' => $request->makan_siang,
            'makan_malam' => $request->makan_malam,
            'status_pasien' => $request->status_pasien,
            'obat_pagi' => $request->obat_pagi,
            'jenis_obat_pagi' => $request->jenis_obat_pagi,
            'jumlah_obat_pagi' => $request->jumlah_obat_pagi,
            'obat_siang' => $request->obat_siang,
            'jenis_obat_siang' => $request->jenis_obat_siang,
            'jumlah_obat_siang' => $request->jumlah_obat_siang,
            'obat_malam' => $request->obat_malam,
            'jenis_obat_malam' => $request->jenis_obat_malam,
            'jumlah_obat_malam' => $request->jumlah_obat_malam,
        ]);
        alert()->success('Berhasil!', 'Berhasil Di Ubah')->autoClose(1000);
        return redirect('/pasien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::find($id);
        $pasien->delete();
        alert()->success('Berhasil!', 'Berhasil Menghapus Data')->autoClose(1000);
        return back();
    }
}
