@extends('layouts.backend.app',[
'title' => 'Tambah Mubaligh',
'contentTitle' => 'Tambah Mubaligh',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">

    <div class="card-body">
        <form action="{{ route('mubaligh.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nm_lengkap">Nama Lengkap</label>
                <input required class="form-control" type="" name="nm_lengkap" id="nm_lengkap" placeholder="Nama Lengkap">
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
                <input required class="form-control" type="" name="hp" id="hp" placeholder="Nomor Ponsel">
                @error('email')
                <font color="red">{{ 'Email sudah ada..!!' }}</font>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input required class="form-control" type="email" name="email" id="email" placeholder="Email">
                @error('email')
                <font color="red">{{ 'Email sudah ada..!!' }}</font>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input required class="form-control" type="" name="alamat" id="alamat" placeholder="Alamat Lengkap">
            </div>
            <div class="form-group">
                <label for="name">Photo <span class="required"></span></label>
                <div class="form-group">
                    <input type='file' name='photo' class="form-control">
                    @if ($errors->has('photo'))
                    <span class="errormsg text-danger">{{ $errors->first('photo') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group">
            <label for="profil">Profil Mubaligh/Ustadz</label>
            <div class="form-group">
                <textarea name="profil" id="profil" rows="20" cols="130"></textarea>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('profil');
                </script>
                </div>
            </div>
            <div class="form-group">
                <label>Peran Sebagai</label>
                {!! Form::select('peranmubaligh_id', $peranmubaligh, '', ['class' => 'form-control','enctype'=>'multipart/form-data']) !!}
                @if($errors->has('peranmubaligh_id'))
                <div class="text-danger">
                    {{ $errors->first('peranmubaligh_id')}}
                </div>
                @endif
            </div>


            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('mubaligh.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </form>
    </div>
</div>
@stop