@extends('layouts.app')
@section('content')
    <section id="main-content">
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <h1 class="mb-4">Dashboard</h1>
                <div class="container-fluid">
                    <!-- OVERVIEW -->
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sistem Informasi Pencatatan Peternakan Telur</h3>
                            <p class="panel-subtitle">Desa XYZ - Blitar</p>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                {{-- <div class="col-md-9">
                            <div>
                                <img src="{{ asset('img/1.jpg') }}" style="width: 100%;">
                            </div>
                        </div> --}}
                                <div class="col-md-12">
                                    <div class="weekly-summary">
                                        <span class="number" style="font-size: 22px;">PT ABC adalah UMKM yang memproduksi
                                            ayam petelur lebih dari 5 tahun</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container py-0">
                    <!-- Card Section -->
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3">
                            <div class="card text-center shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Total Telur Saat Ini</h5>
                                    <p class="display-4 text-primary">{{ $selisihBarang }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card text-center shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Telur Masuk</h5>
                                    <p class="display-4 text-success">{{ $totalBarangMasuk }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card text-center shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Telur Keluar</h5>
                                    <p class="display-4 text-danger">{{ $totalBarangKeluar }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart Section -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Telur Berdasarkan Kandang</h5>
                                    <canvas id="jenisChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Telur Berdasarkan Tanggal</h5>
                                    <canvas id="tanggalChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const jenisLabels = @json($stokPerJenis->pluck('jenis'));
                const jenisData = @json($stokPerJenis->pluck('total_stok'));

                const jenisChart = new Chart(document.getElementById('jenisChart'), {
                    type: 'bar',
                    data: {
                        labels: jenisLabels,
                        datasets: [{
                            label: 'Jumlah Stok',
                            data: jenisData,
                            backgroundColor: 'rgba(54, 162, 235, 0.6)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    }
                });

                // chart taggal
                const tanggalLabels = @json($stokPerTanggal->pluck('tanggal_masuk'));
                const tanggalData = @json($stokPerTanggal->pluck('total_amount'));

                const tanggalChart = new Chart(document.getElementById('tanggalChart'), {
                type: 'line',
                data: {
                    labels: tanggalLabels, // Tanggal masuk
                    datasets: [{
                        label: 'Jumlah Telur Masuk',
                        data: tanggalData, // Total amount
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Tanggal Masuk'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Total Amount'
                            },
                            beginAtZero: true
                        }
                    }
                }
                });
            </script>
        @endpush
    @endsection
