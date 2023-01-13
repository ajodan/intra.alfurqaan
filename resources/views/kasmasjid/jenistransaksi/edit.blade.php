@extends('layouts.backend.app',[
'title' => 'Ubah Jenis Transaksi',
'contentTitle' => 'Ubah Jenis Transaksi',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
        <form action="{{ route('jenistransaksi.update',$jenistransaksi->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="nm_jenis_transaksi">Nama Jenis Transaksi</label>
                <input value="{{ $jenistransaksi->nm_jenis_transaksi }}" required class="form-control" type="" name="nm_jenis_transaksi" id="nm_jabatan" placeholder="">
            </div>
            <div class="form-group">
                <label for="tipe_transaksi">Tipe Transaksi</label>
                <input value="{{ $jenistransaksi->tipe_transaksi }}" required class="form-control" type="" name="tipe_transaksi" id="tipe_transaksi" placeholder="">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan Perubahan</button>
                <a href="{{ route('jenistransaksi.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </form>
    </div>
</div>
@stop