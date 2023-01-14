@extends('layouts.backend.app',[
'title' => 'Saldo Kas',
'contentTitle' => 'Saldo Kas',
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
      <div class="card-header">Daftar Saldo Kas Masjid</div>
      <div class="card-body table-responsive">
        <table id="dataTable1" class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Jenis Transaksi</th>
              <th>Tanggal</th>
              <th>Pemasukan</th>
              <th>Pengeluaran</th>
              <th>Saldo Akhir</th>
            </tr>
          </thead>
          <tbody>
            @php
            $no=1;
            $saldo = 0;
            @endphp
            @foreach($histori_saldo as $histori)
            @php
            $saldo = $saldo + ($histori->nominal_masuk - $histori->nominal_keluar);
            @endphp
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $histori->nm_jenis_transaksi }}</td>
              <td>
                {{ \Carbon\Carbon::parse($histori->waktu)->format('d-m-Y') }}
              </td>
              <td align='right'>@toRupiah($histori->nominal_masuk)</td>
              <td align='right'>@toRupiah($histori->nominal_keluar)</td>
              <td align='right'><b>Rp. @toRupiah($saldo)</b></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="card-header">
          <h3>
            <b>Saldo Akhir : Rp. @toRupiah($saldo)</b>
          </h3>
        </div>
      </div>
      <div class="card-footer">
        <a href="javascript:void(0)" data-toggle="modal" data-target="#Laporan" class="btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i> Cetak PDF</a>
      </div>
    </div>
  </div>
  @endif
</div>

</div>

<!-- LaporanModal -->
<div class="modal fade" id="Laporan" tabindex="-1" role="dialog" aria-labelledby="LaporanLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LaporanLabel">Pilih Tanggal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('saldokas.saldokas-pdf') }}">
          @csrf
          <div class="form-group">
            <label for="tgl_mulai">Dari Tanggal</label>
            <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control">
          </div>
          <div class="form-group">
            <label for="tgl_selesai">Sampai Tanggal</label>
            <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Cetak</button>
        </form>
      </div>
    </div>
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