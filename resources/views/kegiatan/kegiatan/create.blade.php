@extends('layouts.backend.app',[
'title' => 'Tambah Kegiatan',
'contentTitle' => 'Tambah Kegiatan',
])

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

@include('layouts.components.alert-dismissible')

<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('kegiatan.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nm_kegiatan">Nama Kegiatan</label>
                <input type="text" class="form-control @error('nm_kegiatan') is-invalid @enderror" name="nm_kegiatan" id="nm_kegiatan" placeholder="Nama Kegiatan" autofocus value="{{ old('nm_kegiatan') }}">
                <input type="hidden" class="form-control name="created_by" id="created_by" value="{{ $nama }}">
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
                            @if(old('jeniskegiatan_id') == $jnskeg->id)
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
                            @if(old('mubaligh_id') == $muba->id)
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
                <label for="video_url">Video URL</label>
                <input class="form-control" type="text" name="video_url" id="video_url" placeholder="Link Video URL" value="{{ old('video_url') }}">
            </div>
            
            <div class="form-group">
                <label for="keterangan">Deskripsi</label>
               
                <div class="form-group">
                    <input id="keterangan" type="hidden" name="keterangan" rows="20" cols="130" value="{{ old('keterangan') }}">
                    <trix-editor input="keterangan" class="form-control"></trix-editor>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Gambar <span class="required"></span></label>
                <img class="img-preview img-fluid mb-3 com-sm-5">
                <div class="form-group">
                    <input type="file" name="photo" id="photo" onchange="previewImage()">
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('kegiatan.index') }}" class="btn btn-danger btn-sm">Kembali</a>
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
