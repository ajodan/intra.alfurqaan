@extends('layouts.backend.app',[
'title' => 'Ubah Artikel/Berita',
'contentTitle' => 'Ubah Artikel/Berita',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    @foreach ($artikels as $item)
    <form method="POST" action="{{ route('artikel.update', ['artikel' => $item->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class=" card-body">
            <div class="form-group">
                <label for="kategori_id" class="">Kategori Artikel</label>
                <div class="">
                    <select id="kategori_id" name="kategori_id" class="form-control">
                        @foreach ($kategoris as $item1)
                        <option value="{{ $item1->id }}">{{ $item1->nm_kategori }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class=" form-group">
                <label for="judul">Judul Artikel</label>
                <input value="{{ $item->judul }}" required class="form-control" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul Artikel" placeholder="">
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
                <!-- <textarea name="isi_artikel" id="isi_artikel" rows="20" cols="130">{{ $item->isi_artikel }}</textarea>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('isi_artikel');
                </script> -->
                 <input id="isi_artikel" type="hidden" name="isi_artikel" rows="20" cols="130"">
                <trix-editor input="isi_artikel" value="{{ $item->isi_artikel }}"></trix-editor>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Gambar <span class="required"></span></label>
                @if($item->photo)
                <img src="{{ asset('storage/Artikel/' . $item->photo) }}" class="img-preview img-fluid mb-3 com-sm-5">
                @else
                <img class="img-preview img-fluid mb-3 com-sm-5">
                @endif
                <div class="form-group">
                    <input type="file" name="photo" id="photo" onchange="previewImage()" class="form-control">
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
    

</script>
@stop