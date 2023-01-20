@extends('layouts.backend.app',[
'title' => 'Tambah Nama Aset',
'contentTitle' => 'Tambah Nama Aset',
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
        <form action="{{ route('namaaset.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nm_aset">Nama Aset</label>
                <input type="text" class="form-control @error('nm_aset') is-invalid @enderror" name="nm_aset" id="nm_aset" placeholder="Nama Aset"  autofocus value="{{ old('nm_aset') }}">
                @error('nm_aset')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror          
            </div>
            <div class="form-group">
                <label for="jenisaset_id" class="">Jenis Aset</label>
                <div class="">
                    <select id="jenisaset_id" name="jenisaset_id" class="form-control">
                        @foreach ($jenisasets as $jenisaset)
                            @if(old('jenisaset_id') == $jenisaset->id)
                            <option value="{{ $jenisaset->id }}" selected>{{ $jenisaset->nm_jenis_aset }}</option>
                            @else
                            <option value="{{ $jenisaset->id }}">{{ $jenisaset->nm_jenis_aset }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
          
          
            <div class="form-group">
                <label for="kd_aset">Kode Aset</label>
                <input type="text" class="form-control @error('kd_aset') is-invalid @enderror" name="kd_aset" id="kd_aset" maxlength='10' placeholder="Kode Aset"  value="{{ old('kd_aset') }}">
                @error('kd_aset')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror          
            </div>
            <div class="form-group">
                <label for="merk">Merk</label>
                <input  class="form-control @error('merk') is-invalid @enderror" type="text" name="merk" id="merk" placeholder="Merk Aset" value="{{ old('merk') }}">
                @error('merk')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('namaaset.index') }}" class="btn btn-danger btn-sm">Kembali</a>
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
