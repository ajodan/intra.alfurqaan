@extends('layouts.backend.app',[
'title' => 'Ubah Kategori Artikel',
'contentTitle' => 'Ubah Kategori Artikel',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
        <form action="{{ route('kategori.update',$kategori->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="nm_kategori">Nama Kategori</label>
                <input value="{{ $kategori->nm_kategori }}" required class="form-control" type="" name="nm_kategori" id="nm_kategori" placeholder="Nama Kategori">
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('kategori.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </form>
    </div>
</div>
@stop