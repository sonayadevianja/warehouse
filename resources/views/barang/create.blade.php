@extends('layouts.app')
@section('content')
    <div class="container-sm mt-5">
        <form action="{{ route('barang.store') }}" method="POST" >
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        <i class="bi bi-bag-heart fs-1"></i>
                        <h4>Input Barang</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input class="form-control @error('nama_barang') is-invalid @enderror" type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang') }}" placeholder="masukan Nama Barang">
                            @error('nama_barang')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jenis" class="form-label">Jenis Barang</label>
                            <select name="jenis" id="jenis" class="form-select">
                                @foreach ($jenis as $jenis)
                                    <option value="{{ $jenis->id }}" {{ old('jenis') == $jenis->id ? 'selected' : '' }}>{{ $jenis->kode}}</option>
                                @endforeach
                            </select>
                            @error('jenis')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_produksi" class="form-label">Tanggal Produksi</label>
                            <input class="form-control @error('tanggal_produksi') is-invalid @enderror" type="date" name="tanggal_produksi" id="tanggal_produksi" value="{{ old('tanggal_produksi') }}">
                            @error('tanggal_produksi')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stok" class="form-label">stok</label>
                            <input class="form-control @error('stok') is-invalid @enderror" type="text" name="stok" id="stok" value="{{ old('stok') }}" placeholder="masukan stok barang">
                            @error('stok')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Barang</label>
                            <input class="form-control @error('deskripsi') is-invalid @enderror" type="text" name="deskripsi" id="deskripsi" value="{{ old('deskripsi') }}" placeholder="Masukan Deskripsi Barang">
                            @error('deskripsi')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        {{-- <div class="col-md-12 mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="gambar" id="gambar">
                        </div> --}}
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('barang.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

