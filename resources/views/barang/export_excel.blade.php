<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Jenis</th>
            <th>Tanggal Masuk</th>
            <th>Stok</th>
            <th>Deskripsi (catatan/notes)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barangs as $index => $barang)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->jenis->jenis }}</td>
                <td>{{ $barang->tanggal_produksi }}</td>
                <td>{{ $barang->stok }}</td>
                <td>{{ $barang->deskripsi}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
