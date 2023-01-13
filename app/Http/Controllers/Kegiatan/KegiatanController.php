<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Events\KegiatanDeleteEvent;
use App\Models\Kegiatan;
use App\Models\Jeniskegiatan;
use App\Models\Mubaligh;
use Str;
use Auth;
use DB;

class KegiatanController extends Controller
{
    public function index()
    {
        //$mubalighs = Mubaligh::get();
        $kegiatans = Kegiatan::join('mubalighs', 'kegiatans.mubaligh_id', '=', 'mubalighs.id')
            ->join('jenis_kegiatans', 'kegiatans.jeniskegiatan_id', '=', 'jenis_kegiatans.id')
            ->select('kegiatans.*', 'mubalighs.nm_lengkap', 'jenis_kegiatans.nm_jenis_kegiatan')->get();
        return view('kegiatan.kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        // $maxId = DB::table('kegiatans')->max('id');
        // $max = $maxId + 1;
        $jeniskegiatan = Jeniskegiatan::pluck('nm_jenis_kegiatan', 'id');
        $mubaligh = Mubaligh::pluck('nm_lengkap', 'id');
        return view('kegiatan.kegiatan.create', compact('jeniskegiatan', 'mubaligh'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_kegiatan' => 'required',
            'tgl' => 'required',
            'jeniskegiatan_id' => 'required',
            'mubaligh_id' => 'required',
            // 'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::transaction(function () use ($request) {
            if ($request->file('photo')) {
                $file = $request->file('photo');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('storage/Photo'), $filename);
                $data['photo'] = $filename;
            }
            Kegiatan::create([
                'jeniskegiatan_id' => $request->jeniskegiatan_id,
                'mubaligh_id' => $request->mubaligh_id,
                'nm_kegiatan' => $request->nm_kegiatan,
                'photo' => $request->photo,
                'tgl' => $request->tgl,
                'waktu' => $request->waktu,
                'video_url' => $request->video_url,
                'keterangan' => $request->keterangan,
                'created_by' => Auth::user()->name
            ]);

            // Mubaligh::create($request->all());
        });

        return redirect()->route('kegiatan.index')->with('success', 'Data Kegiatan berhasil disimpan');
    }

    public function edit($id)
    {
        $kegiatan = Kegiatan::where('id', $id)->get();
        $jeniskegiatan = Jeniskegiatan::all();
        $mubaligh = Mubaligh::all();
        return view('kegiatan.kegiatan.edit', ['kegiatan' => $kegiatan], compact('jeniskegiatan', 'mubaligh'));
    }

    public function show(Kegiatan $kegiatan)
    {
        return view('kegiatan.kegiatan.show', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $kegiatan->update($request->all());
        return redirect()->route('kegiatan.index')->with('success', 'Data Kegiatan berhasil diperbaharui');
    }

    public function destroy(Mubaligh $mubaligh)
    {
        event(new MubalighDeleteEvent($mubaligh));
        $mubaligh->delete();
        return redirect()->route('mubaligh.index')->with('success', 'Data Mubaligh berhasil dihapus');
    }
}
