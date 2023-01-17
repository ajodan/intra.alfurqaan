@extends('layouts.backend.app',[
'title' => 'Tambah Kategori Artikel',
'contentTitle' => 'Tambah Kategori Artikel',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('kategori.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="id">ID</label>
                <input required class="form-control" type="" name="id" id="id" value="{{$max}}" placeholder="">
            </div>
            <div class="form-group">
                <label for="nm_kategori">Nama Kategori Artikel</label>
                <input required class="form-control @error('nm_kategori') is-invalid @enderror" type="text" name="nm_kategori" id="nm_kategori" placeholder="Nama Kategori">
                @error('nm_kategori')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('kategori.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>

        </form>
    </div>
</div>
@stop