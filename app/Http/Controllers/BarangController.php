<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Jenis;
// use App\Models\barangmasuk;
// use App\Models\barangkeluar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Barang List';
        return view('barang.index', compact('pageTitle'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle='Create Barang';
        $jenis = Jenis::all();
        return view('barang.create',compact('pageTitle','jenis'));
    }

    /**
     * Store a newly created resource in storjumlah.
     */
    public function store(Request $request)
        {
            $messages = [
                'required' => ':Attribute harus diisi.',
                'numeric' => 'Isi :attribute dengan angka'
            ];

            $validator = Validator::make($request->all(), [
                'nama_barang' => 'required',
                'tanggal_produksi' => 'required',
                'deskripsi' => 'required',
                'stok' => 'required|numeric',
            ], $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // ELOQUENT
            $barang = New Barang;
            $barang->nama_barang = $request->nama_barang;
            $barang->tanggal_produksi = $request->tanggal_produksi;
            $barang->jenis_id = $request->jenis;
            $barang->stok = $request->stok;
            $barang->deskripsi = $request->deskripsi;

            $barang->save();

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
     * Update the specified resource in storjumlah.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storjumlah.
     */
    public function destroy(string $id)
    {
        $barang = Barang::find($id);
        $file ='public/files/'.$barang->encrypted_filename;
        // if (!empty($file)) {
        //     // Hapus file dari direktori public
        //     Storage::delete('/' . $file);
        // }
            // Hapus entitas dari database
            $barang->delete();
            return redirect()->route('barang.index');
    }

    public function getData(Request $request)
    {
        $barang = Barang::with('jenis');

        if ($request->ajax()) {
            return datatables()->of($barang)
                ->addIndexColumn()
                ->addColumn('actions', function($barang) {
                    return view('barang.actions', compact('barang'));
                })
                ->toJson();
        }
    }
}
