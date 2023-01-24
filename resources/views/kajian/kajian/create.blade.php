@extends('layouts.backend.app',[
'title' => 'Tambah Kajian',
'contentTitle' => 'Tambah Kajian',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">

    <div class="card-body">
        <form action="{{ route('kajian.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="kegiatan_id" class="">Nama Kegiatan</label>
                <div class="">
                    <select id="kegiatan_id" name="kegiatan_id" class="form-control">
                        <option value="" selected>-- Pilih Kegiatan --</option>
                        @foreach ($kegiatan as $keg)
                            @if(old('kegiatan_id') == $keg->id)
                            <option value="{{ $keg->id }}" selected>{{ $keg->nm_kegiatan }}</option>
                            @else
                            <option value="{{ $keg->id }}">{{ $keg->nm_kegiatan }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="topikkajian_id" class="">Topik Kajian</label>
                <div class="">
                    <select id="topikkajian_id" name="topikkajian_id" class="form-control">
                        @foreach ($topikkajian as $topik)
                            @if(old('topikkajian_id') == $topik->id)
                            <option value="{{ $topik->id }}" selected>{{ $topik->nm_topik_kajian }}</option>
                            @else
                            <option value="{{ $topik->id }}">{{ $topik->nm_topik_kajian }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
           
            <div class="form-group">
                <label for="isi_kajian">Ringkasan Kajian</label>
                <div class="form-group">
                    <input id="isi_kajian" type="hidden" name="isi_kajian" rows="20" cols="130" value="{{ old('isi_kajian') }}">
                    <trix-editor input="isi_kajian"></trix-editor>
                </div>
                @error('isi_kajian')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
           <div class="form-group">
                <label for="video_kajian">URL Video Kajian</label>
                <input class="form-control" type="text" name="video_kajian" id="video_kajian" placeholder="Link Video URL" value="{{ old('video_kajian') }}">
            </div>
            
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('kajian.index') }}" class="btn btn-danger btn-sm">Kembali</a>
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