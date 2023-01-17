@extends('layouts.backend.app',[
'title' => 'Ubah Kegiatan',
'contentTitle' => 'Ubah Kegiatan',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-body">
    @foreach ($kegiatans as $kegiatan)
    <form method="POST" action="{{ route('kegiatan.update', ['kegiatan' => $kegiatan->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="nm_kegiatan">Nama Kegiatan</label>
            <input type="text" class="form-control @error('nm_kegiatan') is-invalid @enderror" name="nm_kegiatan" id="nm_kegiatan" placeholder="Nama Kegiatan" autofocus value="{{ old('nm_kegiatan', $kegiatan->nm_kegiatan) }}">
            @error('nm_kegiatan')
            <div class="invalid-feedback">
                <p class="text-danger">{{ $message }}</p>
            </div>    
            @enderror          
        </div>
        <div class="form-group">
            <label for="jeniskegiatan_id" class="">Jenis Kegiatan</label>
            <div class="">
                <select id="jeniskegiatan_id" name="jeniskegiatan_id" class="form-control">
                    @foreach ($jeniskegiatans as $jnskeg)
                        @if(old('jeniskegiatan_id', $kegiatan->jeniskegiatan_id) == $jnskeg->id)
                        <option value="{{ $jnskeg->id }}" selected>{{ $jnskeg->nm_jenis_kegiatan }}</option>
                        @else
                        <option value="{{ $jnskeg->id }}">{{ $jnskeg->nm_jenis_kegiatan }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="mubaligh_id" class="">Nama Mubaligh/Ustadz</label>
            <div class="">
                <select id="mubaligh_id" name="mubaligh_id" class="form-control">
                    @foreach ($mubalighs as $muba)
                        @if(old('mubaligh_id', $kegiatan->mubaligh_id) == $muba->id)
                        <option value="{{ $muba->id }}" selected>{{ $muba->nm_lengkap }}</option>
                        @else
                        <option value="{{ $muba->id }}">{{ $muba ->nm_lengkap }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="tgl">Tanggal Kegiatan</label>
            <input  class="form-control @error('tgl') is-invalid @enderror" type="date" name="tgl" id="tgl" placeholder="Tanggal Kegiatan" value="{{ old('tgl', $kegiatan->tgl) }}">
            @error('tgl')
            <div class="invalid-feedback">
                <p class="text-danger">{{ $message }}</p>
            </div>    
            @enderror
        </div>
        <div class="form-group">
            <label for="tgl">Waktu Kegiatan</label>
            <input class="form-control @error('tgl') is-invalid @enderror" type="time" name="waktu" id="waktu" placeholder="Waktu Kegiatan" value="{{ old('waktu', $kegiatan->waktu) }}">
            @error('waktu')
            <div class="invalid-feedback">
                <p class="text-danger">{{ $message }}</p>
            </div>    
            @enderror
        </div>
        <div class="form-group">
            <label for="video_url">Video URL</label>
            <input class="form-control" type="text" name="video_url" id="video_url" placeholder="Link Video URL" value="{{ old('video_url', $kegiatan->video_url) }}">
        </div>
        @error('video_url')
        <div class="invalid-feedback">
            <p class="text-danger">{{ $message }}</p>
        </div>    
        @enderror
        
        <div class="form-group">
            <label for="keterangan">Deskripsi</label>
           
            <div class="form-group">
                <input id="keterangan" type="hidden" name="keterangan" rows="20" cols="130" value="{{ old('keterangan', $kegiatan->keterangan) }}">
                <trix-editor input="keterangan" class="form-control"></trix-editor>
            </div>
        </div>
        <div class="form-group">
            <label for="keg_kajian" class="">Kegiatan Kajian</label>
            <div class="">
                <select id="keg_kajian" name="keg_kajian" class="form-control @error('keg_kajian') is-invalid @enderror" value="{{ old('keg_kajian', $kegiatan->keg_kajian) }}">
                    <option value="Y" {{ $kegiatan->keg_kajian == 'Y' ? 'selected' : '' }}>Ya</option>
                    <option value="N" {{ $kegiatan->keg_kajian == 'N' ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="name">Gambar <span class="required"></span></label>
            <input type="hidden" name="oldPhoto" value="{{ $kegiatan->photo }}">
            @if($kegiatan->photo)
            <img src="{{ asset('storage/' . $kegiatan->photo) }}" class="img-preview img-fluid mb-3 com-sm-5 d-block">
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
            <a href="{{ route('kegiatan.index') }}" class="btn btn-danger btn-sm">Kembali</a>
        </div>
    </form>
    @endforeach
    </div>
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