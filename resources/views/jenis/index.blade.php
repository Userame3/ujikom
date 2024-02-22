@extends('templates.layout')

@push('style')
@endpush

@section('content')
@include('jenis.modal')

<div class="x_content">
  <div class="row">
    <div class="col-sm-12">
      <div class="card-box table-responsive">
        <h1 class="text-muted font-40 m-b-50">
          Jenis
        </h1>
        <div class="alert alert-success alert-dismissible " role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <strong>Berhasil!</strong>
        </div>
        <div class="x_content">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formInputJenis"><i class="fa fa-plus-square"></i> Tambah Jenis</button>

          <button type="button" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Import</button>

          <button type="button" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export</button>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Name Jenis</th>
                <th>Action</th>
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
        </script>
        @endsection

        @push('script')
        @endpush