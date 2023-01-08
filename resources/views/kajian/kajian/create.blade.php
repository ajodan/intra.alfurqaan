@extends('layouts.backend.app',[
'title' => 'Tambah Kajian',
'contentTitle' => 'Tambah Kajian',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">

    <div class="card-body">
        <form action="{{ route('kajian.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nama Kegiatan</label>
                {!! Form::select('kegiatan_id', $kegiatan, '', ['class' => 'form-control','enctype'=>'multipart/form-data']) !!}
                @if($errors->has('kegiatan_id'))
                <div class="text-danger">
                    {{ $errors->first('kegiatan_id')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Topik Kajian</label>
                {!! Form::select('topikkajian_id', $topikkajian, '', ['class' => 'form-control','enctype'=>'multipart/form-data']) !!}
                @if($errors->has('topikkajian_id'))
                <div class="text-danger">
                    {{ $errors->first('topikkajian_id')}}
                </div>
                @endif
            </div>



            <div class="form-group">
                <textarea name="isi_kajian" id="isi_kajian" rows="20" cols="130"></textarea>
                <script>
                    CKEDITOR.replace('isi_kajian');
                </script>
            </div>


            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('kajian.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </form>
    </div>
</div>
@stop