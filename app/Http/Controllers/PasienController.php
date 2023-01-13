<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Siswa;
use App\Models\Rayon;
use App\Models\Rombel;

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
        return view('pasien.index', compact('pasien', 'siswa', 'rombel', 'rayon'));
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
            'status_pasien' => $request->status_pasien,

        ]);

        alert()->success('Success', 'Successfully Created')->autoClose(1000);
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
        return view('pasien.detail', compact('pasien', 'siswa', 'rayon', 'rayon'));
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
        return view('pasien.edit', compact('pasien', 'siswa', 'rayon', 'rombel'));
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
            'status_pasien' => $request->status_pasien,
        ]);
        alert()->success('Success', 'Successfully Created')->autoClose(1000);
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
        alert()->success('Success', 'Successfully Deleted')->autoClose(1000);
        return back();
    }
}
