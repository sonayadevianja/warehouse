@extends('layouts.app')
@section('content')
    <div class="container-sm mt-5">
        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="jumlah" class="form-label">jumlah</label>
                            <input class="form-control @error('jumlah') is-invalid @enderror" type="text" name="jumlah" id="jumlah" value="{{ old('jumlah') }}" placeholder="masukan jumlah barang">
                            @error('jumlah')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                            <input class="form-control @error('tanggal_masuk') is-invalid @enderror" type="date" name="tanggal_masuk" id="tanggal_masuk" value="{{ old('tanggal_masuk') }}">
                            @error('tanggal_masuk')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                            <input class="form-control @error('tanggal_keluar') is-invalid @enderror" type="date" name="tanggal_keluar" id="tanggal_keluar" value="{{ old('tanggal_keluar') }}">
                            @error('tanggal_keluar')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="keterangan" class="form-label">Deskripsi Barang</label>
                            <input class="form-control @error('keterangan') is-invalid @enderror" type="text" name="keterangan" id="keterangan" value="{{ old('keterangan') }}" placeholder="Masukan Deskripsi Barang">
                            @error('keterangan')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="gambar" id="gambar">
                        </div>
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

