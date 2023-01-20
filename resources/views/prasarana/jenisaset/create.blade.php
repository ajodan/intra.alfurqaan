@extends('layouts.backend.app',[
'title' => 'Tambah Jenis Aset/Inventaris',
'contentTitle' => 'Tambah Jenis Aset/Inventaris',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('jenisaset.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="id">ID</label>
                <input required class="form-control" type="" name="id" id="id" value="{{$max}}" placeholder="">
            </div>
            <div class="form-group">
                <label for="nm_jenis_aset">Nama Jenis Aset/Inventaris</label>
                <input required class="form-control @error('nm_jenis_aset') is-invalid @enderror" type="text" name="nm_jenis_aset" id="nm_jenis_aset" placeholder="Nama Jenis Aset" autofocus value="{{ old('nm_jenis_aset') }}">
                @error('nm_jenis_aset')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('jenisaset.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>

        </form>
    </div>
</div>
@stop