<?php

namespace App\Http\Controllers;

use App\Models\IklanOnline;
use App\Models\Transaksiiklanonline;
use Illuminate\Http\Request;

class TransaksiIklanOnlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksiiklanonline = Transaksiiklanonline::paginate(5);
        $iklanonline = IklanOnline::all();
        
        return view('page.transaksi.transaksionline.index')->with([
            'transaksiiklanonline' => $transaksiiklanonline,
            'iklanonline' => $iklanonline,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $iklanonline = IklanOnline::all();
        $nofakturonline = Transaksiiklanonline::createCode();
        return view('page.transaksi.transaksionline.create', compact('nofakturonline','iklanonline'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nofakturonline' => 'required',
            'tgltransaksionline' => 'required',
            'namapemasang'   => 'required',
            'alamatpemasang' => 'required',
            'notelppemasang' => 'required',
            'id_iklanonline' => 'required', // Dropdown Kode Iklan
            'tglmuat'        => 'required|date',
            'namasales'      => 'required',
            'intensif'       => 'required|integer',
            // Field uang tidak perlu divalidasi numeric disini karena isinya string "10.000"
            'diskon'         => 'required',
            'dibayar'        => 'required',
        ]);

        // 2. MEMBERSIHKAN FORMAT RUPIAH (Hapus Titik)
        // Contoh: Input "1.500.000" -> Menjadi "1500000" (Murni Angka)
        
        // Kita gunakan fungsi str_replace bawaan PHP
        $diskon_bersih  = (int) str_replace('.', '', $request->diskon);
        $dibayar_bersih = (int) str_replace('.', '', $request->dibayar);
        
        // Kita ambil harga asli dari Database Master berdasarkan ID yang dipilih
        // Ini LEBIH AMAN daripada mengambil dari input form (mencegah user nakal inspect element)
        $iklanMaster = IklanOnline::find($request->id_iklanonline);
        $harga_satuan = $iklanMaster->harga_iklanonline;

        // 3. HITUNG ULANG DI SERVER (Agar Data Konsisten & Aman)
        // (Harga x Intensif) - Diskon
        $subtotal = ($harga_satuan * $request->intensif) - $diskon_bersih;
        if($subtotal < 0) $subtotal = 0;

        // Hitung PPN 11%
        $pajak = $subtotal * 0.11;

        // Total Tagihan
        $total_bayar = $subtotal + $pajak;

        // Hitung Piutang
        $piutang = $total_bayar - $dibayar_bersih;
        if($piutang < 0) $piutang = 0;

        // Tentukan Status Pembayaran
        $status = ($piutang > 0) ? 'Belum Lunas' : 'Lunas';

        // 4. SIMPAN KE DATABASE
        Transaksiiklanonline::create([
            'nofakturonline'    => $request->nofakturonline,
            'tgltransaksionline'    => $request->tgltransaksionline,
            'namapemasang'      => $request->namapemasang,
            'alamatpemasang'    => $request->alamatpemasang,
            'notelppemasang'    => $request->notelppemasang,
            'id_iklanonline'   => $request->id_iklanonline, // Sesuaikan dengan nama kolom foreign key di DB
            'tglmuat'           => $request->tglmuat,
            'harga'           => $request->harga,
            'namasales'         => $request->namasales,
            
            // Simpan Harga Saat Transaksi (Snapshot)
            'harga' => $harga_satuan, 
            
            'intensif'          => $request->intensif,
            'diskon'            => $diskon_bersih,
            'pajak'             => $pajak,          // Hasil hitungan server
            'jumlahbayar'       => $total_bayar,    // Hasil hitungan server
            'dibayar'           => $dibayar_bersih,
            'piutang'           => $piutang,        // Hasil hitungan server
            'status_pembayaran' => $status,
        ]);

        // 5. REDIRECT
        return redirect()->route('transaksiiklanonline.index')
        ->with('success', 'Transaksi Berhasil Disimpan!');
    

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
