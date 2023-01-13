@extends('layouts.backend.app',[
'title' => 'Kas Masuk',
'contentTitle' => 'Kas Masuk',
])

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

@include('layouts.components.alert-dismissible')

<div class="row">

	<div class="col-lg-4">
		<div class="card">
			<div class="card-header">Input Kas Masuk</div>
			<div class="card-body">
				<form method="POST" action="{{ route('masuk.store') }}">
					@csrf
					<div class="form-group">
						<label for="jenismasuk_id">Jenis Pemasukan</label>
						<select required="" name="jenistransaksi_id" id="jenistransaksi_id" class="form-control">
							<option disabled="" selected="">- Pilih Jenis Pemasukan -</option>
							@foreach($jenistransaksi as $nsb)
							<option value="{{ $nsb->id }}">{{ "$nsb->nm_jenis_transaksi" }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="waktu">Tanggal</label>
						<input required="" type="date" name="waktu" id="waktu" class="form-control">
					</div>

					<div class="form-group">
						<label for="nominal">Nominal Masuk</label>
						<input required="" type="number" placeholder="Nominal" name="nominal_masuk" id="nominal_masuk" class="form-control">
						<input type="hidden" placeholder="Nominal" name="nominal_keluar" id="nominal_keluar" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
						<button type="button" class="btn btn-sm btn-primary" onclick="history.back(-1)">Kembali</button>

					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="col-lg-8">
		@if($histori_masuk->count() > 0)
		<div class="card">
			<div class="card-header">Riwayat Transaksi Masuk</div>
			<div class="card-body table-responsive">
				<table id="dataTable1" class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Jenis Pemasukan</th>
							<th scope="col">Tanggal</th>
							<th scope="col">Nominal Masuk</th>

						</tr>
					</thead>
					<?php
					//echo $histori_masuk;
					?>
					<tbody>
						@foreach($histori_masuk as $histori)
						<tr>
							<th scope="row">{{ $loop->iteration }}</th>
							<td>{{ $histori->nm_jenis_transaksi }}</td>
							<td>
								{{ \Carbon\Carbon::parse($histori->waktu)->format('d-m-Y') }}
							</td>
							<td>{{ "Rp" }} @toRupiah($histori->nominal_masuk)</td>

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