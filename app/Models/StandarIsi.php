<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandarIsi extends Model
{

    protected $table = 'standar_isi';

    protected $fillable = [
        'nama_si',
        'tahun',
        'file'
    ];
}
