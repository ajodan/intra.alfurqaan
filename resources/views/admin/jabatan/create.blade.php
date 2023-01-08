@extends('layouts.backend.app',[
'title' => 'Tambah Jabatan',
'contentTitle' => 'Tambah Jabatan',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin.jabatan.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="id">ID</label>
                <input required class="form-control" type="" name="id" id="id" value="{{$max}}" placeholder="">
            </div>
            <div class="form-group">
                <label for="nm_jabatan">Nama Jabatan</label>
                <input required class="form-control @error('nm_jabatan') is-invalid @enderror" type="text" name="nm_jabatan" id="nm_jabatan" placeholder="Nama Jabatan">
                @error('nm_jabatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('admin.jabatan.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>

        </form>
    </div>
</div>
@stop