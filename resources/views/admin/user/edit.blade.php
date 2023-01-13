@extends('layouts.backend.app',[
'title' => 'Ubah Pengguna',
'contentTitle' => 'Ubah Pengguna',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin.user.update',$user->id_users) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                <input value="{{ $user->name }}" required class="form-control" type="text" name="name" id="name" placeholder="contoh : Nama Lengkap">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input value="{{ $user->username }}" required class="form-control" type="text" name="username" id="username" placeholder="contoh : namapendek">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input value="{{ $user->email }}" required class="form-control" type="email" name="email" id="email" placeholder="">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="hidden" name="old_password" value="{{ $user->password }}" class="form-control">
                <input class="form-control" type="password" name="password" id="password" placeholder="">
                <small>Kosongkan jika tidak ingin mengubah password</small>
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <select required class="form-control" name="level" id="level">
                    <option value="" disabled selected>-- Pilih Level --</option>
                    <option value="admin" {{ $user->level == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="ketua" {{ $user->level == 'ketua' ? 'selected' : '' }}>Ketua</option>
                    <option value="bmm" {{ $user->level == 'bmm' ? 'selected' : '' }}>BMM</option>
                    <option value="bendahara" {{ $user->level == 'bendahara' ? 'selected' : '' }}>Bendahara</option>
                    <option value="pengurus {{ $user->level == 'pengurus' ? 'selected' : '' }}">Pengurus</option>
                    <option value="jamaah" {{ $user->level == 'jamaah' ? 'selected' : '' }}>Jamaah</option>
                </select>
            </div>
            <div class="form-group">
                <label for="is_active">Status</label>
                <select required class="form-control" name="is_active" id="is_active">
                    <option disabled selected>-- Pilih Status --</option>
                    <option value="1" {{ $user->is_active == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ $user->is_active == '0' ? 'selected' : '' }}>Non Aktif</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">SIMPAN</button>
                <a href="{{ route('admin.user.index') }}" class="btn btn-danger btn-sm">KEMBALI</a>
            </div>
        </form>
    </div>
</div>
@stop