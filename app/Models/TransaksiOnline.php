<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiOnline extends Model
{
    use HasFactory;

    protected $fillable = [
        'nofakturonline',
        'tanggal_transaksionline',
        'nama_pemasangonline',
        'alamat_pemasangonline',
        'id_iklanonline',
        'sales_iklanonline',
        'tanggal_muatiklanonline',
        'insentif_transaksionline',
        'diskon_transaksionline',
        'komisi_transaksionline',
        'jumlahbayar_transaksionline',
        'piutang_transaksionline',
    ];

    protected $table = 'transaksionline';

    public static function createCode(){
        $latestCode = self::orderBy('nofakturonline','desc')->value('nofakturonline');
        $latestCodeNumber = intval(substr($latestCode,5));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%03d", $nextCodeNumber);
        return 'FKONL' . $formattedCodeNumber;
    }
}
