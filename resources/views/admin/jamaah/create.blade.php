@extends('layouts.backend.app',[
'title' => 'Tambah Jamaah',
'contentTitle' => 'Tambah Jamaah',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">

    <div class="card-body">
        <form action="{{ route('admin.jamaah.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input required class="form-control" type="" name="username" id="username" placeholder="Username Harus Huruf kecil">
                @error('username')
                <font color="red">{{ 'Username sudah ada..!!' }}</font>
                @enderror
            </div>
            <div class="form-group">
                <label for="nm_jamaah">Nama Jamaah</label>
                <input required class="form-control" type="" name="nm_jamaah" id="nm_jamaah" placeholder="">
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select required="" class="form-control" name="jk" id="jk">
                    <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="no_hp">No Ponsel</label>
                <input required class="form-control" type="number" name="no_hp" id="no_hp" placeholder="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input required class="form-control" type="email" name="email" id="email" placeholder="">
                @error('email')
                <font color="red">{{ 'Email sudah ada..!!' }}</font>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input required class="form-control" type="" name="alamat" id="alamat" placeholder="">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('admin.jamaah.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </form>
    </div>
</div>
@stop