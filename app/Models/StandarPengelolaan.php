<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StandarPengelolaan extends Model
{
    protected $table = 'standar_pengelolaan';

    protected $fillable = [
        'nama_stpengelolaan',
        'file',
        'tahun'
    ];

    public function getJenisStandar()
    {
        $data = DB::table('standar_pengelolaan')
            ->join('jenis_standar', 'jenis_standar.id', '=', 'standar_pengelolaan.nama_stpengelolaan',)
            ->select('standar_pengelolaan.*', 'jenis_standar.jenis_standar', 'jenis_standar.tahun')
            ->get();

        return $data;
    }
}
