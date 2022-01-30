<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandarPendidik extends Model
{
    protected $table = 'standar_pendidik';

    protected $fillable = [
        'nama_stpendidik',
        'file'
    ];
}
