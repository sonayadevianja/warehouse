<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Jenis;
use App\Models\barangmasuk;
use App\Models\barangkeluar;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class HistoryController extends Controller
{
    public function index()
    {
        $pageTitle = 'List History Barang Masuk';
        return view('barang.history_in', compact('pageTitle'));

    }

    public function MasukJson(Request $request){
        $barangmasuk = barangmasuk::with('barang');

            if ($request->ajax()) {
                return datatables()->of($barangmasuk)
                    ->addIndexColumn()
                    ->toJson();
            }
    }

    public function barangkeluar()
    {
        $pageTitle = 'List History Barang Keluar';
        return view('barang.history_out', compact('pageTitle'));

    }

    public function KeluarJson(Request $request){
        $barangkeluar = barangkeluar::with('barang');

            if ($request->ajax()) {
                return datatables()->of($barangkeluar)
                    ->addIndexColumn()
                    ->toJson();
            }
    }
}
