<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Jenis;
// use App\Models\barangmasuk;
use App\Models\barangkeluar;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        // $jenis = Jenis::all();
        // $barangmasuk = barangmasuk::all();
        return view('form_out',compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'barang_id' => 'required',
            'tanggal_keluar' => 'required',
            'amount' => 'required|numeric',
        ], $messages);

        $barangkeluar = new barangkeluar;
        $barangkeluar -> barang_id = $request->barang_id;
        $barangkeluar -> tanggal_keluar = $request->tanggal_keluar;
        $barangkeluar -> amount = $request->amount;
        $barangkeluar -> save();

        $barang = Barang::findOrFail($request->barang_id);
        $barang->stok -= $request->amount;
        $barang->save();
        Alert::success('Mengurangi Stok Barang', 'Stok barang berhasil dikurangi');

        return redirect()->route('barang.index');
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
