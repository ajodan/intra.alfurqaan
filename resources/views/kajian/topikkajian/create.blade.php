@extends('layouts.backend.app',[
'title' => 'Tambah Topik Kajian',
'contentTitle' => 'Tambah Topik Kajian',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('topikkajian.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="id">ID</label>
                <input class="form-control" type="" name="id" id="id" value="{{$max}}" placeholder="">
            </div>
            <div class="form-group">
                <label for="nm_topik_kajian">Nama Topik Kajian</label>
                <input class="form-control @error('nm_topik_kajian') is-invalid @enderror" type="text" name="nm_topik_kajian" id="nm_topik_kajian" placeholder="Nama Topik Kajian">
                @error('nm_topik_kajian')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('topikkajian.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>

        </form>
    </div>
</div>
@stop