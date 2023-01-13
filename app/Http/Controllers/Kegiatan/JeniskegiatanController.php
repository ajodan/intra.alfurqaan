<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\Http\Requests\JeniskegiatanRequest as Request;
use Illuminate\Http\Request as DefaultRequest;
//use App\Events\UserDeleteEvent;
use DB;
use App\Models\Jeniskegiatan;

class JeniskegiatanController extends Controller
{
    public function index(Jeniskegiatan $jeniskegiatan)
    {
        $jeniskegiatans = Jeniskegiatan::get();
        return view('kegiatan.jeniskegiatan.index', compact('jeniskegiatans'));
    }

    public function create()
    {
        $maxId = DB::table('jenis_kegiatans')->max('id');
        $max = $maxId + 1;
        return view('kegiatan.jeniskegiatan.create', compact('max'));
    }

    public function store(Request $request)
    {
        //$request->request->add(['password' => bcrypt($request->password)]);
        Jeniskegiatan::create($request->all());
        return redirect()->route('jeniskegiatan.index')->with('success', 'Data Jenis Kegiatan Berhasil disimpan');
    }

    // public function show(Jenistransaksi $jenistransaksi)
    // {
    //     return view('kasmasjid.jenistransaksi.show', compact('jenistransaksi'));
    // }

    public function edit(Jeniskegiatan $jeniskegiatan)
    {
        return view('kegiatan.jeniskegiatan.edit', compact('jeniskegiatan'));
    }

    public function update(DefaultRequest $request, Jeniskegiatan $jeniskegiatan)
    {

        $jeniskegiatan->update($request->all());
        return redirect()->route('jeniskegiatan.index')->with('success', 'Data Jenis Kegiatan berhasil diubah');
    }

    public function destroy(Jeniskegiatan $jeniskegiatan)
    {
        // event(new UserDeleteEvent($user));
        $jeniskegiatan->delete();
        return redirect()->route('jeniskegiatan.index')->with('success', 'Data Jenis Kegiatan berhasil dihapus');
    }
}
