@extends('layouts.backend.app',[
'title' => 'Saldo',
'contentTitle' => 'Saldo',
])

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

@include('layouts.components.alert-dismissible')

<div class="row">
  <div class="col-lg-12">
    @if($histori_saldo->count() > 0)
    <div class="card">
      <div class="card-header">Daftar Saldo Akhir Jamaah</div>
      <div class="card-body table-responsive">
        <table id="dataTable1" class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Jamaah</th>
              <th>No Rekening</th>
              <th>Kode Jamaah</th>
              <th>Saldo Akhir</th>
            </tr>
          </thead>
          <tbody>
            @php
            $no=1;
            @endphp
            @foreach($histori_saldo as $histori)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $histori->nm_jamaah }}</td>
              <td>{{ $histori->no_rekening }}</td>
              <td>{{ $histori->kd_jamaah }}</td>
              <td><b>Rp. @toRupiah($histori->saldo)</b></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @endif
</div>

</div>
@stop

@push('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins') }}/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('plugins') }}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
"
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