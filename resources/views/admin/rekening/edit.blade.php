@extends('layouts.backend.app',[
'title' => 'Edit Rekening',
'contentTitle' => 'Edit Rekening',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin.rekening.update',$rekening->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="kd_jamaah">Kode Jamaah</label>
                <input value="{{ $rekening->kd_jamaah }}" disabled="" required class="form-control" type="" name="kd_jamaah" id="kd_jamaah" placeholder="">
            </div>
            <div class="form-group">
                <label for="no_rekening">No Rekening</label>
                <input value="{{ $rekening->no_rekening }}" required class="form-control" type="" name="no_rekening" id="no_rekening" placeholder="">
            </div>
            <div class="form-group">
                <label for="pin">Pin</label>
                <input value="{{ $rekening->pin }}" required class="form-control" type="" name="pin" id="pin" placeholder="">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan Pembaharuan</button>
                <a href="{{ route('admin.rekening.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </form>
    </div>
</div>
@stop