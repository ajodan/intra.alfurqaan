@extends('layouts.backend.app',[
'title' => 'Daftar Kegiatan Masjid',
'contentTitle' => 'Daftar Kegiatan Masjid',
])

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

@include('layouts.components.alert-dismissible')

<!-- DataTables -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <a href="{{ route('kegiatan.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus-square"></i> Tambah Data</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped" id="dataTable1">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Jenis Kegiatan</th>
            <!-- <th>Nama Kegiatan</th> -->
            <th>Mubaligh/Ustadz</th>

            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php
          $no=1;
          @endphp
          @foreach($kegiatans as $kegiatan)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ \Carbon\Carbon::parse($kegiatan->tgl)->format('d-m-Y') }}</td>
            <td>{{ $kegiatan->nm_jenis_kegiatan }}</td>
            <!-- <td>{{ $kegiatan->nm_kegiatan }}</td> -->
            <td>{{ $kegiatan->nm_lengkap }}</td>

            <td>
              <div class="row ml-3">
                <a href="{{ route('kegiatan.edit',$kegiatan->id) }}" class="btn btn-primary btn-sm">Ubah</a>
                <form method="POST" action="{{ route('kegiatan.destroy',$kegiatan->id) }}">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm ml-2" onclick="return confirm('Yakin hapus ?')" type="submit">Hapus</button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal For Input File Import Excel -->
<div class="modal fade" id="exportExcelModal" tabindex="-1" role="dialog" aria-labelledby="exportExcelModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exportExcelModalLabel">Import Excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.excel.import-excel-user') }}">
          @csrf
          <div class="form-group">
            <label for="customFile">Pilih File Excel</label>
            <div class="custom-file">
              <input type="file" name="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Import</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal For Input File Import Excel -->
@stop

@push('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins') }}/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('plugins') }}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<script>
  $(function() {
    $("#dataTable1").DataTable();

    $('#dataTable2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush