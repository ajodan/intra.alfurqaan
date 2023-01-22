@extends('layouts.backend.app',[
'title' => 'Ubah Artikel/Berita',
'contentTitle' => 'Ubah Artikel/Berita',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">

    <div class="card-body">
    @foreach ($jadwals as $jadwal)
    <form method="POST" action="{{ route('jadwaljumat.update', ['jadwaljumat' => $jadwal->id]) }}" enctype="multipart/form-data">

            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="tgl">Tanggal Kegiatan</label>
                <input  class="form-control @error('tgl') is-invalid @enderror" type="date" name="tgl" id="tgl" placeholder="Tanggal Kegiatan" value="{{ old('tgl', $jadwal->tgl) }}">
                @error('tgl')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror
            </div>
            <div class="form-group">
                <label for="tgl">Waktu Kegiatan</label>
                <input class="form-control @error('tgl') is-invalid @enderror" type="time" name="waktu" id="waktu" placeholder="Waktu Kegiatan" value="{{ old('waktu', $jadwal->waktu) }}">
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
                            @if(old('khotib', $jadwal->khotib) == $ustadz->nm_lengkap)
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
                            @if(old('imam', $jadwal->imam) == $ustadz->nm_lengkap)
                            <option value="{{ $ustadz->nm_lengkap }}" selected>{{ $ustadz->nm_lengkap }}</option>
                            @else
                            <option value="{{ $ustadz->nm_lengkap }}">{{ $ustadz->nm_lengkap }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="mc" class="">MC</label>
                <div class="">
                    <select id="mc" name="mc" class="form-control">
                        @foreach ($mubalighs as $ustadz)
                            @if(old('mc', $jadwal->mc) == $ustadz->nm_lengkap)
                            <option value="{{ $ustadz->nm_lengkap }}" selected>{{ $ustadz->nm_lengkap }}</option>
                            @else
                            <option value="{{ $ustadz->nm_lengkap }}">{{ $ustadz->nm_lengkap }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="muadzin" class="">Muadzin</label>
                <div class="">
                    <select id="muadzin" name="muadzin" class="form-control">
                        @foreach ($mubalighs as $ustadz)
                            @if(old('muadzin', $jadwal->muadzin) == $ustadz->nm_lengkap)
                            <option value="{{ $ustadz->nm_lengkap }}" selected>{{ $ustadz->nm_lengkap }}</option>
                            @else
                            <option value="{{ $ustadz->nm_lengkap }}">{{ $ustadz->nm_lengkap }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('jadwaljumat.index') }}" class="btn btn-danger btn-sm">Kembali</a>
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