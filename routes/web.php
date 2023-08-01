<?php
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('barang', BarangController::class);
    Route::resource('barangmasuk', BarangMasukController::class);
    Route::resource('barangkeluar', BarangKeluarController::class);

    Route::get('history_barangmasuk', [HistoryController::class,'index'])->name('History_in.index');
    Route::get('history_barangkeluar', [HistoryController::class,'barangkeluar'])->name('History_out.index');

    Route::get('getBarang', [BarangController::class, 'getData'])->name('barang.getData');

    Route::get('getMasuk', [HistoryController::class,'MasukJson'])->name('History.Masuk');
    Route::get('getKeluar', [HistoryController::class,'KeluarJson'])->name('History.Keluar');

    Route::get('/local-disk', function() {
        Storage::disk('local')->put('local-example.txt', 'This is local example content');
        return asset('storage/local-example.txt');
    });

    Route::get('/public-disk', function() {
        Storage::disk('public')->put('public-example.txt', 'This is public example content');
        return asset('storage/public-example.txt');
    });

    Route::get('download-file/{barangId}', [BarangController::class, 'downloadFile'])->name('barang.downloadFile');

    Route::get('exportExcel', [BarangController::class, 'exportExcel'])->name('barang.exportExcel');

    Route::get('exportPdf', [BarangController::class, 'exportPdf'])->name('barang.exportPdf');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// routes/web.php



