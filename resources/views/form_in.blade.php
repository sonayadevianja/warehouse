@extends('layouts.app')

@section('content')
<!-- Navbar End -->

<!-- Form -->
    <div class="container-sm mt-5">
            <div class="row justify-content-center">
                <div class="p-5 rounded-3 border col-xl-6" style="background-color: #fff;">

                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>FORM BARANG MASUK</h4>
                    </div>
                    <hr>
                    @foreach($barang as $b)
                    <form action="/barang/tambah_barang_masuk" method="POST">
                        {{ csrf_field() }}
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $b->id }}">
                        <div class="col-md-6 mb-3">
                            <label for="nama_barang" class="form-label" style="font-weight:bold;">NAMA BARANG</label>
                            <input class="form-control" disabled type="text" name="nama_barang" id="nama_barang" value="{{ $b->nama_barang}}" placeholder="Masukkan nama barang">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_produksi" class="form-label" style="font-weight:bold;">TANGGAL PRODUKSI</label>
                            <input class="form-control" disabled type="text" name="tanggal_produksi" id="tanggal_produksi" value="{{ $b->tanggal_produksi}}" placeholder="Masukkan nama barang">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jenis" class="form-label" style="font-weight:bold;">JENIS</label>
                            <input class="form-control" disabled type="text" name="jenis" id="jenis" value="{{ $b->jenis}}" placeholder="Masukkan jenis">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stok" class="form-label" style="font-weight:bold;">STOK</label>
                            <input class="form-control" disabled type="text" name="stok" id="stok" value="{{ $b->stok}}" placeholder="Masukkan stok">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="deskripsi" class="form-label" style="font-weight:bold;">Deskripsi</label>
                            <input class="form-control" disabled type="text" name="deskripsi" id="deskripsi" value="{{ $b->deskripsi}}" placeholder="Masukkan keterangan">
                        </div>
                        @endforeach
                        {{-- <div class="col-md-6 mb-3">
                            <label for="tanggal_masuk" class="form-label" style="font-weight:bold;">TANGGAL MASUK</label>
                            <input class="form-control" type="date" name="tanggal_masuk" id="tanggal_masuk" required="required">
                        </div> --}}
                        <div class="col-md-6 mb-3">
                            <label for="amount" class="form-label" style="font-weight:bold;">JUMLAH MASUK</label>
                            <input class="form-control" type="number" name="amount" id="amount" required="required">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('barang.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-lg mt-3" style="background-color: #876445;"><i class="bi-check-circle me-2"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
