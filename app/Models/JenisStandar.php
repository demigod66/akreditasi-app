<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisStandar extends Model
{
    protected $table = 'jenis_standar';
    protected $fillable = [
        'jenis_standar',
        'tahun'
    ];
}
