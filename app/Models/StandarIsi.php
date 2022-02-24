<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StandarIsi extends Model
{

    protected $table = 'standar_isi';

    protected $fillable = [
        'nama_si',
        'tahun',
        'file'
    ];

    public function getJenisStandar()
    {
        $data = DB::table('standar_isi')
            ->join('jenis_standar', 'jenis_standar.id', '=', 'standar_isi.nama_si',)
            ->select('standar_isi.*', 'jenis_standar.jenis_standar', 'jenis_standar.tahun')
            ->get();

        return $data;
    }
}
