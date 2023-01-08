@extends('layouts.backend.app',[
'title' => 'Ubah Jabatan',
'contentTitle' => 'Ubah Jabatan',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
        <form action="{{ route('admin.jabatan.update',$jabatan->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="nm_jabatan">Nama Jabatan</label>
                <input value="{{ $jabatan->nm_jabatan }}" required class="form-control" type="" name="nm_jabatan" id="nm_jabatan" placeholder="">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan Perubahan</button>
                <a href="{{ route('admin.jabatan.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </form>
    </div>
</div>
@stop