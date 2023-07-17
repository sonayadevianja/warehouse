<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'List Barang';

        // RAW SQL QUERY
        // $barangs = DB::select('
        //     select *, barangs.id as barang_id
        //     from barangs
        //     left join positions on barangs.position_id = positions.id
        // ');

        // Query Builder
        // $barangs = DB::table('barangs')
        //     ->select('barangs.*', 'barangs.id as barang_id', 'positions.*')
        //     ->leftJoin('positions', 'barangs.position_id', '=', 'positions.id')
        //     ->get();

        // Eloquent
        $barang = Barang::all();

        return view('barang.index', [
            'pageTitle' => $pageTitle,
            'barangs' => $barang
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
