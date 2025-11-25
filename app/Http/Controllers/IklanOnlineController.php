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
        return view('page.iklanonline.index')->with([
            'iklanonline' => $iklanonline,
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
        $data = [
            'kode_iklanonline' => $request->input('kode_iklanonline'),
            'jenis_iklanonline' => $request->input('jenis_iklanonline'),
            'type_iklanonline' => $request->input('type_iklanonline'),
            'portal_iklanonline' => $request->input('portal_iklanonline'),
            'harga_iklanonline' => $request->input('harga_iklanonline'),
        ];

        IklanOnlineController::create($data);

        return back()->with('message_delete', 'Data Supplier Sudah dihapus');
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
