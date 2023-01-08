@extends('layouts.backend.app',[
'title' => 'Ubah Level',
'contentTitle' => 'Ubah Level',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin.level.update',$level->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="level">Level</label>
                <input value="{{ $level->level }}" required class="form-control" type="" name="level" id="level" placeholder="">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input value="{{ $level->deskripsi }}" required class="form-control" type="" name="deskripsi" id="deskripsi" placeholder="">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">SIMPAN PERUBAHAN</button>
                <a href="{{ route('admin.level.index') }}" class="btn btn-danger btn-sm">KEMBALI</a>
            </div>
        </form>
    </div>
</div>
@stop