<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IklanCetak extends Model
{
    protected $table = 'iklancetak';

    protected $fillable = [
        'kode_iklancetak',
        'jenis_iklancetak',
        'warna_iklancetak',
        'baris_iklancetak',
        'kolom_iklancetak',
        'harga_iklancetak',
    ];

    public static function createCode(){
        $latestCode = self::orderBy('kode_iklancetak','desc')->value('kode_iklancetak');
        $latestCodeNumber = intval(substr($latestCode,3));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%03d", $nextCodeNumber);
        return 'CTK' . $formattedCodeNumber;
    }
}
