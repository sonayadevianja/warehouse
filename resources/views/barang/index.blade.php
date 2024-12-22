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
                            <button class="btn btn-dark dropdown-toggle" type="button" style="background-color:#8C5630 "
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Manajemen Stok
                            </button>
                            <ul class="dropdown-menu dropdown-menu-white" aria-labelledby="dropdownMenuButton1">
                                {{-- <li><a class="dropdown-item" href="{{ route('barang.create') }}"><i class="bi bi-box-fill"></i>Input Barang</a></li> --}}
                                <li><a class="dropdown-item" href="{{ route('barangmasuk.create') }}"><i
                                            class="bi bi-bag-plus-fill"></i>Stok Telur Masuk</a></li>
                                <li><a class="dropdown-item" href="{{ route('barangkeluar.create') }}"><i
                                            class="bi bi-bag-dash-fill"></i>Stok Telur Keluar</a></li>
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
                        {{-- <th class="header-color">Gambar</th> --}}
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
                            {{-- <td>{{ $barang->gambar }}</td> --}}
                            <td>@include('barang.actions')</td>
                        </tr>
                    @endforeach
                </tbody>
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
                    columns: [{
                            data: "DT_RowIndex",
                            name: "DT_RowIndex",
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: "nama_barang",
                            name: "nama_barang"
                        },
                        {
                            data: "tanggal_produksi",
                            name: "tanggal_produksi"
                        },
                        {
                            data: "jenis.kode",
                            name: "jenis.kode"
                        },
                        {
                            data: "stok",
                            name: "stok"
                        },
                        {
                            data: "deskripsi",
                            name: "deskripsi"
                        },
                        // { data: 'gambar.original_filename', name: 'gambar.original_filename',
                        //     render: function( data, type, full, meta ) {
                        //         return "<img src=\"" + data + "\" height=\"50\"/>";
                        //     }
                        // },
                        // { data: "encrypted_filename", name: "encrypted_filename" },
                        {
                            data: "actions",
                            name: "actions",
                            orderable: false,
                            searchable: false
                        },
                    ],
                    order: [
                        [0, "desc"]
                    ],
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"],
                    ],
                });

                $(".datatable").on("click", ".btn-delete", function(e) {
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
