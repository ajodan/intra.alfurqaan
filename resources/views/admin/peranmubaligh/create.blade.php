@extends('layouts.backend.app',[
'title' => 'Manage Peran Mubaligh',
'contentTitle' => 'Manage Peran Mubaligh',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin.peranmubaligh.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="id">ID</label>
                <input required class="form-control" type="" name="id" id="id" value="{{$max}}" placeholder="">
            </div>
            <div class="form-group">
                <label for="nm_peran">Nama Peran</label>
                <input required class="form-control @error('nm_peran') is-invalid @enderror" type="text" name="nm_peran" id="nm_peran" placeholder="Nama Jabatan">
                @error('nm_peran')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('admin.peranmubaligh.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>

        </form>
    </div>
</div>
@stop