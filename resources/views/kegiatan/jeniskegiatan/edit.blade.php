@extends('layouts.backend.app',[
'title' => 'Ubah Jenis Kegiatan',
'contentTitle' => 'Ubah Jenis Kegiatan',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
        <form action="{{ route('jeniskegiatan.update',$jeniskegiatan->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="nm_jenis_kegiatan">Nama Jenis Kegiatan</label>
                <input value="{{ $jeniskegiatan->nm_jenis_kegiatan }}" required class="form-control" type="" name="nm_jenis_kegiatan" id="nm_jenis_kegiatan" placeholder="Nama Jenis Kegiatan">
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('jeniskegiatan.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </form>
    </div>
</div>
@stop