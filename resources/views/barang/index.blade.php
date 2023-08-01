@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row mb-0">
        <div class="col-lg-9 col-xl-10">
            <h4 class="mb-3">{{ $pageTitle }}</h4>
        </div>
        <div class="dropdown show">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown link
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>
        <div class="col-lg-3 col-xl-6">
            <ul class="list-inline mb-0 float-end">
                <li class="list-inline-item">
                    <a href="{{ route('barang.exportPdf') }}" class="btn btn-outline-danger">
                        <i class="bi bi-download me-1"></i> to PDF
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="{{ route('barang.exportExcel') }}" class="btn btn-outline-success">
                        <i class="bi bi-download me-1"></i> to Excel
                    </a>
                </li>
                    <li class="list-inline-item">
                        <a href="{{route('barangmasuk.create')}}" class="btn btn-info">
                            <i class="bi bi-plus-circle-fill m-1"></i>Barang Masuk
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{route('barangkeluar.create')}}" class="btn btn-info">
                            <i class="bi bi-plus-circle-fill m-1"></i>Barang Keluar
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
        <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="BarangKuy">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Produksi</th>
                    <th>Jenis Barang</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
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
                    { data: 'gambar.original_filename', name: 'gambar.original_filename',
                        render: function( data, type, full, meta ) {
                            return "<img src=\"" + data + "\" height=\"50\"/>";
                        }
                    },
                    // { data: "encrypted_filename", name: "encrypted_filename" },
                    { data: "actions", name: "actions", orderable: false, searchable: false },
                ],
                order: [[0, "desc"]],
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"],
                ],
            });

            $(".datatable").on("click", ".btn-delete", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var name = $(this).data("name");

                Swal.fire({
                    title: "Are you sure want to delete\n" + name + "?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "bg-primary",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
