@extends('layouts.backend.app',[
'title' => 'Ubah Aset/Inventaris',
'contentTitle' => 'Ubah Aset/Inventaris',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">

    <div class="card-body">
    @foreach ($asets as $aset)
    <form method="POST" action="{{ route('aset.update', ['aset' => $aset->id]) }}" enctype="multipart/form-data">

            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="namaaset_id" class="">Nama Aset/Inventaris</label>
                <div class="">
                    <select id="namaaset_id" name="namaaset_id" class="form-control">
                        @foreach ($namaasets as $namaaset)
                            @if(old('namaaset_id',$aset->namaaset_id) == $namaaset->id)
                            <option value="{{ $namaaset->id }}" selected>{{ $namaaset->nm_aset }}</option>
                            @else
                            <option value="{{ $namaaset->id }}">{{ $namaaset->nm_aset }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" id="jumlah" placeholder="Jumlah" autofocus value="{{ old('jumlah',$aset->jumlah) }}">
                @error('jumlah')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror          
            </div>
            <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control @error('satuan') is-invalid @enderror" name="satuan" id="satuan" placeholder="Satuan" value="{{ old('satuan',$aset->satuan) }}">
                @error('satuan')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror          
            </div>
            <div class="form-group">
                <label for="tgl_perolehan">Tanggal Perolehan</label>
                <input type="date" class="form-control @error('tgl_perolehan') is-invalid @enderror" name="tgl_perolehan" id="tgl_perolehan" placeholder="Tanggal Perolehan"  value="{{ old('tgl_perolehan', $aset->tgl_perolehan) }}">
                @error('tgl_perolehan')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror          
            </div>
            <div class="form-group">
                <label for="harga_perolehan">Harga Perolehan</label>
                <input type="text" class="form-control @error('harga_perolehan') is-invalid @enderror" name="harga_perolehan" id="harga_perolehan" placeholder="Harga Perolehan" value="{{ old('harga_perolehan', $aset->harga_perolehan) }}">
                @error('harga_perolehan')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror          
            </div>

            <div class="form-group">
                <label for="kondisi">Kondisi</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kondisi" id="kondisi" value="Baik" {{ $aset->kondisi == 'Baik' ? 'checked' : ''}} checked>
                    <label class="form-check-label" for="inlineRadio1">Baik</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kondisi" id="kondisi" value="Rusak Ringan" {{ $aset->kondisi == 'Rusak Ringan' ? 'checked' : ''}} >
                    <label class="form-check-label" for="inlineRadio2">Rusak Ringan</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kondisi" id="kondisi" value="Rusak Berat" {{ $aset->kondisi == 'Rusak Berat' ? 'checked' : ''}} >
                    <label class="form-check-label" for="inlineRadio3">Rusak Berat</label>
                </div>     
            </div>
            
           
            <div class="form-group">
                <label for="name">Gambar <span class="required"></span></label>
                <input type="hidden" name="oldPhoto" value="{{ $aset->photo }}">
                @if($aset->photo)
                <img src="{{ asset('storage/' . $aset->photo) }}" class="img-preview img-fluid mb-3 com-sm-5 d-block">
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
                <a href="{{ route('aset.index') }}" class="btn btn-danger btn-sm">Kembali</a>
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