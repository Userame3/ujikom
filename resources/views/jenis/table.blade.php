<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenis as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_jenis }}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formInputJenis" data-mode="edit" data-id="{{ $item->id }}" data-nama_jenis="{{ $item->nama_jenis }}">
                        <i class='fa fa-edit'></i> Edit
                    </button>
                    <form action="{{ route('jenis.destroy', $item->id) }}" method="POST" class="d-inline form-delete" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-data" data-id="{{ $item->id }}" data-nama_jenis="{{ $item->nama_jenis }}">
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