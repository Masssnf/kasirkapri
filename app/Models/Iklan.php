<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    protected $table = 'iklan';

    protected $fillable = [
        'type_iklan',
        'jenis_iklan',
        'warna_iklan',
        'iklan_priangan',
        'harga_iklan',
    ];
}
