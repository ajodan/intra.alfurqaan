<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Events\MubalighDeleteEvent;
use App\Models\Mubaligh;
use App\Models\Peranmubaligh;
use Str;
use DB;

class MubalighController extends Controller
{
    public function index()
    {
        //$mubalighs = Mubaligh::get();
        $mubalighs = Mubaligh::join('peran_mubalighs', 'mubalighs.peranmubaligh_id', '=', 'peran_mubalighs.id')
            ->select('mubalighs.*', 'peran_mubalighs.nm_peran')
            ->orderBy('mubalighs.id','desc')
            ->get();
        return view('kegiatan.mubaligh.index', compact('mubalighs'));
    }

    public function create()
    {
        $peranmubalighs = Peranmubaligh::all();
        return view('kegiatan.mubaligh.create', compact('peranmubalighs'));
    }

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'nm_lengkap' => 'required|max:255',
            'hp' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
            'email' => 'required',
            'profil' => 'required',
            'peranmubaligh_id' => 'required',
            'photo' => 'required|image|file|max:1024',
        ]);

        if($request->file('photo')){
            $validateData['photo'] =  $request->file('photo')->store('img-mubaligh');
        }

       
        Mubaligh::create($validateData);

        return redirect()->route('mubaligh.index')->with('success', 'Data Mubaligh/Ustadz berhasil disimpan');
    }

    public function edit($id)
    {
        $mubaligh = Mubaligh::where('id', $id)->get();
        $peranmubalighs = Peranmubaligh::all();

        return view('kegiatan.mubaligh.edit', ['mubaligh' => $mubaligh], compact('peranmubalighs'));
    }

    public function update(Request $request, Mubaligh $mubaligh)
    {
       
        $validateData = $request->validate([
            'nm_lengkap' => 'required|max:255',
            'hp' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
            'email' => 'required',
            'profil' => 'required',
            'peranmubaligh_id' => 'required',
            'photo' => 'image|file|max:1024',
        ]);

        if($request->file('photo')){
            if($request->oldPhoto){
                Storage::delete($request->oldPhoto);
            }
            $validateData['photo'] =  $request->file('photo')->store('img-mubaligh');
        }

        Mubaligh::where('id',$mubaligh->id)
            ->update($validateData);

        return redirect()->route('mubaligh.index')->with('success', 'Data Mubaligh berhasil diperbaharui');

    }

    public function destroy(Mubaligh $mubaligh)
    {
        event(new MubalighDeleteEvent($mubaligh));
        if($mubaligh->photo){
            Storage::delete($mubaligh->photo);
        }
        $mubaligh->delete();
        return redirect()->route('mubaligh.index')->with('success', 'Data Mubaligh berhasil dihapus');
    }
}
