<?php

namespace App\Http\Controllers;

use App\Models\IklanOnline;
use Illuminate\Http\Request;

class IklanOnlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $iklanonline = IklanOnline::paginate(5);
        $kode_iklanonline = IklanOnline::createCode();
        
        return view('page.iklanonline.index')->with([
            'iklanonline' => $iklanonline,
            'kode_iklanonline' => $kode_iklanonline,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_iklanonline'   => 'required|unique:iklanonline,kode_iklanonline',
            'jenis_iklanonline' => 'required',
            'type_iklanonline'  => 'nullable',
            'portal_iklanonline' => 'nullable',
            'harga_iklanonline' => 'required|numeric',
        ]);

        // 2. Siapkan Array Data
        $data = [
            // PENTING: Panggil function createCode() dari Model di sini
            'kode_iklanonline'   => $request->input('kode_iklanonline'),
            'jenis_iklanonline'  => $request->input('jenis_iklanonline'),
            'type_iklanonline'   => $request->input('type_iklanonline'),
            'portal_iklanonline' => $request->input('portal_iklanonline'),
            'harga_iklanonline'  => $request->input('harga_iklanonline'),
        ];

        // 3. Simpan menggunakan MODEL (Bukan Controller)
        IklanOnline::create($data);

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
            'kode_iklanonline' => $request->input('kode_iklanonline'),
            'jenis_iklanonline' => $request->input('jenis_iklanonline'),
            'type_iklanonline' => $request->input('type_iklanonline'),
            'portal_iklanonline' => $request->input('portal_iklanonline'),
            'harga_iklanonline' => $request->input('harga_iklanonline'),
        ];
        $datas = IklanOnline::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete', 'Data Supplier Sudah dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = IklanOnline::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Suppier Sudah dihapus');
    }
}
