<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandarLulusan extends Model
{
    protected $table = 'standar_lulusans';

    protected $fillable = [
        'nama_stlulusan',
        'file'
    ];
}
