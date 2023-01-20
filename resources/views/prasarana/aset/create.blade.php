@extends('layouts.backend.app',[
'title' => 'Tambah Aset/Inventaris',
'contentTitle' => 'Tambah Aset/Inventaris',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('aset.store') }}" method="post" enctype="multipart/form-data">
            @csrf
         
            <div class="form-group">
                <label for="namaaset_id" class="">Nama Aset/Inventaris</label>
                <div class="">
                    <select id="namaaset_id" name="namaaset_id" class="form-control">
                        @foreach ($namaasets as $namaaset)
                            @if(old('namaaset_id') == $namaaset->id)
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
                <input type="text" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" id="jumlah" placeholder="Jumlah" autofocus value="{{ old('jumlah') }}">
                @error('jumlah')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror          
            </div>
            <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control @error('satuan') is-invalid @enderror" name="satuan" id="satuan" placeholder="Satuan" autofocus value="{{ old('satuan') }}">
                @error('satuan')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror          
            </div>
            <div class="form-group">
                <label for="tgl_perolehan">Tanggal Perolehan</label>
                <input type="date" class="form-control @error('tgl_perolehan') is-invalid @enderror" name="tgl_perolehan" id="tgl_perolehan" placeholder="Tanggal Perolehan" autofocus value="{{ old('satuan') }}">
                @error('tgl_perolehan')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror          
            </div>
            <div class="form-group">
                <label for="harga_perolehan">Harga Perolehan</label>
                <input type="text" class="form-control @error('harga_perolehan') is-invalid @enderror" name="harga_perolehan" id="harga_perolehan" placeholder="Harga Perolehan" autofocus value="{{ old('satuan') }}">
                @error('harga_perolehan')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>    
                @enderror          
            </div>
            <div class="form-group">
                <label for="kondisi">Kondisi</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kondisi" id="kondisi" value="Baik" checked>
                    <label class="form-check-label" for="inlineRadio1">Baik</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kondisi" id="kondisi" value="Rusak Ringan">
                    <label class="form-check-label" for="inlineRadio2">Rusak Ringan</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kondisi" id="kondisi" value="Rusak Berat">
                    <label class="form-check-label" for="inlineRadio3">Rusak Berat</label>
                </div>     
            </div>
            
           
            <div class="form-group">
                <label for="name">Gambar <span class="required"></span></label>
                <img class="img-preview img-fluid mb-3 com-sm-5">
                <div class="form-group">
                    <input type="file" name="photo" id="photo" onchange="previewImage()" class="form-control" @error('photo') is-invalid @enderror">
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

@push('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins') }}/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('plugins') }}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
"
<script>
	$(function() {
		$("#dataTable1").DataTable();

		$('#dataTable2').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>
@endpush