@extends('layouts.backend.app',[
'title' => 'Tambah Level',
'contentTitle' => 'Tambah Level',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin.level.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="id">ID</label>
                <input required class="form-control" type="" name="id" id="id" value="{{$maxId}}" placeholder="">
            </div>
            <div class="form-group">
                <label for="level">Level Akses</label>
                <input required class="form-control" type="" name="level" id="level" placeholder="">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input required class="form-control" type="" name="deskripsi" id="deskripsi" placeholder="">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">SIMPAN</button>
                <a href="{{ route('admin.level.index') }}" class="btn btn-danger btn-sm">KEMBALI</a>
            </div>
        </form>
    </div>
</div>
@stop