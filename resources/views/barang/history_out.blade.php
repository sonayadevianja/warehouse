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
        <table class="table table-bordered table-hover table-striped mb-0 bg-white" id="history_out">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Ayam</th>
                    <th>Kandang</th>
                    <th>Tanggal Keluar</th>
                    <th>Jumlah Keluar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangkeluar as $bm)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bm->barang->nama_barang }}</td>
                        <td>{{ $bm->barang->jenis->jenis }}</td>
                        <td>{{ $bm->tanggal_keluar }}</td>
                        <td>{{ $bm->amount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $("#history_out").DataTable({
                serverSide: true,
                processing: true,
                ajax: "/getKeluar",
                columns: [
                    { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
                    { data: "barang.nama_barang", name: "barang.nama_barang" },
                    { data: "barang.jenis_id", name: "barang.jenis_id" },
                    { data: "tanggal_keluar", name: "tanggal_keluar" },
                    { data: "amount", name: "amount" },
                    // { data: "barang.stok", name: "barang.stok" },
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
