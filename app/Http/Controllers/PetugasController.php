<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;

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
        return view('petugas.index', compact('petugas'));
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
        return redirect('/petugas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
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
        return view('petugas.edit', compact('petugas'));
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
        return back();
    }
}