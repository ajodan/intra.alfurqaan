@extends('layouts.backend.app',[
'title' => 'Tambah Yatim dan Duafa',
'contentTitle' => 'Tambah Yatim dan Duafa',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">

    <div class="card-body">
        <form action="{{ route('admin.yatimduafa.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nm_lengkap">Nama Lengkap</label>
                <input required class="form-control" type="" name="nm_lengkap" id="nm_lengkap" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input required class="form-control @error('tgl_lahir') is-invalid @enderror" type="date" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir">
                @error('tgl_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select required="" class="form-control" name="jk" id="jk">
                    <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select required="" class="form-control" name="status" id="status">
                    <option value="" disabled selected>-- Pilih Status --</option>
                    <option value="Yatim">Yatim</option>
                    <option value="Piatu">Piatu</option>
                    <option value="Yatim Piatu">Yatim Piatu</option>
                    <option value="Duafa">Duafa</option>
                </select>
            </div>
            <div class="form-group">
                <label for="hp">No Ponsel</label>
                <input required class="form-control" type="number" name="hp" id="hp" placeholder="">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input required class="form-control" type="" name="alamat" id="alamat" placeholder="">
            </div>
            <div class="form-group">
                <label for="name">Photo <span class="required"></span></label>
                <div class="form-group">
                    <input type='file' name='photo' class="form-control">
                    @if ($errors->has('photo'))
                    <span class="errormsg text-danger">{{ $errors->first('photo') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('admin.yatimduafa.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </form>
    </div>
</div>
@stop