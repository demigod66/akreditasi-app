<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandarSarana extends Model
{
    protected $table = 'standar_sarana';
    protected $fillable = [
        'nama_stsarana',
        'file'
    ];
}
