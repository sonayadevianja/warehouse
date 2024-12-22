@extends('layouts.app')
@section('content')
    <div class="container-sm p-5">
        <div class="mb-3">
            <h4>STOK KELUAR TELUR PRODUKSI</h4>
        </div>
        <form action="{{ route('barangkeluar.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 rounded-3 border col-xl-12" style="background-color: #C79A56">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_barang" class="form-label">Kandang</label>
                            <select type="text" name="barang_id"
                                class="form-control @error('nama_barang') is-invalid @enderror"
                                placeholder="masukan Nama Barang">
                                <option value="">--pilih kandang--</option>
                                @foreach ($barang as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->jenis_id }}
                                    </option>
                                @endforeach
                            </select>
                            @error('nama_barang')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_keluar"
                                class="form-label @error('tanggal_keluar') is-invalid @enderror">Tanggal Keluar</label>
                            <input type="date" name="tanggal_keluar" class="form-control">
                            @error('tanggal_keluar')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="amount" class="form-label">Jumlah Keluar</label>
                            <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror"
                                placeholder="Masukkan Jumlah Telur Keluar">
                            @error('amount')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2 d-grid">
                            <a href="{{ route('barang.index') }}" class="btn btn-light btn-lg mt-3"><i
                                    class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-2 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3" style="background-color:#8C5630"><i
                                    class="bi-check-circle me-2"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
