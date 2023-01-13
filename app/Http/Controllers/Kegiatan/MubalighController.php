<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            ->select('mubalighs.*', 'peran_mubalighs.nm_peran')->get();
        return view('kegiatan.mubaligh.index', compact('mubalighs'));
    }

    public function create()
    {
        $peranmubaligh = Peranmubaligh::pluck('nm_peran', 'id');
        return view('kegiatan.mubaligh.create', compact('peranmubaligh'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_lengkap' => 'required',
            'hp' => 'required',
            'alamat' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            if ($request->file('photo')) {
                $file = $request->file('photo');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('storage/Photo'), $filename);
                $data['photo'] = $filename;
            }
            Mubaligh::create([
                'nm_lengkap' => $request->nm_lengkap,
                'email' => $request->email,
                'hp' => $request->hp,
                'jk' => $request->jk,
                'alamat' => $request->alamat,
                'photo' => $filename,
                'profil' => $request->profil,
                'peranmubaligh_id' => $request->peranmubaligh_id
            ]);

            // Mubaligh::create($request->all());
        });

        return redirect()->route('mubaligh.index')->with('success', 'Data Mubaligh berhasil disimpan');
    }

    public function edit($id)
    {
        $mubaligh = Mubaligh::where('id', $id)->get();
        $peranmubaligh = Peranmubaligh::all();

        return view('kegiatan.mubaligh.edit', ['mubaligh' => $mubaligh], compact('peranmubaligh'));
    }

    // public function edit($id)
    // {
    //     $mubaligh = Mubaligh::join('peran_mubalighs', 'mubalighs.peranmubaligh_id', '=', 'peran_mubalighs.id')
    //         ->select('mubalighs.*', 'peran_mubalighs.nm_peran')
    //         ->find($id);

    //     $peranmubaligh = Peranmubaligh::all();
    //     return view('kegiatan.mubaligh.edit', compact('mubaligh', 'peranmubaligh'));
    // }

    public function update(Request $request, Mubaligh $mubaligh)
    {
        $mubaligh->update($request->all());
        return redirect()->route('mubaligh.index')->with('success', 'Data Mubaligh berhasil diperbaharui');
    }

    public function destroy(Mubaligh $mubaligh)
    {
        event(new MubalighDeleteEvent($mubaligh));
        $mubaligh->delete();
        return redirect()->route('mubaligh.index')->with('success', 'Data Mubaligh berhasil dihapus');
    }
}
