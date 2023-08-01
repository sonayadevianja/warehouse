<?php
  /**
     * BAGIAN FUNCTION UPDATE MASIH HARUS DIEDIT
     */
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
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BarangExport;
use PDF;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Barang List';
        confirmDelete();
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
                // 'numeric' => 'Isi :attribute dengan angka'
                'unique' => 'Nama sudah tersedia',
            ];

            $validator = Validator::make($request->all(), [
                'nama_barang' => 'required|unique:barangs',
                'tanggal_produksi' => 'required',
                'deskripsi' => 'required',
                // 'stok' => 'required|numeric',
            ], $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $file = $request->file('gambar');

            if ($file != null) {
                $originalFilename = $file->getClientOriginalName();
                $encryptedFilename = $file->hashName();

                // Store File
                $file->store('public/files');
            }

            // ELOQUENT
            $barang = New Barang;
            $barang->nama_barang = $request->nama_barang;
            $barang->tanggal_produksi = $request->tanggal_produksi;
            $barang->jenis_id = $request->jenis;
            // $barang->stok = $request->stok;
            $barang->deskripsi = $request->deskripsi;

            if ($file != null) {
                $barang->original_filename = $originalFilename;
                $barang->encrypted_filename = $encryptedFilename;
            }

            $barang->save();

            Alert::success('Added Successfully', 'Employee Data Added Successfully.');
            return redirect()->route('barang.index');
        }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Detail Barang';

        $barang = Barang::find($id);
        return view('barang.show', compact('pageTitle', 'barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pageTitle = 'Barang Edit';
        $barang = Barang::find($id);
        $jenis = Jenis::all();
        return view('barang.edit', compact('barang','jenis','pageTitle'));
    }
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => 'Attribute harus diisi',
        ];
        $validator = Validator::make($request->all(), [
            'nama_barang'=>'required',
            'deskripsi'=>'required'
        ], $messages);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file = $request->file('gambar');

        if ($file != null) {
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();

            // Store File
            $file->store('public/files');
        }

        // Simpan perubahan data ke dalam model BELUM VALID
        $barang = Barang::find($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->jenis_id = $request->jenis;
        $barang->deskripsi = $request->deskripsi;
        if ($file != null) {
            $barang->original_filename = $originalFilename;
            $barang->encrypted_filename = $encryptedFilename;
        }
        // Update atribut lain sesuai kebutuhan
        // Simpan perubahan ke dalam database
        $barang->save();
        Alert::success('Changed Successfully', 'Employee Data Changed Successfully.');

        return redirect()->route('barang.index');
    }

    /**
     * Update the specified resource in storjumlah.
     */
   // public function update(Request $request, string $id)
   // {
        //
   // }

    /**
     * Remove the specified resource from storjumlah.
     */
    public function destroy(string $id)
    {
        $barang = Barang::find($id);
        $file ='public/files/'.$barang->encrypted_filename;
        if (!empty($file)) {
            // Hapus file dari direktori public
            Storage::delete('/' . $file);
        }
            // Hapus entitas dari database
            $barang->delete();
            Alert::success('Deleted Successfully', 'Employee Data Deleted Successfully.');
            return redirect()->route('barang.index');
    }

    public function getData(Request $request)
    {
        $barang = Barang::with('jenis');

        if ($request->ajax()) {
            return datatables()->of($barang)
                ->addIndexColumn()
                ->addColumn('gambar.original_filename', function ($barang) {
                    return ' '.$barang->original_filename.' ';
                   })
                ->addColumn('actions', function($barang) {
                     return view('barang.actions', compact('barang'));
                })
                ->toJson();
        }
    }

    public function downloadFile($barangId)
    {
        $barang = Barang::find($barangId);
        $encryptedFilename = 'public/files/'.$barang->encrypted_filename;
        $downloadFilename = Str::lower($barang->nama_barang.'_cv.pdf');

        if(Storage::exists($encryptedFilename)) {
            return Storage::download($encryptedFilename, $downloadFilename);
        }
    }

    public function exportExcel()
    {
        return Excel::download(new BarangExport, 'Barang.xlsx');
    }

    public function exportPdf()
    {
        $barangs = Barang::all();

        $pdf = PDF::loadView('barang.export_pdf', compact('barangs'));

        return $pdf->download('barang.pdf');
    }


}
