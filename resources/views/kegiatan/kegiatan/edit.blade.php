@extends('layouts.backend.app',[
'title' => 'Ubah Kegiatan',
'contentTitle' => 'Ubah Kegiatan',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    @foreach ($kegiatan as $item)
    <form method="POST" action="{{ route('kegiatan.update', ['kegiatan' => $item->id]) }}">
        @csrf
        @method('PATCH')
        <div class="card-body">
            <div class="form-group">
                <label for="jeniskegiatan_id" class="">Jenis Kegiatan</label>
                <div class="">
                    <select id="jeniskegiatan_id" name="jeniskegiatan_id" class="form-control">
                        @foreach ($jeniskegiatan as $item1)
                        <option value="{{ $item1->id }}">{{ $item1->nm_jenis_kegiatan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="mubaligh_id" class="">Nama Mubaligh/Ustadz</label>
                <div class="">
                    <select id="mubaligh_id" name="mubaligh_id" class="form-control">
                        @foreach ($mubaligh as $item2)
                        <option value="{{ $item2->id }}">{{ $item2->nm_lengkap }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="nm_kegiatan">Nama Kegiatan</label>
                <input required class="form-control @error('nm_kegiatan') is-invalid @enderror" value="{{ $item->nm_kegiatan }}" type="text" name="nm_kegiatan" id="nm_kegiatan" placeholder="Nama Kegiatan">
                @error('nm_kegiatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tgl">Tanggal Kegiatan</label>
                <input required class="form-control @error('tgl') is-invalid @enderror" value="{{ $item->tgl }}" type="date" name="tgl" id="tgl" placeholder="Tanggal Kegiatan">
                @error('tgl')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="waktu">Waktu Kegiatan</label>
                <input required class="form-control @error('waktu') is-invalid @enderror" value="{{ $item->waktu }}" type="time" name="waktu" id="waktu" placeholder="Waktu Kegiatan">
                @error('waktu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="video_url">Video URL</label>
                <input required class="form-control @error('video_url') is-invalid @enderror" value="{{ $item->video_url }}" type="text" name="video_url" id="video_url" placeholder="Link Video URL">
                @error('video_url')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Photo Kegiatan">Photo Kegiatan</label>
                <img src="{{ url('Kegiatan/'.$item->photo) }}" style="height: 300px; width: 250px;">
                @error('video_url')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class=" form-group">
                <label for="keterangan">Deskripsi/Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="20" cols="130">{{ $item->keterangan }}</textarea>
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
                <a href="{{ route('kegiatan.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
    </form>
    @endforeach
</div>
</div>
@stop