<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//use App\Events\MubalighDeleteEvent;
use App\Models\Yatimduafa;
use Auth;
use Str;
use DB;

class YatimduafaController extends Controller
{
    public function index()
    {
        $yatimduafa = Yatimduafa::get();
        return view('admin.yatimduafa.index', compact('yatimduafa'));
    }

    public function create()
    {
        return view('admin.yatimduafa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_lengkap' => 'required',
            'hp' => 'required',
            'tgl_lhr' => 'required',
            'status' => 'required',
            'alamat' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            if ($request->file('photo')) {
                $file = $request->file('photo');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('storage/Photo'), $filename);
                $data['photo'] = $filename;
            }
            Yatimduafa::create([
                'nm_lengkap' => $request->nm_lengkap,
                'tgl_lahir' => $request->tgl_lahir,
                'hp' => $request->hp,
                'jk' => $request->jk,
                'status' => $request->status,
                'alamat' => $request->alamat,
                'photo' => $filename,
                'keterangan' => $request->keterangan,
                'created_by' => Auth::user()->name
            ]);

            // Mubaligh::create($request->all());
        });

        return redirect()->route('admin.yatimduafa.index')->with('success', 'Data Yatim dan Duafa berhasil disimpan');
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
