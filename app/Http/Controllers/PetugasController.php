<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Rayon;
use App\Models\Rombel;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(auth()->user()->role == 'visitor'){
        //     abort(403);
        // }
        $petugas = Petugas::paginate(10);
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        return view('petugas.index', compact('petugas', 'rayon', 'rombel'));
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
        $input = $request->all();
        Petugas::create($input);
        alert()->success('Berhasil!', 'Petugas Berhasil Ditambahkan')->autoClose(1000);
        return redirect('/petugas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $petugas = Petugas::find($id);
        return view('petugas.detail', compact('petugas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if(auth()->user()->role == 'visitor'){
        //     abort(403);
        // }
        $petugas = Petugas::find($id);
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        return view('petugas.edit', compact('petugas', 'rayon', 'rombel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $petugas = Petugas::find($id);

        $input = $request->all();
        $petugas->update($input);
        alert()->success('Berhasil!', 'Berhasil Di Ubah')->autoClose(1000);
        return redirect('/petugas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas = Petugas::find($id);
        $petugas->delete();
        alert()->success('Berhasil!', 'Berhasil Menghapus Data')->autoClose(1000);
        return back();
    }
}
