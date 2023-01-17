@extends('layouts.backend.app',[
'title' => 'Tambah Pengguna',
'contentTitle' => 'Tambah Pengguna',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">

    <div class="card-body">
        <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Nama Lengkap" autofocus value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror   
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" id="username" placeholder="Username Harus Huruf kecil" value="{{ old('username') }}">
                @error('username')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>  
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="">
                @error('email')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="">
                @error('password')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="level">Level Akses</label>
                <!-- <select required="" class="form-control" name="level" id="level">
                    <option value="" disabled selected>-- PILIH LEVEL --</option>
                    <option value="admin">Admin</option>
                    <option value="ketua">Ketua</option>
                    <option value="bendahara">Bendahara</option>
                    <option value="bmm">Baitul Maal</option>
                    <option value="pengurus">Pengurus</option>
                    <option value="jamaah">Jamaah</option>
                </select> -->
                <div class="form-group">

                    <select required="" name="level" id="level" class="form-control" @error('password') is-invalid @enderror">
                        <option disabled="" selected="">- Pilih Level -</option>
                        @foreach($level as $lev)
                        <option value="{{ $lev->level }}">{{ $lev->level." (".$lev->deskripsi.")" }}</option>
                        @endforeach
                    </select>
                    @error('level')
                    <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                    </div>
                @enderror
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('admin.user.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>

        </form>
    </div>
</div>
@stop