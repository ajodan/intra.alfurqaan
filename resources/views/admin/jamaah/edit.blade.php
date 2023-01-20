@extends('layouts.backend.app',[
'title' => 'Ubah Jamaah',
'contentTitle' => 'Ubah Jamaah',
])

@section('content')
<!-- DataTables -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin.jamaah.update',$jamaah->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="nm_jamaah">Nama Jamaah</label>
                <input value="{{ $jamaah->nm_jamaah }}" required class="form-control" type="" name="nm_jamaah" id="nm_jamaah" placeholder="">
            </div>
            <div class="form-group">
                <label for="no_hp">No Hp</label>
                <input value="{{ $jamaah->no_hp }}" required class="form-control" type="number" name="no_hp" id="no_hp" placeholder="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input value="{{ $jamaah->email }}" required class="form-control" type="email" name="email" id="email" placeholder="">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input value="{{ $jamaah->alamat }}" required class="form-control" type="" name="alamat" id="alamat" placeholder="">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan Pembaharuan</button>
                <a href="{{ route('admin.jamaah.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </form>
    </div>
</div>
@stop