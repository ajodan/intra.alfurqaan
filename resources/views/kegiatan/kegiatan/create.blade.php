@extends('layouts.backend.app',[
'title' => 'Tambah Kegiatan',
'contentTitle' => 'Tambah Kegiatan',
])

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

@include('layouts.components.alert-dismissible')

<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('kegiatan.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label>Jenis Kegiatan</label>
                {!! Form::select('jeniskegiatan_id', $jeniskegiatan, '', ['class' => 'form-control','enctype'=>'multipart/form-data']) !!}
                @if($errors->has('jeniskegiatan_id'))
                <div class="text-danger">
                    {{ $errors->first('jeniskegiatan_id')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="nm_kegiatan">Nama Kegiatan</label>
                <input required class="form-control @error('nm_kegiatan') is-invalid @enderror" type="text" name="nm_kegiatan" id="nm_kegiatan" placeholder="Nama Kegiatan">
                @error('nm_kegiatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Mubaligh/Ustadz</label>
                {!! Form::select('mubaligh_id', $mubaligh, '', ['class' => 'form-control','enctype'=>'multipart/form-data']) !!}
                @if($errors->has('mubaligh_id'))
                <div class="text-danger">
                    {{ $errors->first('mubaligh_id')}}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label for="tgl">Tanggal Kegiatan</label>
                <input required class="form-control @error('tgl') is-invalid @enderror" type="date" name="tgl" id="tgl" placeholder="Tanggal Kegiatan">
                @error('tgl')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tgl">Waktu Kegiatan</label>
                <input required class="form-control @error('tgl') is-invalid @enderror" type="time" name="waktu" id="waktu" placeholder="Tanggal Kegiatan">
                @error('waktu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="video_url">Video URL</label>
                <input required class="form-control @error('video_url') is-invalid @enderror" type="text" name="video_url" id="video_url" placeholder="Link Video URL">
                @error('video_url')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Photo Kegiatan<span class="required"></span></label>
                <div class="form-group">
                    <input type='file' name='photo' class="form-control">
                    @if ($errors->has('photo'))
                    <span class="errormsg text-danger">{{ $errors->first('photo') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="name">Keterangan <span class="required"></span></label>
                <textarea name="keterangan" id="keterangan" rows="20" cols="130"></textarea>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('profil');
                </script>
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('kegiatan.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>

        </form>
    </div>
</div>
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