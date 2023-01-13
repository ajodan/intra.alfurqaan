@extends('layouts.backend.app',[
'title' => 'Ubah Mubaligh',
'contentTitle' => 'Ubah Mubaligh',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    @foreach ($mubaligh as $item)
    <form method="POST" action="{{ route('mubaligh.update', ['mubaligh' => $item->id]) }}">
        @csrf
        @method('PATCH')
        <div class=" card-body">
            <div class=" form-group">
                <label for="nm_lengkap">Nama Lengkap</label>
                <input value="{{ $item->nm_lengkap }}" required class="form-control" type="" name="nm_lengkap" id="nm_lengkap" placeholder="">
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select required="" class="form-control" name="jk" id="jk">
                    <option value="L" {{ $item->jk == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="P" {{ $item->jk == 'P' ? 'selected' : '' }}>Perempuan</option>

                </select>
            </div>
            <div class="form-group">
                <label for="hp">Nomor Ponsel</label>
                <input value="{{ $item->hp }}" required class="form-control" type="" name="hp" id="hp" placeholder="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input value="{{ $item->email }}" required class="form-control" type="email" name="email" id="email" placeholder="">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input value="{{ $item->alamat }}" required class="form-control" type="" name="alamat" id="alamat" placeholder="">
            </div>

            <div class="form-group">
                <img src="{{ url('storage/Photo/'.$item->photo) }}" style="height: 300px; width: 250px;">
            </div>
            <div class="form-group">
            <label for="profil">Profil Mubaligh/Ustadz</label>
            <div class="form-group">
                <textarea name="profil" id="profil" rows="20" cols="130">{{ $item->profil }}</textarea>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('profil');
                </script>
                </div>
            </div>

            <div class="form-group">
                <label for="peranmubaligh_id" class="">Peran Mubaligh</label>
                <div class="">
                    <select id="peranmubaligh_id" name="peranmubaligh_id" class="form-control">
                        @foreach ($peranmubaligh as $item1)
                        <option value="{{ $item1->id }}">{{ $item1->nm_peran }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                <a href="{{ route('mubaligh.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
    </form>
    @endforeach
</div>
</div>
@stop