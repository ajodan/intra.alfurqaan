<?php

namespace App\Http\Controllers\Kajian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//use App\Events\MubalighDeleteEvent;
use App\Models\Kajian;
use App\Models\Kegiatan;
use App\Models\Topikkajian;
use Str;
use DB;
use Auth;

class KajianController extends Controller
{
    public function index()
    {

        $kajians = Kajian::join('kegiatans', 'kajians.kegiatan_id', '=', 'kegiatans.id')
            ->join('topik_kajians', 'kajians.topikkajian_id', '=', 'topik_kajians.id')
            ->select('kajians.*', 'topik_kajians.nm_topik_kajian', 'kegiatans.nm_kegiatan', 'kegiatans.tgl')->get();
        return view('kajian.kajian.index', compact('kajians'));
    }

    public function create()
    {
        $topikkajian = Topikkajian::pluck('nm_topik_kajian', 'id');
        $kegiatan = Kegiatan::pluck('nm_kegiatan', 'id');
        return view('kajian.kajian.create', compact('topikkajian', 'kegiatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'topikkajian_id' => 'required',
            'kegiatan_id' => 'required',
            'isi_kajian' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            Kajian::create([
                'kegiatan_id' => $request->kegiatan_id,
                'topikkajian_id' => $request->topikkajian_id,
                'isi_kajian' => $request->isi_kajian,
                'created_by' => Auth::user()->name
            ]);
        });
        // Kajian::create($request->all());
        return redirect()->route('kajian.index')->with('success', 'Data Kajian berhasil disimpan');
    }

    public function edit($id)
    {
        $kajian = Kajian::where('id', $id)->get();
        $topikkajian = Topikkajian::all();
        $kegiatan = Kegiatan::all();
        return view('kajian.kajian.edit', ['kajian' => $kajian], compact('kegiatan', 'topikkajian'));
    }



    public function update(Request $request, Kajian $kajian)
    {
        $kajian->update($request->all());
        return redirect()->route('kajian.index')->with('success', 'Data Kajian berhasil diperbaharui');
    }

    public function destroy(Kajian $kajian)
    {
        //event(new MubalighDeleteEvent($mubaligh));
        $kajian->delete();
        return redirect()->route('kajian.index')->with('success', 'Data Kajian berhasil dihapus');
    }
}
