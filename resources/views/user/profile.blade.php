@extends('layouts.backend.app',[
'title' => 'Profil Pengguna',
'contentTitle' => 'Profil Pengguna',
])
@section('content')
<x-alert></x-alert>
<div class="row">
	<x-card>
		<x-slot name="col">col-lg-6 mb-3</x-slot>
		<x-slot name="cardHeader">Profil Saya</x-slot>
		<div class="form-group">
			<label>Nama Lengkap</label>
			<input type="" disabled="" value="{{ Auth::user()->name }}" class="form-control">
		</div>
		<div class="form-group">
			<label>Username</label>
			<input type="" disabled="" value="{{ Auth::user()->username }}" class="form-control">
		</div>
		
		<div class="form-group">
			<label>Level</label>
			<input type="email" disabled="" value="{{ Auth::user()->level }}" class="form-control">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" disabled="" value="{{ Auth::user()->email }}" class="form-control">
		</div>
	</x-card>

	<x-card>
		<x-slot name="col">col-lg-6</x-slot>
		<x-slot name="cardHeader">Ubah Profil</x-slot>
		<x-edit>
			<x-slot name="action">{{ route('user.profile.update') }}</x-slot>
			<div class="form-group">
				<label for="name">Nama Lengkap</label>
				<input required name="name" id="name" type="text" value="{{ Auth::user()->name }}" class="form-control" disabled>
			</div>
			<div class="form-group">
				<label for="username">Username</label>
				<input required name="username" id="username" type="text" value="{{ Auth::user()->username }}" class="form-control" disabled>
			</div>
			<div class="form-group">
				<label for="level">Level</label>
				<input required name="level" id="level" type="text" value="{{ Auth::user()->level }}" class="form-control" disabled>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input required name="email" id="email" type="email" value="{{ Auth::user()->email }}" class="form-control" autofocus>
			</div>
			<div class="form-group">
                <label for="name">Photo <span class="required"></span></label>
                <input type="hidden" name="oldPhoto" value="{{ Auth::user()->photo }}">
                @if(Auth::user()->photo)
                <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="img-preview img-fluid mb-3 com-sm-5 d-block">
                @else
                <img src="{{ asset('img/no-image.jpg') }}" class="img-preview img-fluid mb-3 com-sm-5 d-block">
                @endif
               
                {{-- <div class="form-group">
                    <input type="file" name="photo" id="photo" onchange="previewImage()" class="form-control" @error('photo') is-invalid @enderror>
                    @error('photo')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div> --}}
            </div>
		</x-edit>
	</x-card>
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