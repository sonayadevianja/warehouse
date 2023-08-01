<div class="d-flex">
    <a href="{{ route('barang.show', ['barang' => $barang->id]) }}" class="btn btn-outline-dark btn-sm me-2">
        <i class="bi-person-lines-fill"></i>
    </a>
    <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>
    {{-- <a href=" {{route('barangmasuk.create', $barang->id)}}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-plus-circle-fill"></i></a> --}}
    <div>
        <form action="{{ route('barang.destroy', ['barang' => $barang->id]) }}" method="POST" data-name="{{ $barang->nama_barang.' '.$barang->tanggal_produksi }}">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-dark btn-sm me-2 btn-delete" >
                <i class="bi-trash"></i>
            </button>
        </form>
    </div>
</div>
