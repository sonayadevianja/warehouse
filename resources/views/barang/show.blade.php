@extends('layouts.app')
@section('content')
    <div class="container-sm p-5">
        <div class="mb-3">
            <h4>Detail Barang</h4>
        </div>
        <div class="row justify-content-center">
            <div class="p-5 rounded-3 col-xl-12 border" style="background-color: #C79A56">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_barang" class="form-label">Jenis Ayam</label>
                        <h5>{{ $barang->nama_barang }}</h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="jenis" class="form-label">Kandang</label>
                        <h5>{{ $barang->jenis->jenis }}</h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_produksi" class="form-label">Tanggal Produksi</label>
                        <h5>{{ $barang->tanggal_produksi }}</h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="stok" class="form-label">Stok Telur</label>
                        <h5>{{ $barang->stok }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <h5>{{ $barang->deskripsi }}</h5>
                    </div>
                    {{-- <div class="col-md-12 mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        @if ($barang->original_filename)
                            <h5>{{ $barang->original_filename }}</h5>
                            <a href="{{ route('barang.downloadFile', ['barangId' => $barang->id]) }}" class="btn btn-dark btn-sm mt-2" style="background-color:#8C5630">
                                <i class="bi bi-download me-1"></i> Download Gambar
                            </a>
                        @else
                            <h5>Tidak ada</h5>
                        @endif
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-md-2 d-grid">
                        <a href="{{ route('barang.index') }}" type="submit" class="btn btn-dark btn-lg mt-3"
                            style="background-color:#8C5630"><i class="bi-arrow-left-circle me-2"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
