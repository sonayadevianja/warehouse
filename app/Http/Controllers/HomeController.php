<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pageTitle = 'Home';

        // Jumlah seluruh data
        // $totalBarangs = Barang::count();
        // Selisih antara barang masuk dan barang keluar
        $totalBarangMasuk = BarangMasuk::sum('amount');
        $totalBarangKeluar = BarangKeluar::sum('amount');
        $selisihBarang = $totalBarangMasuk - $totalBarangKeluar;

        // Jumlah stok berdasarkan jenis
        $stokPerJenis = Barang::with('jenis')
        ->selectRaw('jenis_id, SUM(stok) as total_stok')
        ->groupBy('jenis_id')
        ->get()
        ->map(function ($item) {
            return [
                'jenis' => $item->jenis->jenis, // Nama jenis dari relasi
                'total_stok' => $item->total_stok, // Total stok
            ];
        });

        // Jumlah barang masuk berdasarkan tanggal masuk
        $stokPerTanggal = barangmasuk::selectRaw('tanggal_masuk, SUM(amount) as total_amount')
            ->groupBy('tanggal_masuk')
            ->orderBy('tanggal_masuk', 'asc')
            ->get();


        return view('home', compact(
            'pageTitle',
            'selisihBarang',
            'totalBarangMasuk',
            'totalBarangKeluar',
            'stokPerJenis',
            'stokPerTanggal'
        ));
    }

    public function barangmasuk()
    {
        $pageTitle = 'Barang Masuk';
        return view('form_in', compact('pageTitle'));
    }

    public function barangkeluar()
    {
        $pageTitle = 'Barang Keluar';
        return view('form_out', compact('pageTitle'));
    }

    public function barangedit()
    {
        $pageTitle = 'Barang Edit';
        return view('edit', compact('pageTitle'));
    }
}
