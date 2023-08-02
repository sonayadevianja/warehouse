@extends('layouts.app')

@section('content')
<!-- Navbar End -->

<!-- Form -->
    <div class="container-sm mt-5">
        <form action="{{ route('barang.update', $barang->id ?? 'id not found') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="p-5 rounded-3 border col-xl-6" style="background-color: #fff;">

                    <div class="mb-3 text-center">
                        <i class="bi bi-pencil-fill fs-1"></i>
                        <h4>FORM EDIT BARANG </h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_barang" class="form-label" style="font-weight:bold;">NAMA BARANG</label>
                            <input class="form-control @error('nama_barang') is-invalid @enderror" type="text" name="nama_barang" id="nama_barang" value="{{ $errors->any() ? old('nama_barang') : $barang->nama_barang }}">
                            @error('nama_barang')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                                <label for="jenis" class="form-label" style="font-weight:bold;">JENIS</label>
                                <select name="jenis" id="jenis" class="form-select">
                                    @foreach ($jenis as $jenis)
                                        <option value="{{ $jenis->id }}" {{ old('jenis') == $jenis->id ? 'selected' : '' }}>{{ $jenis->kode }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="deskripsi" class="form-label" style="font-weight:bold;"> Deskripsi </label>
                            <input class="form-control @error('deskripsi') is-invalid @enderror" type="text" name="deskripsi" id="deskripsi" value="{{ $errors->any() ? old('deskripsi') : $barang->deskripsi }}" placeholder="Enter Deskripsi">
                            @error('deskripsi')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            @if ($barang->original_filename)
                                <h5>{{ $barang->original_filename }}</h5>
                            @else
                                <h5>Tidak ada</h5>
                            @endif
                            <input type="file" class="form-control" name="gambar" id="gambar">
                            @error('gambar')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('barang.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

