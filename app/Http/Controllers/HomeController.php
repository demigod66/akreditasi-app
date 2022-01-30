<?php

namespace App\Http\Controllers;

use App\Models\StandarBiaya;
use App\Models\StandarIsi;
use App\Models\StandarLulusan;
use App\Models\StandarPendidik;
use App\Models\StandarPengelolaan;
use App\Models\StandarPenilaian;
use App\Models\StandarProses;
use App\Models\StandarSarana;
use Illuminate\Http\Request;

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
        $standar_isi = StandarIsi::count();
        $standar_proses = StandarProses::count();
        $standar_penilaian = StandarPenilaian::count();
        $standar_sarana = StandarSarana::count();
        $standar_pembiayaan = StandarBiaya::count();
        $standar_pengelolaan = StandarPengelolaan::count();
        $standar_lulusan = StandarLulusan::count();
        $standar_pendidik = StandarPendidik::count();
        return view('home', compact('standar_isi', 'standar_proses', 'standar_penilaian', 'standar_sarana', 'standar_pembiayaan', 'standar_pengelolaan', 'standar_lulusan', 'standar_pendidik'));
    }
}
