@extends('layouts.app')
@section('content')
    <div class="container mt-4" id="main-content">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-10">
                <h1 class="mb-3" style="font-family:Monospace">{{ $pageTitle }}</h1>
            </div>
            <div class="col-lg-12 col-xl-12">
                <ul class="list-inline mb-3 float-end">
                    <li class="list-inline-item">
                        <a href="{{ route('barang.exportPdf') }}" class="btn btn-outline-danger">
                            <i class="bi bi-file-earmark-pdf-fill"></i> to PDF
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ route('barang.exportExcel') }}" class="btn btn-outline-success">
                            <i class="bi bi-file-earmark-spreadsheet-fill"></i> to Excel
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ route('barang.create') }}" class="btn btn-dark " style="background-color: #8C5630 ">
                            <i class="bi bi-box-fill"></i> Input Barang
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle" type="button" style="background-color:#8C5630"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Manajemen Stok
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('barangmasuk.create') }}"><i class="bi bi-bag-plus-fill"></i>Stok Telur Masuk Gudang</a></li>
                                <li><a class="dropdown-item" href="{{ route('barangkeluar.create') }}"><i class="bi bi-bag-dash-fill"></i>Stok Telur Keluar Gudang</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3">
            <table class="display datatable" id="BarangKuy">
                <thead>
                    <tr>
                        <th class="header-color">No</th>
                        <th class="header-color">Jenis Ayam</th>
                        <th class="header-color">Tanggal</th>
                        <th class="header-color">Kandang</th>
                        <th class="header-color">Stok</th>
                        <th class="header-color">Deskripsi</th>
                        <th class="header-color">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $barang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang->nama_barang }}</td>
                            <td>{{ $barang->tanggal_produksi }}</td>
                            <td>{{ $barang->jenis->jenis }}</td>
                            <td>{{ $barang->stok }}</td>
                            <td>{{ $barang->deskripsi }}</td>
                            <td>@include('barang.actions')</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            // Menangani klik pada tombol dropdown
            var dropdownToggle = document.querySelector('.dropdown-toggle');
            var dropdownMenu = dropdownToggle.nextElementSibling;

            // Menambahkan event listener untuk toggle visibility dropdown
            dropdownToggle.addEventListener('click', function (e) {
                e.preventDefault(); // Mencegah aksi default (bisa ditambahkan jika perlu)
                dropdownMenu.classList.toggle('show'); // Toggle class 'show' untuk visibilitas menu
            });

            // Menutup dropdown jika klik di luar dropdown
            document.addEventListener('click', function (e) {
                if (!e.target.closest('.dropdown')) {
                    // Menghapus class 'show' jika klik di luar dropdown
                    dropdownMenu.classList.remove('show');
                }
            });
        });
    </script>
@endpush
