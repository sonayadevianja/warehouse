@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row mb-0">
        <div class="col-lg-9 col-xl-10">
            <h4 class="mb-3">{{ $pageTitle }}</h4>
        </div>
        <div class="col-lg-3 col-xl-6">
            <ul class="list-inline mb-0 float-end">
                    <li class="list-inline-item">
                        <a href="{{route('barangmasuk.create')}}" class="btn btn-info">
                            <i class="bi bi-plus-circle-fill m-1"></i>Tambah Barang
                        </a>
                    </li>
                    <li class="list-inline-item">|</li>
                    <li class="list-inline-item">
                        <a href="{{ route('barang.create') }}" class="btn btn-dark">
                            <i class="bi bi-plus-circle me-1"></i> Create Barang
                        </a>
                    </li>
            </ul>
        </div>
    </div>
    <hr>
    <div class="table-responsive border p-3 rounded-3">
        <table class="table table-bordered table-hover table-striped mb-0 bg-white" id="BarangKuy">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Produksi</th>
                    <th>Jenis Barang</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    {{-- <th>Gambar</th> --}}
                    <th>Aksi</th>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach ($barangs as $barang)
                    <tr>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->tanggal_produksi }}</td>
                        <td>{{ $barang->jenis->jenis }}</td>
                        <td>{{ $barang->tanggal_keluar }}</td>
                        <td>{{ $barang->tanggal_masuk }}</td>
                        <td>{{ $barang->jumlah}}</td>
                        <td>{{ $barang->keterangan }}</td>
                        <td>{{ $barang->gambar }}</td>
                        <td>@include('barang.action')</td>
                    </tr>
                @endforeach
            </tbody> --}}
        </table>
    </div>
@endsection
@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $("#BarangKuy").DataTable({
                serverSide: true,
                processing: true,
                ajax: "/getBarang",
                columns: [
                    { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
                    { data: "nama_barang", name: "nama_barang" },
                    { data: "tanggal_produksi", name: "tanggal_produksi" },
                    { data: "jenis.kode", name: "jenis.kode" },
                    { data: "stok", name: "stok" },
                    { data: "deskripsi", name: "deskripsi" },
                    { data: "actions", name: "actions", orderable: false, searchable: false },
                ],
                order: [[0, "desc"]],
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"],
                ],
            });
        });
    </script>
@endpush
