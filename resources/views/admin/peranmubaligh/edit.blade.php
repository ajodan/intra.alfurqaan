@extends('layouts.backend.app',[
'title' => 'Ubah Peran Mubaligh',
'contentTitle' => 'Ubah Peran Mubaligh',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
        <form action="{{ route('admin.peranmubaligh.update',$peranmubaligh->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="nm_peran">Nama Peran</label>
                <input value="{{ $peranmubaligh->nm_peran }}" required class="form-control" type="" name="nm_peran" id="nm_peran" placeholder="">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan Perubahan</button>
                <a href="{{ route('admin.peranmubaligh.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </form>
    </div>
</div>
@stop