@extends('layouts.backend.app',[
'title' => 'Ubah Pengurus',
'contentTitle' => 'Ubah Pengurus',
])

@section('content')
<!-- DataTables -->
<div class="card shadow mb-4">
    <div class="card-body">
       
        @foreach ($pengurus as $ust)
        <form action="{{ route('admin.pengurus.update',$ust->id) }}" method="post" enctype="multipart/form-data">
        {{-- <form method="POST" action="{{ route('pengurus.update', ['pengurus' => $ust->id]) }}" enctype="multipart/form-data"> --}}
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="nm_pengurus">Nama Pengurus</label>
                <input value="{{ $ust->nm_pengurus }}" required class="form-control" type="" name="nm_pengurus" id="nm_pengurus" placeholder="">
            </div>
            <div class="form-group">
                <label for="no_hp">No Hp</label>
                <input value="{{ $ust->no_hp }}" required class="form-control" type="number" name="nm_pengurus" id="nm_pengurus" placeholder="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input value="{{ $ust->email }}" required class="form-control" type="email" name="email" id="email" placeholder="">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input value="{{ $ust->alamat }}" required class="form-control" type="" name="alamat" id="alamat" placeholder="">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan Pembaharuan</button>
                <a href="{{ route('admin.pengurus.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </form>
        @endforeach
    </div>
</div>
@stop