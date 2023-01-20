<?php

namespace App\Http\Controllers\Prasarana;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Events\NamaasetDeleteEvent;
use App\Models\Namaaset;
use App\Models\Jenisaset;

use Str;
use Auth;
use DB;

class NamaasetController extends Controller
{
    public function index()
    {
        $namaasets = Namaaset::join('jenis_asets', 'nama_asets.jenisaset_id', '=', 'jenis_asets.id')
            ->select('nama_asets.*', 'jenis_asets.nm_jenis_aset')
            ->orderBy('nama_asets.nm_aset','DESC')->get();
        return view('prasarana.namaaset.index', compact('namaasets'));
    }

    public function create()
    {
        $jenisasets = Jenisaset::all();
       
        return view('prasarana.namaaset.create', compact('jenisasets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenisaset_id' => 'required',
            'kd_aset' => 'required',
            'nm_aset' => 'required',
            'merk' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            Namaaset::create([
                'jenisaset_id' => $request->jenisaset_id,
                'kd_aset' => $request->kd_aset,
                'nm_aset' => $request->nm_aset,
                'merk' => $request->merk,
            ]);
        });

        return redirect()->route('namaaset.index')->with('success', 'Data Nama Aset berhasil disimpan');
    }

    public function edit($id)
    {
        
        $namaasets = Namaaset::where('id', $id)->get();
        $jenisasets = Jenisaset::all();

        return view('prasarana.namaaset.edit', ['namaasets' => $namaasets], compact('jenisasets'));
    }

    public function show(Kegiatan $kegiatan)
    {
        return view('kegiatan.kegiatan.show', compact('kegiatan'));
    }

    public function update(Request $request, Namaaset $namaaset)
    {
    
        $validateData = $request->validate([
            'jenisaset_id' => 'required',
            'kd_aset' => 'required',
            'nm_aset' => 'required',
            'merk' => 'required',
        ]);

       
        Namaaset::where('id',$namaaset->id)
            ->update($validateData);
          
        return redirect()->route('namaaset.index')->with('success', 'Data Nama Aset berhasil diperbaharui');
    }

    public function destroy(Namaaset $namaaset)
    {
        event(new NamaasetDeleteEvent($namaaset));
     
        $namaaset->delete();
        return redirect()->route('namaaset.index')->with('success', 'Data Nama Aset berhasil dihapus');
    }
}
