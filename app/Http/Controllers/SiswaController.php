<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Rayon;
use App\Models\Rombel;
use RealRashid\SweetAlert\Facades\Alert;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::paginate(10);
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        return view('siswa.index', compact('siswa', 'rayon', 'rombel'));
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
        // $validator = Validator::make($request->all(), [
        //     'nama' => "unique:nama,nama",
        // ]);

        // if ($validator->fails()) {
        //     Alert::error('Maaf', 'Data yang anda masukkan tidak sesuai/kurang lengkap. Mohon lengkapi kembali');
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $siswa = Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'rayon' => $request->nama_rayon,
            'rombel' => $request->nama_rombel,
            'alamat' => $request->alamat,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
        ]);

        Alert::success('Success', 'Siswa berhasil ditambahkan')->autoClose(1000);

        return Response()->json($siswa);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.detail', compact('siswa'));
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
        $siswa = Siswa::find($id);
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        return view('siswa.edit', compact('siswa', 'rayon', 'rombel'));
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
        $siswa = Siswa::find($id);

        $input = $request->all();
        $input['tanggal_lahir'] = date('Y-m-d');
        $siswa->update($input);
        alert()->success('Succes', 'Successfully Updated')->autoClose(1000);
        return redirect('/siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        alert()->success('Succes', 'Successfully Deleted')->autoClose(1000);
        return back();
    }
}
