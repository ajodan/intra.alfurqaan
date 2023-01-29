<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            ->select('kegiatans.*', 'mubalighs.nm_lengkap', 'jenis_kegiatans.nm_jenis_kegiatan')
            ->orderBy('kegiatans.tgl','DESC')->get();
        return view('kegiatan.kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        $jeniskegiatans = Jeniskegiatan::all();
        $mubalighs = Mubaligh::all();
        $nama = Auth::user()->name;
        return view('kegiatan.kegiatan.create', compact('jeniskegiatans', 'mubalighs', 'nama'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nm_kegiatan' => 'required|max:255',
            'tgl' => 'required',
            'waktu' => 'required',
            'jeniskegiatan_id' => 'required',
            'mubaligh_id' => 'required',
            'photo' => 'required|image|file|max:1024',
        ]);

        if($request->file('photo')){
            $validateData['photo'] =  $request->file('photo')->store('img-kegiatan');
        }

        $validateData['created_by'] = Auth::user()->name;
        $validateData['keg_kajian'] = $request->keg_kajian;
        $validateData['keterangan'] = $request->keterangan;

        Kegiatan::create($validateData);

        return redirect()->route('kegiatan.index')->with('success', 'Data Kegiatan berhasil disimpan');
    }

    public function edit($id)
    {
        
        $kegiatans = Kegiatan::where('id', $id)->get();
        $jeniskegiatans = Jeniskegiatan::all();
        $mubalighs = Mubaligh::all();

        return view('kegiatan.kegiatan.edit', ['kegiatans' => $kegiatans], compact('jeniskegiatans', 'mubalighs'));
    }

    public function show(Kegiatan $kegiatan)
    {
        return view('kegiatan.kegiatan.show', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
    
        $validateData = $request->validate([
            'nm_kegiatan' => 'required|max:255',
            'tgl' => 'required',
            'waktu' => 'required',
            'jeniskegiatan_id' => 'required',
            'mubaligh_id' => 'required',
          //  'keg_kajian' => 'required',
           // 'video_url' => 'required',
            'keterangan' => 'required',
            'photo' => 'image|file|max:1024',
        ]);

        if($request->file('photo')){
            if($request->oldPhoto){
                Storage::delete($request->oldPhoto);
            }
            $validateData['photo'] =  $request->file('photo')->store('img-kegiatan');
        }

        Kegiatan::where('id',$kegiatan->id)
            ->update($validateData);
          
        return redirect()->route('kegiatan.index')->with('success', 'Data Kegiatan berhasil diperbaharui');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        event(new KegiatanDeleteEvent($kegiatan));
        if($kegiatan->photo){
            Storage::delete($kegiatan->photo);
        }
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Data Kegiatan berhasil dihapus');
    }
}
