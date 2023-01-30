<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Events\JadwaljumatDeleteEvent;
use App\Models\Jadwaljumat;
use App\Models\Mubaligh;
use Str;
use DB;
use Auth;
use File;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class JadwaljumatController extends Controller
{
    public function index()
    {
        $jadwaljumats = Jadwaljumat::orderBy('id', 'desc')->get();
        // $jadwaljumats = Jadwaljumat::join('kategoris', 'artikels.kategori_id', '=', 'kategoris.id')
        //     ->select('artikels.*', 'kategoris.nm_kategori')->get();
        return view('kegiatan.jadwaljumat.index', compact('jadwaljumats'));
    }

    public function create()
    {
        $mubalighs = Mubaligh::all();
        $nama = Auth::user()->name;
        return view('kegiatan.jadwaljumat.create', compact('mubalighs','nama'));
    }

    public function store(Request $request)
    {
       
        $validateData = $request->validate([
            'tgl' => 'required',
            'waktu' => 'required',
        ]);

        $validateData['imam'] = $request->imam;
        $validateData['khotib'] = $request->khotib;
        $validateData['mc'] = $request->mc;
        $validateData['muadzin'] = $request->muadzin;
        $validateData['created_by'] = Auth::user()->name;

        Jadwaljumat::create($validateData);

        return redirect()->route('jadwaljumat.index')->with('success', 'Data Jadwal Jumat berhasil disimpan');
    }

    public function edit($id)
    {
        $jadwals = Jadwaljumat::where('id', $id)->get();
        $mubalighs = Mubaligh::all();

        return view('kegiatan.jadwaljumat.edit', ['jadwals' => $jadwals], compact('mubalighs'));
    }

    public function update(Request $request, Jadwaljumat $jadwaljumat)
    {
        
        
        $validateData = $request->validate([
            'tgl' => 'required',
            'waktu' => 'required',
        ]);

        $validateData['imam'] = $request->imam;
        $validateData['khotib'] = $request->khotib;
        $validateData['mc'] = $request->mc;
        $validateData['muadzin'] = $request->muadzin;
        $validateData['created_by'] = Auth::user()->name;

        Jadwaljumat::where('id',$jadwaljumat->id)
            ->update($validateData);
          
        return redirect()->route('jadwaljumat.index')->with('success', 'Data Jadwal Jumat berhasil diperbaharui');
    }

    public function destroy(Jadwaljumat $jadwaljumat)
    {
        event(new JadwaljumatDeleteEvent($jadwaljumat));
        // if($artikel->photo){
        //     Storage::delete($artikel->photo);
        // }
        $jadwaljumat->delete();
        return redirect()->route('jadwaljumat.index')->with('success', 'Data Jadwal Jumat berhasil dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Artikel::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
