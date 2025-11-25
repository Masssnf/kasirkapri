<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use Illuminate\Http\Request;

class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $iklan = Iklan::paginate(5);
        return view('page.iklan.index')->with([
            'iklan' => $iklan,
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
        $data = [
            'kode_iklan' => $request->input('kode_iklan'),
            'type_iklan' => $request->input('type_iklan'),
            'jenis_iklan' => $request->input('jenis_iklan'),
            'warna_iklan' => $request->input('warna_iklan'),
            'iklan_priangan' => $request->input('iklan_priangan'),
            'harga_iklan' => $request->input('harga_iklan'),
        ];

        Iklan::create($data);

        return back()->with('message_delete', 'Data Supplier Sudah dihapus');

        // try {
        //     $data = [
        //         'kode_iklan' => $request->input('kode_iklan'),
        //         'type_iklan' => $request->input('type_iklan'),
        //         'jenis_iklan' => $request->input('jenis_iklan'),
        //         'warna_iklan' => $request->input('warna_iklan'),
        //         'iklan_priangan' => $request->input('iklan_priangan'),
        //         'harga_iklan' => $request->input('harga_iklan'),
        //     ];
        //     Iklan::create($data);

        //     // return back()->with('message_delete', 'Data Customer Sudah di Hapus');

        //     return redirect()
        //         ->route('iklan.index')
        //         ->with('message_insert', 'Data Album Sudah ditambahkan');
        // } catch (\Exception $e) {
        //     echo "<script>console.error('PHP Error: " .
        //         addslashes($e->getMessage()) . "');</script>";
        //     return view('page.iklan.index');
        // }
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
            'kode_iklan' => $request->input('kode_iklan'),
            'type_iklan' => $request->input('type_iklan'),
            'jenis_iklan' => $request->input('jenis_iklan'),
            'warna_iklan' => $request->input('warna_iklan'),
            'iklan_priangan' => $request->input('iklan_priangan'),
            'harga_iklan' => $request->input('harga_iklan'),
        ];

        $datas = Iklan::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete', 'Data Supplier Sudah dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Iklan::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Suppier Sudah dihapus');
    }
}
