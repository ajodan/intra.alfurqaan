@extends('layouts.backend.app',[
'title' => 'Tambah Jenis Transaksi',
'contentTitle' => 'Tambah Jenis Transaksi',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('jenistransaksi.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="id">ID</label>
                <input required class="form-control" type="" name="id" id="id" value="{{$max}}" placeholder="">
            </div>
            <div class="form-group">
                <label for="nm_jenis_transaksi">Nama Jenis Transaksi</label>
                <input required class="form-control @error('nm_jenis_transaksi') is-invalid @enderror" type="text" name="nm_jenis_transaksi" id="nm_jenis_transaksi" placeholder="Nama Jenis Transaksi">
                @error('nm_jenis_transaksi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tipe_transaksi">Tipe Transaksi</label>
                <select required="" class="form-control" name="tipe_transaksi" id="tipe_transaksi">
                    <option value="" disabled selected>-- Pilih Tipe Transaksi --</option>
                    <option value="masuk">Pemasukan</option>
                    <option value="keluar">Pengeluaran</option>
                </select>
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('jenistransaksi.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>

        </form>
    </div>
</div>
@stop