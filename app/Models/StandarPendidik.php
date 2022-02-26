<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StandarPendidik extends Model
{
    protected $table = 'standar_pendidik';

    protected $fillable = [
        'nama_stpendidik',
        'file',
        'tahun'
    ];


    public function getJenisStandar()
    {
        $data = DB::table('standar_pendidik')
            ->join('jenis_standar', 'jenis_standar.id', '=', 'standar_pendidik.nama_stpendidik',)
            ->select('standar_pendidik.*', 'jenis_standar.jenis_standar', 'jenis_standar.tahun')
            ->get();

        return $data;
    }
}
