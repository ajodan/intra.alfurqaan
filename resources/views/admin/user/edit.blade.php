@extends('layouts.backend.app',[
'title' => 'Ubah Pengguna',
'contentTitle' => 'Ubah Pengguna',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin.user.update',$user->id_users) }}" method="post" enctype="multipart/form-data">
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
                <small color="red">Kosongkan jika tidak ingin mengubah password</small>
            </div>
            <div class="form-group">
                <label for="level" class="">Level</label>
                <div class="">
                    <select id="level" name="level" class="form-control">
                        @foreach ($level as $lev)
                        @if(old('level', $user->level) == $lev->level)
                        <option value="{{ $lev->level }}" selected>{{ $lev->level }}</option>
                        @else
                        <option value="{{ $lev->level }}">{{ $lev->level }}</option>
                        @endif
                       
                        @endforeach
                    </select>
                </div>
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
                <label for="name">Photo <span class="required"></span></label>
                <input type="hidden" name="oldPhoto" value="{{ $user->photo }}">
                @if($user->photo)
                <img src="{{ asset('storage/' . $user->photo) }}" class="img-preview img-fluid mb-3 com-sm-5 d-block">
                @else
                <img src="{{ asset('img/no-image.jpg') }}" class="img-preview img-fluid mb-3 com-sm-5 d-block">
                @endif
               
                <div class="form-group">
                    <input type="file" name="photo" id="photo" onchange="previewImage()" class="form-control" @error('photo') is-invalid @enderror>
                    @error('photo')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">SIMPAN</button>
                <a href="{{ route('admin.user.index') }}" class="btn btn-danger btn-sm">KEMBALI</a>
            </div>
        </form>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
<script>
    function previewImage(){
        const image = document.querySelector('#photo');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(photo.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
    
    

</script>
@stop