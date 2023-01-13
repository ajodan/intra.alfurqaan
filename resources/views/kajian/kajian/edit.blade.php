@extends('layouts.backend.app',[
'title' => 'Ubah Kajian',
'contentTitle' => 'Ubah Kajian',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    @foreach ($kajian as $item)
    <form method="POST" action="{{ route('kajian.update', ['kajian' => $item->id]) }}">
        @csrf
        @method('PATCH')
        <div class=" card-body">
            <div class="form-group">
                <label for="kegiatan_id" class="">Kegiatan</label>
                <div class="">
                    <select id="kegiatan_id" name="kegiatan_id" class="form-control">
                        @foreach ($kegiatan as $item1)
                        <option value="{{ $item1->id }}">{{ $item1->nm_kegiatan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="topikkajian_id" class="">Topik Kajian</label>
                <div class="">
                    <select id="topikkajian_id" name="topikkajian_id" class="form-control">
                        @foreach ($topikkajian as $item1)
                        <option value="{{ $item1->id }}">{{ $item1->nm_topik_kajian }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class=" form-group">
                <label for="isi_kajian">Ringkasan Kajian</label>
                <textarea name="isi_kajian" id="isi_kajian" rows="20" cols="130">{{ $item->isi_kajian }}</textarea>
            </div>
            <div class="form-group">
                <label for="created_by">Pengentri</label>
                <input required class="form-control @error('created_by') is-invalid @enderror" value="{{ $item->created_by }}" type="text" name="created_by" id="created_by" placeholder="Pengentri">
                @error('created_by')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('kajian.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
    </form>
    @endforeach
</div>
</div>
@stop