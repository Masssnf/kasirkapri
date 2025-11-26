<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksiiklanonline extends Model
{
    use HasFactory;

    protected $fillable = [
        'nofakturonline',
        'tgltransaksionline',
        'namapemasang',
        'alamatpemasang',
        'notelppemasang',
        'tglmuat',
        'namasales',
        'id_iklanonline',
        'harga',
        'intensif',
        'diskon',
        'jumlahbayar',
    ];

    protected $table = 'transaksiiklanonline';

    public function iklanonline()
    {
        return $this->belongsTo(Iklanonline::class, 'id_iklanonline');
    }

    public static function createCode(){
        $latestCode = self::orderBy('nofakturonline','desc')->value('nofakturonline');
        $latestCodeNumber = intval(substr($latestCode,7));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%03d", $nextCodeNumber);
        return 'FKIKLON' . $formattedCodeNumber;
    }
    
}
