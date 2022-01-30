<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandarBiaya extends Model
{
    protected $table = 'standar_biaya';

    protected $fillable = [
        'nama_stbiaya',
        'file'
    ];
}
