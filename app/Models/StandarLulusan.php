<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StandarLulusan extends Model
{
    protected $table = 'standar_lulusans';

    protected $fillable = [
        'nama_stlulusan',
        'file',
        'tahun'
    ];

    public function getJenisStandar()
    {
        $data = DB::table('standar_lulusans')
            ->join('jenis_standar', 'jenis_standar.id', '=', 'standar_lulusans.nama_stlulusan',)
            ->select('standar_lulusans.*', 'jenis_standar.jenis_standar', 'jenis_standar.tahun')
            ->get();

        return $data;
    }
}
