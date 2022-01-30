<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandarPenilaian extends Model
{
    protected $table = 'standar_penilaian';
    protected $fillable = [
        'nama_penilaian',
        'file'
    ];
}
