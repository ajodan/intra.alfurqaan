@extends('layouts.backend.app',[
'title' => 'Tambah Jenis Kegiatan',
'contentTitle' => 'Tambah Jenis Kegiatan',
])

@section('content')
@include('layouts.components.alert-dismissible')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('jeniskegiatan.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="id">ID</label>
                <input required class="form-control" type="" name="id" id="id" value="{{$max}}" placeholder="">
            </div>
            <div class="form-group">
                <label for="nm_jenis_kegiatan">Nama Jenis Kegiatan</label>
                <input required class="form-control @error('nm_jenis_kegiatan') is-invalid @enderror" type="text" name="nm_jenis_kegiatan" id="nm_jenis_transaksi" placeholder="Nama Jenis Transaksi">
                @error('nm_jenis_kegiatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('jeniskegiatan.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>

        </form>
    </div>
</div>
@stop