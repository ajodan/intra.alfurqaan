@extends('layouts.backend.app',[
'title' => 'Tambah Jadwal Jumat',
'contentTitle' => 'Tambah Jadwal Jumat',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('jadwaljumat.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tgl">Tanggal Kegiatan</label>
                <input  class="form-control @error('tgl') is-invalid @enderror" type="date" name="tgl" id="tgl" placeholder="Tanggal Kegiatan" value="{{ old('tgl') }}">
                @error('tgl')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror
            </div>
            <div class="form-group">
                <label for="tgl">Waktu Kegiatan</label>
                <input class="form-control @error('tgl') is-invalid @enderror" type="time" name="waktu" id="waktu" placeholder="Waktu Kegiatan" value="{{ old('waktu') }}">
                @error('waktu')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror
            </div>
            <div class="form-group">
                <label for="khotib" class="">Khotib</label>
                <div class="">
                    <select id="khotib" name="khotib" class="form-control">
                        @foreach ($mubalighs as $ustadz)
                            @if(old('khotib') == $ustadz->id)
                            <option value="{{ $ustadz->nm_lengkap }}" selected>{{ $ustadz->nm_lengkap }}</option>
                            @else
                            <option value="{{ $ustadz->nm_lengkap }}">{{ $ustadz->nm_lengkap }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="imam" class="">Imam</label>
                <div class="">
                    <select id="imam" name="imam" class="form-control">
                        @foreach ($mubalighs as $ustadz)
                            @if(old('imam') == $ustadz->id)
                            <option value="{{ $ustadz->nm_lengkap }}" selected>{{ $ustadz->nm_lengkap }}</option>
                            @else
                            <option value="{{ $ustadz->nm_lengkap }}">{{ $ustadz->nm_lengkap }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="mc">MC</label>
                <input type="text" class="form-control @error('mc') is-invalid @enderror" name="mc" id="mc" placeholder="Pembawa Acara" autofocus value="{{ old('mc') }}">
                
                @error('mc')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror          
            </div>
            <div class="form-group">
                <label for="muadzin">Muadzin</label>
                <input type="text" class="form-control @error('muadzin') is-invalid @enderror" name="muadzin" id="muadzin" placeholder="Muadzin" autofocus value="{{ old('muadzin') }}">
                
                @error('muadzin')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror          
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('jadwaljumat.index') }}" class="btn btn-danger btn-sm">Kembali</a>
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
    
    const judul = document.querySelector('#judul');
    const slug = document.querySelector('#slug');

    judul.addEventListener('change', function(){
        fetch('/artikel/checkSlug?judul=' + judul.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)
    });

</script>

@stop