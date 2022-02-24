<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StandarPenilaian extends Model
{
    protected $table = 'standar_penilaian';
    protected $fillable = [
        'nama_penilaian',
        'tahun',
        'file'
    ];

    public function getJenisStandar()
    {
        $data = DB::table('standar_penilaian')
            ->join('jenis_standar', 'jenis_standar.id', '=', 'standar_penilaian.nama_penilaian',)
            ->select('standar_penilaian.*', 'jenis_standar.jenis_standar', 'jenis_standar.tahun')
            ->get();

        return $data;
    }
}
