<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StandarBiaya extends Model
{
    protected $table = 'standar_biaya';

    protected $fillable = [
        'nama_stbiaya',
        'file',
        'tahun'
    ];

    public function getJenisStandar()
    {
        $data = DB::table('standar_biaya')
            ->join('jenis_standar', 'jenis_standar.id', '=', 'standar_biaya.nama_stbiaya',)
            ->select('standar_biaya.*', 'jenis_standar.jenis_standar', 'jenis_standar.tahun')
            ->get();

        return $data;
    }
}
