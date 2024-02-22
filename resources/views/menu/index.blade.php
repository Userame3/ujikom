@extends('templates.layout')

@push('style')
@endpush

@section('content')
@include('menu.modal')

<div class="x_content">
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h1 class="text-muted font-40 m-b-50">
                    menu
                </h1>
                <div class="alert alert-success alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Berhasil!</strong>
                </div>
                <div class="x_content">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formInputmenu"><i class="fa fa-plus-square"></i> Tambah menu</button>

                    <button type="button" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Import</button>

                    <button type="button" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export</button>
                </div>
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
                                    <form action="menu/{{ $m->id}}" method="post" style="display :inline">
                                    <!-- <form action="{{ route('menu.destroy', $item->id) }}" method="POST" class="d-inline form-delete" style="display:inline;"> -->
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
                @endsection
                @push('script')
                <script>
                    function previewImage() {
                        const image = document.querySelector('#image');
                        const imgPreview = document.querySelector('.img-preview');

                        imgPreview.style.display = 'block';

                        const oFReader = new FileReader();
                        oFReader.readAsDataURL(image.files[0]);

                        oFReader.onload = function(oFREvent) {
                            imgPreview.src = oFREvent.target.result;
                        }
                    }
                </script>
                @endpush