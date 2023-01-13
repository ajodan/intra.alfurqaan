@extends('layouts.backend.app',[
'title' => 'Kasbmm',
'contentTitle' => 'Kas Baitul Maal Masjid',
])

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<x-alert></x-alert>

<div class="row">
	<div class="col-lg-4">

		<div class="card">
			<div class="card-header bg-dark text-light">Pilih Jenis Transaksi</div>
			<div class="card-body">

				<div class="col-lg">
					<div class="card">
						<div class="card-body">
							<div class="row ml-2">
								<i class="fas fa-fw fa-money-bill fa-3x"> </i>
								<h4 class="ml-4 mt-2"><a href="{{ route('masukbmm.index') }}"> Pemasukan</a></h4>
							</div>

						</div>

					</div>
				</div>


				<div class="col-lg">
					<div class="card">
						<div class="card-body">
							<div class="row ml-2">
								<i class="fas fa-fw fa-wallet fa-3x"> </i>
								<h4 class="ml-4 mt-2"><a href="{{ route('keluar.index') }}"> Pengeluaran</a></h4>
							</div>

						</div>

					</div>
				</div>

				<div class="col-lg">
					<div class="card">
						<div class="card-body">
							<div class="row ml-2">
								<i class="fas fa-fw fa-money-bill fa-3x"> </i>
								<h4 class="ml-4 mt-2"><a href="{{ route('saldokas.index') }}"> Saldo Kas</a></h4>
							</div>

						</div>

					</div>
				</div>


			</div>
		</div>

	</div>

	<div class="col-lg-8">
		@if($histori_transaksi->count() > 0)
		<div class="card">
			<div class="card-header">
				Riwayat Transaksi Baitul Maal Masjid
			</div>
			<div class="card-body table-responsive">
				<table id="dataTable1" class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Tanggal</th>
							<th scope="col">Jenis Transaksi</th>
							<th scope="col">Pemasukan</th>
							<th scope="col">Pengeluaran</th>

						</tr>
					</thead>
					<tbody>
						@foreach($histori_transaksi as $histori)
						<tr>
							<th scope="row">{{ $loop->iteration }}</th>
							<td>{{ \Carbon\Carbon::parse($histori->waktu)->format('d-m-Y') }}</td>
							<td>{{ $histori->nm_jenis_transaksi }}</td>
							<td align='right'>@toRupiah($histori->nominal_masuk)</td>
							<td align='right'>@toRupiah($histori->nominal_keluar)</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<a href="javascript:void(0)" data-toggle="modal" data-target="#Laporan" class="btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i> Cetak PDF</a>
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
				<form method="POST" action="{{ route('kasbmm.generate-pdf') }}">
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