<?php

namespace App\Http\Controllers;

// use App\Models\Info;
// use App\Models\RekamMedis;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $obatcount = Obat::all()->count();
        $pasiencount = Pasien::all()->count();
        $rawatcount = Pasien::where('status_pasien', 'Rawat')->count();
        $rujukcount = Pasien::where('status_pasien', 'Dirujuk')->count();
        $sembuhcount = Pasien::where('status_pasien', 'Sembuh')->count();
        $rawatsementaracount = Pasien::where('status_pasien', 'Rawat Sementara')->count();

         //table
         $obat = Obat::all()->take(5);
         $pasien = Pasien::orderBy('created_at','desc')->get()->take(5);
        //  $info = Info::all();
         // $pasien = Pasien::all();

         //nomor
        $i = 1;
        $a = 1;

        $pasiens = Pasien::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("month(created_at)"))
        ->pluck('count');

        $months = Pasien::select(
            DB::raw("Month(created_at) as month")
            )
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

            //dd($months);
        $datas = [0,0,0,0,0,0,0,0,0,0,0,0];
        foreach ($months as $index => $month)
        {
            $datas[$month - 1] = $pasiens[$index];
        }

        // return dd($datas);

        return view('home', compact(
            'obatcount',
            'pasiencount',
            'rawatcount',
            'rawatsementaracount',
            'rujukcount',
            'sembuhcount',
            'obat',
            'pasien',
            'datas',
            'i',
            'a',
            'pasiens'
        ));
    }
}
