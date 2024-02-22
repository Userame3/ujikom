<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Id</th>
                <th>Nama menu</th>
                <th>Harga</th>
                <th>Image</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menu as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->jenis_id }}</td>
                <td>{{ $item->nama_menu }}</td>
                <td>{{ $item->harga }}</td>
                <td>{{ $item->image }}</td>
                <td>{{ $item->deskripsi }}</td>

                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formInputmenu" data-mode="edit" data-id="{{ $item->id }}" data-nama_menu="{{ $item->nama_menu }}">
                        <i class='fa fa-edit'></i> Edit
                    </button>
                    <form action="{{ route('menu.destroy', $item->id) }}" method="POST" class="d-inline form-delete" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-data" data-id="{{ $item->id }}" data-nama_menu="{{ $item->nama_menu }}">
                            <i class='fa fa-trash'></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    // $(function() {
    //     $('#tbl-produk').DataTable()

    //     //dialog hapus data
    //     $('.btn-delete').on('click', function(e) {
    //         let nama_produk = $(this).closest('tr').find('')
    //     })
    // // })
</script>