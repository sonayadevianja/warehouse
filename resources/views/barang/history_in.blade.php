@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row mb-0">
        <div class="col-lg-9 col-xl-10">
            <h1 class="mb-3" style="font-family:Monospace">{{ $pageTitle }}</h1>
        </div>
    </div>
    <hr>
    <div class="table-responsive border p-3 rounded-3">
        <table class="table table-bordered table-hover table-striped mb-0 bg-white" id="history_in">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Masuk</th>
                    <th>Barang masuk</th>
                    <th>Stok saat ini</th>
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
            $("#history_in").DataTable({
                serverSide: true,
                processing: true,
                ajax: "/getMasuk",
                columns: [
                    { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
                    { data: "barang.nama_barang", name: "barang.nama_barang" },
                    { data: "tanggal_masuk", name: "tanggal_masuk" },
                    { data: "amount", name: "amount" },
                    { data: "barang.stok", name: "barang.stok" },
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
