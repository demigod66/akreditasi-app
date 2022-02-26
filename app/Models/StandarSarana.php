<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StandarSarana extends Model
{
    protected $table = 'standar_sarana';
    protected $fillable = [
        'nama_stsarana',
        'file',
        'tahun'
    ];

    public function getJenisStandar()
    {
        $data = DB::table('standar_sarana')
            ->join('jenis_standar', 'jenis_standar.id', '=', 'standar_sarana.nama_stsarana',)
            ->select('standar_sarana.*', 'jenis_standar.jenis_standar', 'jenis_standar.tahun')
            ->get();

        return $data;
    }
}
