<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StandarProses extends Model
{
    protected $table = 'standar_proses';
    protected $fillable = [
        'nama_sp',
        'tahun',
        'file'
    ];

    public function getJenisStandar()
    {
        $data = DB::table('standar_proses')
            ->join('jenis_standar', 'jenis_standar.id', '=', 'standar_proses.nama_sp',)
            ->select('standar_proses.*', 'jenis_standar.jenis_standar', 'jenis_standar.tahun')
            ->get();

        return $data;
    }
}
