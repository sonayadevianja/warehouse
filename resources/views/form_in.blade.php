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
                        <h4>FORM BARANG MASUK</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fnama_barang" class="form-label" style="font-weight:bold;">NAMA BARANG</label>
                            <input class="form-control" type="text" name="nama_barang" id="nama_barang" value="" placeholder="Masukkan nama barang">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label" style="font-weight:bold;">JENIS</label>
                            <input class="form-control" type="text" name="lastName" id="lastName" value="" placeholder="Masukkan jenis">

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label" style="font-weight:bold;">TANGGAL MASUK</label>
                            <input class="form-control " type="date" name="email" id="email" value="" placeholder="Masukkan tanggal">

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="age" class="form-label" style="font-weight:bold;">JUMLAH</label>
                            <input class="form-control " type="text" name="age" id="age" value="" placeholder="Masukkan jumlah">

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
