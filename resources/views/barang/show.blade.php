@extends('layouts.app')
@section('content')
    <div class="container-sm my-5">
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 col-xl-4 border">
                <div class="mb-3 text-center">
                    <i class="bi-person-circle fs-1"></i>
                    <h4>Detail Barang</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <h5>{{ $barang->nama_barang }}</h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="jenis" class="form-label">Jenis Barang</label>
                        <h5>{{ $barang->jenis->jenis }}</h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_produksi" class="form-label">Tanggal Produksi</label>
                        <h5>{{ $barang->tanggal_produksi }}</h5>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="stok" class="form-label">Stok Barang</label>
                        <h5>{{ $barang->stok }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <h5>{{ $barang->deskripsi }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        @if ($barang->original_filename)
                            <h5>{{ $barang->original_filename }}</h5>
                            <a href="{{ route('barang.downloadFile', ['barangId' => $barang->id]) }}" class="btn btn-primary btn-sm mt-2">
                                <i class="bi bi-download me-1"></i> Download CV
                            </a>
                        @else
                            <h5>Tidak ada</h5>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 d-grid">
                        <a href="{{ route('barang.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
