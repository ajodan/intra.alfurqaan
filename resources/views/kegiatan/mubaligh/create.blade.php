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
                <input type="text" class="form-control @error('nm_lengkap') is-invalid @enderror" name="nm_lengkap" id="nm_lengkap" placeholder="Nama Lengkap Mubaligh" autofocus value="{{ old('nm_lengkap') }}">
                @error('nm_lengkap')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror          
            </div>
            <div class="form-group">
                <label for="jenis_kelamin" class="">Jenis Kelamin</label>
                <div class="">
                    <select id="jk" name="jk" class="form-control @error('jk') is-invalid @enderror" value="{{ old('jk') }}">
                        <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="hp">Nomor Ponsel</label>
                <input type="text" class="form-control @error('hp') is-invalid @enderror" name="hp" id="hp" placeholder="Nomor Ponsel"  value="{{ old('hp') }}">
                @error('hp')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror          
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control @error('hp') is-invalid @enderror" name="email" id="email" placeholder="Alamat Email" value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror          
                <div class="form-group">
                    <label for="hp">Alamat Rumah</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Alamat Rumah" value="{{ old('alamat') }}">
                    @error('alamat')
                    <div class="invalid-feedback">
                        <p class="text-danger">{{ $message }}</p>
                    </div>    
                    @enderror          
                </div>
                <div class="form-group">
                    <label for="name">Gambar <span class="required"></span></label>
                    <img class="img-preview img-fluid mb-3 com-sm-5">
                    <div class="form-group">
                        <input type="file" name="photo" id="photo" onchange="previewImage()">
                    </div>
                </div> 
                <div class="form-group">
                    <label for="keterangan">Profil Mubaligh/Ustadz</label>
                    <div class="form-group">
                        <input id="profil" type="hidden" name="profil" rows="20" cols="130" value="{{ old('profil') }}">
                        <trix-editor input="profil" class="form-control"></trix-editor>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label for="peranmubaligh_id" class="">Peran Mubaligh/Ustadz</label>
                <div class="">
                    <select id="peranmubaligh_id" name="peranmubaligh_id" class="form-control">
                        @foreach ($peranmubalighs as $peran)
                            @if(old('peranmubaligh_id') == $peran->id)
                            <option value="{{ $peran->id }}" selected>{{ $peran->nm_peran }}</option>
                            @else
                            <option value="{{ $peran->id }}">{{ $peran ->nm_peran }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('mubaligh.index') }}" class="btn btn-danger btn-sm">Kembali</a>
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