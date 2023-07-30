<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barangmasuk;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BarangMasukController extends Controller
{
public function index($id)
{
    $barang = DB::table('barangs')
                ->join('jenis', 'jenis.id', '=', 'barangs.jenis_id')
                ->join('barangmasuks', 'barangmasuks.id', '=', 'barangs.barangmasuk_id')
                ->where('barangs.id',$id)->get();
	// passing data barang yang didapat ke view
	return view('form_in',['barang' => $barang]);
}

public function store(Request $request)
{
    // barangmasuk::create([
    //     'tanggal_masuk' => $request->tanggal_masuk,
    //     'amount' => $request->amount
    // ]);



    // DB::table('barangmasuks')->insert([
	// 	'tanggal_masuk' => $request->tanggal_masuk,
	// 	'amount' => $request->amount
	// ]);

    // barangmasuk::create($request->all());

    // $barang_masuk = barangmasuk::findOrFail($request->id);
    // $barang_masuk->amount += $request->amount;
    // $barang_masuk->save();

    // $barang_masuk = Barang_Masuk::findOrFail($barangmasuk_id);
    // $barang_masuk->update($request->all());

    // $requestData = $request->all();
    // Barang::update($requestData);

    // $barangmasuk = BarangMasuk::findOrFail($request->barangmasuk_id);
    // $barang->stok += $request->amount;
    // $barang->save();

    $this->validate($request, [
        'nama_barang' => 'required',
        'tanggal_produksi' => 'required',
        'jenis_id' => 'required',
        'barangmasuk_id' => 'required',
        'barangkeluar_id' => 'required',
        'stok' => 'required',
        'deskripsi' => 'required'
    ]);

    $requestData = $request->all();
    Barang::create($requestData);
    // Barang::create([
    //     'amount' => $request->amount
    // ]);
    // Barang::create($request->all());
    $brg = barangmasuk::findOrFail($request->barangmasuk_id);
    $brg->amount += $request->stok;
    $brg->save();

    return redirect('barang.index');

}

}
?>
