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
        //
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
