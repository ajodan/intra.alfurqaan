@extends('layouts.backend.app',[
'title' => 'Ubah Mubaligh',
'contentTitle' => 'Ubah Mubaligh',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    @foreach ($mubaligh as $ust)
    <form method="POST" action="{{ route('mubaligh.update', ['mubaligh' => $ust->id]) }}" enctype="multipart/form-data">
    
        @csrf
        @method('PATCH')
        <div class=" card-body">

            <div class="form-group">
                <label for="nm_lengkap">Nama Lengkap</label>
                <input type="text" class="form-control @error('nm_lengkap') is-invalid @enderror" name="nm_lengkap" id="nm_lengkap" placeholder="Nama Lengkap Mubaligh" autofocus value="{{ old('nm_lengkap', $ust->nm_lengkap) }}">
                @error('nm_lengkap')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror          
            </div>
            <div class="form-group">
                <label for="jenis_kelamin" class="">Jenis Kelamin</label>
                <div class="">
                    <select id="jk" name="jk" class="form-control @error('jk') is-invalid @enderror" value="{{ old('jk', $ust->jk) }}">
                        <option value="L" {{ $ust->jk == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="P" {{ $ust->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="hp">Nomor Ponsel</label>
                <input type="text" class="form-control @error('hp') is-invalid @enderror" name="hp" id="hp" placeholder="Nomor Ponsel" value="{{ old('hp', $ust->hp) }}">
                @error('hp')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror          
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control @error('hp') is-invalid @enderror" name="email" id="email" placeholder="Alamat Email" value="{{ old('email', $ust->email) }}">
                @error('email')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror          
                <div class="form-group">
                    <label for="hp">Alamat Rumah</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Alamat Rumah" value="{{ old('alamat', $ust->alamat) }}">
                    @error('alamat')
                    <div class="invalid-feedback">
                        <p class="text-danger">{{ $message }}</p>
                    </div>    
                    @enderror          
                </div>
                <div class="form-group">
                    <label for="name">Gambar <span class="required"></span></label>
                    <input type="hidden" name="oldPhoto" value="{{ $ust->photo }}">
                    @if($ust->photo)
                    <img src="{{ asset('storage/' . $ust->photo) }}" class="img-preview img-fluid mb-3 com-sm-5 d-block">
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
                    <label for="keterangan">Profil Mubaligh/Ustadz</label>
                   
                    <div class="form-group">
                        <input id="profil" type="hidden" name="profil" rows="20" cols="130" value="{{ old('profil', $ust->profil) }}">
                        <trix-editor input="profil" class="form-control"></trix-editor>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label for="peranmubaligh_id" class="">Peran Mubaligh/Ustadz</label>
                <div class="">
                    <select id="peranmubaligh_id" name="peranmubaligh_id" class="form-control">
                        @foreach ($peranmubalighs as $peran)
                            @if(old('peranmubaligh_id', $ust->peranmubaligh_id) == $peran->id)
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
    @endforeach
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
    
    const judul = document.querySelector('#judul');
    const slug = document.querySelector('#slug');

    judul.addEventListener('change', function(){
        fetch('/artikel/checkSlug?judul=' + judul.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)
    });

</script>

@stop