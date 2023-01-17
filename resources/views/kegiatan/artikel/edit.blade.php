@extends('layouts.backend.app',[
'title' => 'Ubah Artikel/Berita',
'contentTitle' => 'Ubah Artikel/Berita',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">

    <div class="card-body">
    @foreach ($artikels as $artikel)
    <form method="POST" action="{{ route('artikel.update', ['artikel' => $artikel->id]) }}" enctype="multipart/form-data">

            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="kategori_id" class="">Kategori Artikel</label>
                <div class="">
                    <select id="kategori_id" name="kategori_id" class="form-control">
                        @foreach ($kategoris as $kat)
                        @if(old('kategori_id', $artikel->kategori_id) == $kat->id)
                        <option value="{{ $kat->id }}" selected>{{ $kat->nm_kategori }}</option>
                        @else
                        <option value="{{ $kat->id }}">{{ $kat->nm_kategori }}</option>
                        @endif
                       
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="judul">Judul Artikel/Berita</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Judul Artikel" required autofocus value="{{ old('judul', $artikel->judul) }}">
                @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>    
                @enderror          
            </div>
            <div class="form-group">
            <label for="isi_artikel">Isi Artikel</label>
            @error('isi_artikel')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="form-group">
                <input id="isi_artikel" type="hidden" name="isi_artikel" rows="20" cols="130" value="{{ old('isi_artikel', $artikel->isi_artikel) }}">
                <trix-editor input="isi_artikel"></trix-editor>
            </div>
            <div class="form-group">
                <label for="name">Gambar <span class="required"></span></label>
                <input type="hidden" name="oldPhoto" value="{{ $artikel->photo }}">
                @if($artikel->photo)
                <img src="{{ asset('storage/' . $artikel->photo) }}" class="img-preview img-fluid mb-3 com-sm-5 d-block">
                @else
                <img class="img-preview img-fluid mb-3 com-sm-5">
                @endif
               
                <div class="form-group">
                    <input type="file" name="photo" id="photo" onchange="previewImage()" class="form-control" @error('photo') is-invalid @enderror>
                    @error('photo')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('artikel.index') }}" class="btn btn-danger btn-sm">Kembali</a>
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