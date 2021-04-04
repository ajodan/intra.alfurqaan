@extends('layouts.backend.app',[
    'title' => 'Tambah Nasabah',
    'contentTitle' => 'Tambah Nasabah',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('admin.nasabah.index') }}" class="btn btn-danger btn-sm">Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.nasabah.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input required class="form-control" type="" name="username" id="username" placeholder="Username Harus Huruf kecil">
                @error('username')
                    {{ 'Username is unique' }}
                @enderror
            </div>
            <div class="form-group">
                <label for="nm_nasabah">Nama Nasabah</label>
                <input required class="form-control" type="" name="nm_nasabah" id="nm_nasabah" placeholder="">
            </div>
            <div class="form-group">
                <label for="no_hp">No Hp</label>
                <input required class="form-control" type="number" name="no_hp" id="no_hp" placeholder="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input required class="form-control" type="email" name="email" id="email" placeholder="">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input required class="form-control" type="" name="alamat" id="alamat" placeholder="">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">SIMPAN</button>
            </div>
        </form>
    </div>
</div>
@stop