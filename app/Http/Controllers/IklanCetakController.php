<?php

namespace App\Http\Controllers;

use App\Models\IklanCetak;
use Illuminate\Http\Request;

class IklanCetakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $iklancetak = IklanCetak::paginate(5);
        $kode_iklancetak = IklanCetak::createCode();
        
        return view('page.iklancetak.index')->with([
            'iklancetak' => $iklancetak,
            'kode_iklancetak' => $kode_iklancetak,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_iklancetak'   => 'required|unique:iklancetak,kode_iklancetak',
            'jenis_iklancetak' => 'required',
            'warna_iklancetak'  => 'required',
            'baris_iklancetak' => 'nullable',
            'kolom_iklancetak' => 'nullable',
            'harga_iklancetak' => 'required|numeric',
        ]);

        // 2. Siapkan Array Data
        $data = [
            // PENTING: Panggil function createCode() dari Model di sini
            'kode_iklancetak'   => $request->input('kode_iklancetak'),
            'jenis_iklancetak'  => $request->input('jenis_iklancetak'),
            'warna_iklancetak'   => $request->input('warna_iklancetak'),
            'baris_iklancetak' => $request->input('baris_iklancetak'),
            'kolom_iklancetak' => $request->input('kolom_iklancetak'),
            'harga_iklancetak'  => $request->input('harga_iklancetak'),
        ];

        // 3. Simpan menggunakan MODEL (Bukan Controller)
        IklanCetak::create($data);

        // 4. Redirect dengan pesan sukses yang benar
        return back()->with('success', 'Data Iklan berhasil disimpan!');
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
        $data = [
            'kode_iklancetak' => $request->input('kode_iklancetak'),
            'jenis_iklancetak' => $request->input('jenis_iklancetak'),
            'warna_iklancetak' => $request->input('warna_iklancetak'),
            'baris_iklancetak' => $request->input('baris_iklancetak'),
            'kolom_iklancetak' => $request->input('kolom_iklancetak'),
            'harga_iklancetak' => $request->input('harga_iklancetak'),
        ];
        $datas = IklanCetak::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete', 'Data Supplier Sudah dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = IklanCetak::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Suppier Sudah dihapus');
    }
}
