@extends('layouts.app')
@section('content')
<section class="p-4" id="main-content">
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">RIZAL SALSA COLLECTION bos ketintang ptt</h3>
                    <p class="panel-subtitle">Ketintang - Surabaya Selatan</p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div>
                                <img src="{{ Vite::asset('resources/images/1.jpg') }}" style="width: 100%;">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="weekly-summary">
                                <span class="number" style="font-size: 22px;">Rizal Salsa Collection adalah UMKM yang menyediakan berbagai layanan dan jasa untuk penjahitan yang
                                    berhubungan dengan produk kain seperti pemesanan khusus dari hotel serta pemesanan dari pelanggan tetap untuk memproduksi
                                    produk berupa Sprei, Bed Cover, Mukenah</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
