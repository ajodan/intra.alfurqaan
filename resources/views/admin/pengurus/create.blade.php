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
                <label for="id_jabatan" class="">Jabatan</label>
                <div class="">
                    <select id="id_jabatan" name="id_jabatan" class="form-control">
                        @foreach ($jabatan as $jab)
                            @if(old('id_jabatan') == $jab->id)
                            <option value="{{ $jab->id }}" selected>{{ $jab->nm_jabatan }}</option>
                            @else
                            <option value="{{ $jab->id }}">{{ $jab->nm_jabatan }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="no_hp">No Ponsel</label>
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