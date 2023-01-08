@extends('layouts.backend.app',[
'title' => 'Ubah Topik Kajian',
'contentTitle' => 'Ubah Topik Kajian',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
        <form action="{{ route('topikkajian.update',$topikkajian->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="nm_topik_kajian">Nama Topik Kajian</label>
                <input value="{{ $topikkajian->nm_topik_kajian }}" required class="form-control" type="" name="nm_topik_kajian" id="nm_topik_kajian" placeholder="Nama Topik Kajian">
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('topikkajian.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </form>
    </div>
</div>
@stop