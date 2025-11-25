<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IklanOnline extends Model
{
    protected $table = 'iklanonline';

    protected $fillable = [
        'kode_iklanonline',
        'jenis_iklanonline',
        'type_iklanonline',
        'portal_iklanonline',
        'harga_iklanonline',
    ];
}
