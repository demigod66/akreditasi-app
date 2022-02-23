<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandarProses extends Model
{
    protected $table = 'standar_proses';
    protected $fillable = [
        'nama_sp',
        'tahun',
        'file'
    ];
}
