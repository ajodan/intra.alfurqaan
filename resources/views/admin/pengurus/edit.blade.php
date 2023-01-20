@extends('layouts.backend.app',[
'title' => 'Ubah Pengurus',
'contentTitle' => 'Ubah Pengurus',
])

@section('content')
<!-- DataTables -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin.pengurus.update',$pengurus->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="nm_pengurus">Nama Pengurus</label>
                <input value="{{ $pengurus->nm_pengurus }}" required class="form-control" type="" name="nm_pengurus" id="nm_pengurus" placeholder="">
            </div>
            <div class="form-group">
                <label for="no_hp">No Hp</label>
                <input value="{{ $pengurus->nm_pengurus }}" required class="form-control" type="number" name="nm_pengurus" id="nm_pengurus" placeholder="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input value="{{ $pengurus->email }}" required class="form-control" type="email" name="email" id="email" placeholder="">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input value="{{ $pengurus->alamat }}" required class="form-control" type="" name="alamat" id="alamat" placeholder="">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan Pembaharuan</button>
                <a href="{{ route('admin.pengurus.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </form>
    </div>
</div>
@stop