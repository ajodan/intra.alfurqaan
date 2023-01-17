<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Events\ArtikelDeleteEvent;
use App\Models\Artikel;
use App\Models\Kategori;
use Str;
use DB;
use Auth;
use File;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ArtikelController extends Controller
{
    public function index()
    {
        //$mubalighs = Mubaligh::get();
        $artikels = Artikel::join('kategoris', 'artikels.kategori_id', '=', 'kategoris.id')
            ->select('artikels.*', 'kategoris.nm_kategori')->get();
        return view('kegiatan.artikel.index', compact('artikels'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $nama = Auth::user()->name;
        return view('kegiatan.artikel.create', compact('kategoris','nama'));
    }

    public function store(Request $request)
    {
       
        $validateData = $request->validate([
            'judul' => 'required|max:255',
            'kategori_id' => 'required',
            'isi_artikel' => 'required',
            'photo' => 'required|image|file|max:1024',
        ]);


        if($request->file('photo')){
            $validateData['photo'] =  $request->file('photo')->store('img-artikel');
        }

        $validateData['status'] = 'draft';
        $validateData['created_by'] = Auth::user()->name;

        Artikel::create($validateData);

        return redirect()->route('artikel.index')->with('success', 'Data Artikel/Berita berhasil disimpan');
    }

    public function edit($id)
    {
        $artikels = Artikel::where('id', $id)->get();
        $kategoris = Kategori::all();

        return view('kegiatan.artikel.edit', ['artikels' => $artikels], compact('kategoris'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        
        
        $validateData = $request->validate([
            'judul' => 'required|max:255',
            'kategori_id' => 'required',
            'isi_artikel' => 'required',
            //'photo' => 'required|image|file|max:1024',
        ]);

        if($request->file('photo')){
            if($request->oldPhoto){
                Storage::delete($request->oldPhoto);
            }
            $validateData['photo'] =  $request->file('photo')->store('img-artikel');
        }

        Artikel::where('id',$artikel->id)
            ->update($validateData);
          
        return redirect()->route('artikel.index')->with('success', 'Data Artikel/Berita berhasil diperbaharui');
    }

    public function destroy(Artikel $artikel)
    {
        event(new ArtikelDeleteEvent($artikel));
        if($artikel->photo){
            Storage::delete($artikel->photo);
        }
        $artikel->delete();
        return redirect()->route('artikel.index')->with('success', 'Data Artikel berhasil dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Artikel::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
