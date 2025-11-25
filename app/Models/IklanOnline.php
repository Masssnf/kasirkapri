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

    public static function createCode(){
        $latestCode = self::orderBy('kode_iklanonline','desc')->value('kode_iklanonline');
        $latestCodeNumber = intval(substr($latestCode,3));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%03d", $nextCodeNumber);
        return 'ONL' . $formattedCodeNumber;
    }
}
