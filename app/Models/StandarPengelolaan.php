<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandarPengelolaan extends Model
{
    protected $table = 'standar_pengelolaan';

    protected $fillable = [
        'nama_stpengelolaan',
        'file'
    ];
}
