@extends('layouts.app')

@section('content')
<!-- Navbar End -->

<!-- Form -->
    <div class="container-sm mt-5">
        <form action="" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 rounded-3 border col-xl-6" style="background-color: #fff;">

                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>FORM BARANG KELUAR</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_barang" class="form-label" style="font-weight:bold;">NAMA BARANG</label>
                            <select name="nama_barang" id="nama_barang" class="form-select">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jenis" class="form-label" style="font-weight:bold;">JENIS</label>
                            <input class="form-control" type="text" name="jenis" id="jenis" value="">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="tgl_masuk" class="form-label" style="font-weight:bold;">TANGGAL MASUK</label>
                            <input class="form-control " type="date" name="tgl_masuk" id="tgl_masuk" value="" placeholder="Masukkan jumlah">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="stok" class="form-label" style="font-weight:bold;">STOK</label>
                            <input class="form-control " type="text" name="stok" id="stok">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="tgl_keluar" class="form-label" style="font-weight:bold;">TANGGAL KELUAR</label>
                            <input class="form-control " type="date" name="tgl_keluar" id="tgl_keluar" value="" placeholder="Masukkan jumlah">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="age" class="form-label" style="font-weight:bold;">JUMLAH KELUAR</label>
                            <input class="form-control " type="text" name="jml_keluar" id="jml_keluar" value="" placeholder="Masukkan jumlah">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
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
