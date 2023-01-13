@extends('layouts.backend.app',[
'title' => 'Tambah Pengurus',
'contentTitle' => 'Tambah Pengurus',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
        <form action="{{ route('admin.pengurus.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input required class="form-control" type="" name="username" id="username" placeholder="Username Harus Huruf kecil">
            </div>
            <div class="form-group">
                <label for="nm_pengurus">Nama Pengurus</label>
                <input required class="form-control" type="" name="nm_pengurus" id="nm_pengurus" placeholder="">
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
                <label>Jabatan</label>
                {!! Form::select('id_jabatan', $jabatan, '', ['class' => 'form-control','enctype'=>'multipart/form-data']) !!}
                @if($errors->has('id_jabatan'))
                <div class="text-danger">
                    {{ $errors->first('id_jabatan')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="no_hp">No Hp</label>
                <input required class="form-control" type="number" name="no_hp" id="no_hp" placeholder="">
            </div>
            <!-- <div class="form-group">
                <label for="id_jabatan">Jabatan </label>
                <input type="id_jabatan" required class="form-control" name="id_jabatan" id="id_jabatan" placeholder="">
            </div> -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" required class="form-control" name="email" id="email" placeholder="">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Rumah</label>
                <input required class="form-control" type="" name="alamat" id="alamat" placeholder="">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">SIMPAN</button>
                <a href="{{ route('admin.pengurus.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </form>
    </div>
</div>
@stop