<div class="modal fade" id="formInputmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="jenis_id" class="col-sm-4 col-form-label">Jenis</label>
                        <select class="form-control col-sm-8" name="jenis_id" id="jenis_id">
                            @foreach ($jenis as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_jenis  }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="method"></div>
                    <div class="form-group row">
                        <label for="nama_menu" class="col-sm-4 col-form-label">Nama menu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_menu" id="nama_menu">
                        </div>
                    </div>
                    <div id="method"></div>
                    <div class="form-group row">
                        <label for="nama_menu" class="col-sm-4 col-form-label">Harga</label>
                        <div class="col-sm-8">
                            <input type="double" class="form-control" name="harga" id="harga">
                        </div>
                    </div>

                    <div id="method"></div>
                    <input type="hidden" name="old_image" id="old_image">
                    <img class="img-preview img-fluid" style="max-height: 200px">
                    <div class="input-group input-group-outline my-3">
                        <input type="file" name="image" id="image" class="form-control" onchange="previewImage()">
                    </div>

                    <!-- <div class="btn-group">
                        <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                        <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" name="image" id="image">
                    </div> -->

                    <div id="method"></div>
                    <div class="form-group row">
                        <label for="nama_menu" class="col-sm-4 col-form-label"> Deskripsi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
</script>
<script>
    console.log('menu')
    $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        }) <

        $('.delete-data').on('click', function(e) {
            e.preventDefault()
            let nama_menu = $(this).closest('tr').find('td:eq(1)').text()
            Swal.fire({
                title: `Apakah data ${nama_menu} akan dihapus ?`,
                text: 'Data tidak bisa dikembalikan!',
                icon: 'error',
                showDenyButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: 'd33',
                confirmButtonText: 'Ya, hapus data ini!'
            }).then((result) => {
                if(result.isConfirmed) 
                    $(e.target).closest('form').submit()
                    else  swal.close()
                
            })
        });

    $('#formInputmenu').on('show.bs.modal', function(e) {
        console.log('modal')
        const btn = $(e.relatedTarget)
        const mode = btn.data('mode')
        const jenis_id = btn.data('jenis_id')
        const nama_menu = btn.data('nama_menu')
        const harga = btn.data('harga')
        const image = btn.data('image')
        const deskripsi = btn.data('deskripsi')
        const id = btn.data('id')
        const modal = $(this)
        if (mode === 'edit') {
            modal.find('.modal-title').text('Edit menu')
            modal.find('#jenis_id').val(jenis_id)
            modal.find('#nama_menu').val(nama_menu)
            modal.find('#harga').val(harga)
            modal.find('#image').val(image)
            modal.find('#deskripsi').val(deskripsi)
            modal.find('.img-preview').attr('src', '{{ asset("storage/menu-image")}}/' + image)
            modal.find('.modal-body form').attr('action', '{{ url("menu") }}/' + id)
            modal.find('#method').html('@method("PATCH")')
        } else {
            modal.find('.modal-title').text('Input menu')
            modal.find('#jenis_id').val('')
            modal.find('#nama_menu').val('')
            modal.find('#harga').val('')
            modal.find('#image').val('')
            modal.find('#deskripsi').val('')
            modal.find('.img-preview').attr('src', '')
            modal.find('#method').html('')
            modal.find('.modal-body form').attr('action', '{{ url("menu") }}')
        }
    })
</script>
@endpush