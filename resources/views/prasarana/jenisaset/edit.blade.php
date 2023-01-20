@extends('layouts.backend.app',[
'title' => 'Ubah Jenis Aset/Inventaris',
'contentTitle' => 'Ubah Jenis Aset/Inventaris',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
        <form action="{{ route('jenisaset.update',$jenisaset->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="nm_jenis_aset">Nama Jenis Aset/Inventaris</label>
                <input value="{{ $jenisaset->nm_jenis_aset }}" required class="form-control" type="" name="nm_jenis_aset" id="nm_jenis_aset" value="{{ old($jenisaset->nm_jenis_aset) }}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan Perubahan</button>
                <a href="{{ route('jenisaset.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </form>
    </div>
</div>
@stop