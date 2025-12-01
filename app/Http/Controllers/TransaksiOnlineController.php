<?php

namespace App\Http\Controllers;

use App\Models\IklanOnline;
use App\Models\TransaksiOnline;
use Illuminate\Http\Request;

class TransaksiOnlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksionline = TransaksiOnline::paginate(5);
        $iklanonline = IklanOnline::all();

        return view('page.transaksionline.index')->with([
            'transaksionline' => $transaksionline,
            'iklanonline' => $iklanonline,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $iklanonline = IklanOnline::all();
        $nofakturonline = TransaksiOnline::createCode();
        return view('page.transaksionline.create', compact('nofakturonline', 'iklanonline'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // 1. VALIDASI DATA
        $request->validate([
            'nofakturonline'            => 'required',
            'tanggal_transaksionline'   => 'required|date',
            'nama_pemasangonline'       => 'required',
            'alamat_pemasangonline'     => 'required',
            'id_iklanonline'            => 'required', // ID dari Dropdown
            'portal_iklanonline'        => 'required',
            'sales_iklanonline'         => 'required',
            'tanggal_muatiklanonline'   => 'required|date',

            // Field Uang (Format Rupiah String)
            'diskon_transaksionline'      => 'required',
            'jumlahbayar_transaksionline' => 'required',

            // Field hitungan otomatis (Sebenarnya tidak wajib divalidasi 'required' 
            // karena kita akan hitung ulang di sini, tapi tidak apa-apa dibiarkan)
        ]);

        // 2. BERSIHKAN FORMAT RUPIAH (Hapus Titik)
        // Mengubah "1.000.000" menjadi 1000000 agar bisa dihitung
        $diskon_bersih = (int) str_replace('.', '', $request->diskon_transaksionline);
        $bayar_bersih  = (int) str_replace('.', '', $request->jumlahbayar_transaksionline);

        // 3. AMBIL HARGA ASLI DARI MASTER (Untuk Keamanan & Akurasi)
        $iklanMaster = IklanOnline::findOrFail($request->id_iklanonline);
        $harga_asli  = $iklanMaster->harga_iklanonline;

        // 4. HITUNG ULANG LOGIKA KEUANGAN DI SERVER
        // A. Hitung Komisi & Insentif (20% dari Harga)
        $insentif = $harga_asli * 0.20;
        $komisi   = $harga_asli * 0.20;

        // B. Hitung Subtotal (Harga - Diskon)
        $subtotal = $harga_asli - $diskon_bersih;
        if ($subtotal < 0) $subtotal = 0; // Cegah minus

        // C. Hitung PPN (11% dari Subtotal)
        $ppn = $subtotal * 0.11;

        // D. Hitung Total Tagihan
        $total_tagihan = $subtotal + $ppn;

        // E. Hitung Piutang (Total - Bayar)
        $piutang = $total_tagihan - $bayar_bersih;
        if ($piutang < 0) $piutang = 0; // Jika lunas/kembalian, piutang 0

        // 5. SIMPAN KE DATABASE
        TransaksiOnline::create([
            'nofakturonline'            => $request->nofakturonline,
            'tanggal_transaksionline'   => $request->tanggal_transaksionline,
            'nama_pemasangonline'       => $request->nama_pemasangonline,
            'alamat_pemasangonline'     => $request->alamat_pemasangonline,
            'id_iklanonline'            => $request->id_iklanonline,
            'portal_iklanonline'        => $request->portal_iklanonline,
            'sales_iklanonline'         => $request->sales_iklanonline,
            'tanggal_muatiklanonline'   => $request->tanggal_muatiklanonline,

            // Simpan Hasil Hitungan Server (Lebih Aman)
            'harga_transaksionline'        => $harga_asli, // Harga Snapshot
            'insentif_transaksionline'     => $insentif,
            'komisi_transaksionline'       => $komisi,
            'diskon_transaksionline'       => $diskon_bersih,
            'ppn_transaksionline'          => $ppn, // Asumsi nama kolom di DB ppn_transaksionline
            'totaltagihan_transaksionline' => $total_tagihan,
            'jumlahbayar_transaksionline'  => $bayar_bersih,
            'piutang_transaksionline'      => $piutang,
        ]);

        return redirect()->route('transaksionline.index')
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
    public function update(Request $request, $id)
    {
        // 1. Validasi
        $request->validate([
            'tanggal_transaksionline' => 'required|date',
            'nama_pemasangonline'     => 'required',
            'alamat_pemasangonline'   => 'required',
            'id_iklanonline'          => 'required',
            'portal_iklanonline'      => 'required',
            'sales_iklanonline'       => 'required',
            'tanggal_muatiklanonline' => 'required|date',
            'diskon_transaksionline'      => 'required',
            'jumlahbayar_transaksionline' => 'required',
        ]);

        // 2. Bersihkan Format Rupiah (Hapus Titik)
        $diskon_bersih = (int) str_replace('.', '', $request->diskon_transaksionline);
        $bayar_bersih  = (int) str_replace('.', '', $request->jumlahbayar_transaksionline);

        // 3. Ambil Harga Terbaru dari Master (PENTING)
        // Kita harus mengambil harga lagi, karena bisa jadi user mengganti jenis iklan di form edit.
        $iklanMaster = \App\Models\IklanOnline::findOrFail($request->id_iklanonline);
        $harga_asli  = $iklanMaster->harga_iklanonline;

        // 4. Hitung Ulang Logika Keuangan
        $insentif = $harga_asli * 0.20; // 20%
        $komisi   = $harga_asli * 0.20; // 20%

        // Hitung Subtotal
        $subtotal = $harga_asli - $diskon_bersih;
        if ($subtotal < 0) $subtotal = 0;

        // Hitung PPN
        $ppn = $subtotal * 0.11;

        // Hitung Total Tagihan
        $total_tagihan = $subtotal + $ppn;

        // Hitung Piutang
        $piutang = $total_tagihan - $bayar_bersih;
        if ($piutang < 0) $piutang = 0;

        // 5. Update Database
        $transaksi = TransaksiOnline::findOrFail($id);

        $transaksi->update([
            'tanggal_transaksionline' => $request->tanggal_transaksionline,
            'nama_pemasangonline'     => $request->nama_pemasangonline,
            'alamat_pemasangonline'   => $request->alamat_pemasangonline,
            'id_iklanonline'          => $request->id_iklanonline,
            'portal_iklanonline'      => $request->portal_iklanonline,
            'sales_iklanonline'       => $request->sales_iklanonline,
            'tanggal_muatiklanonline' => $request->tanggal_muatiklanonline,

            // UPDATE DATA KEUANGAN (Pastikan semua baris ini tidak dikomentari)
            'harga_transaksionline'        => $harga_asli,
            'insentif_transaksionline'     => $insentif,
            'diskon_transaksionline'       => $diskon_bersih,
            'komisi_transaksionline'       => $komisi,
            'ppn_transaksionline'          => $ppn,
            'totaltagihan_transaksionline' => $total_tagihan,
            'jumlahbayar_transaksionline'  => $bayar_bersih,
            'piutang_transaksionline'      => $piutang,
        ]);

        return redirect()->route('transaksionline.index')
            ->with('success', 'Data Transaksi Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = TransaksiOnline::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Paket Sudah di Hapus');
    }
}
