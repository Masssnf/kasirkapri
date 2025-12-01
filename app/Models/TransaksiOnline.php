<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiOnline extends Model
{
    use HasFactory;

    protected $table = 'transaksionline';

    protected $fillable = [
        'nofakturonline',
        'tanggal_transaksionline',
        'nama_pemasangonline',
        'alamat_pemasangonline',
        'id_iklanonline',
        'portal_iklanonline',
        'sales_iklanonline',
        'tanggal_muatiklanonline',

        // --- CEK DAFTAR DI BAWAH INI, JANGAN SAMPAI ADA YANG LEWAT ---
        'harga_transaksionline',       // <-- Cek ini
        'insentif_transaksionline',    // <-- Cek ini
        'diskon_transaksionline',
        'komisi_transaksionline',      // <-- Cek ini
        'ppn_transaksionline',         // <-- Cek ini
        'totaltagihan_transaksionline', // <-- Cek ini
        'jumlahbayar_transaksionline',
        'piutang_transaksionline',
    ];

    public static function createCode()
    {
        $latestCode = self::orderBy('nofakturonline', 'desc')->value('nofakturonline');
        $latestCodeNumber = intval(substr($latestCode, 5));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%03d", $nextCodeNumber);
        return 'FKONL' . $formattedCodeNumber;
    }
}
