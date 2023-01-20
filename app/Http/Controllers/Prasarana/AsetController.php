<?php

namespace App\Http\Controllers\Prasarana;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Events\AsetDeleteEvent;
use App\Models\Aset;
use App\Models\Namaaset;
use Str;
use DB;
use Auth;
use File;


class AsetController extends Controller
{
    public function index()
    {
        
        $asets = Aset::join('nama_asets', 'asets.namaaset_id', '=', 'nama_asets.id')
            ->select('asets.*', 'nama_asets.nm_aset')->get();
        return view('prasarana.aset.index', compact('asets'));
    }

    public function create()
    {
        $namaasets = Namaaset::all();
       // $nama = Auth::user()->name;
        return view('prasarana.aset.create', compact('namaasets'));
    }

    public function store(Request $request)
    {
       
        $validateData = $request->validate([
            'jumlah' => 'integer|required',
            'namaaset_id' => 'required',
            'satuan' => 'required',
            'kondisi' => 'required',
            'photo' => 'required|image|file|max:1024',
        ]);


        if($request->file('photo')){
            $validateData['photo'] =  $request->file('photo')->store('img-aset');
        }

        $validateData['ket'] = $request->ket;
        $validateData['tgl_perolehan'] = $request->tgl_perolehan;
        $validateData['harga_perolehan'] = $request->harga_perolehan;
      //  $validateData['created_by'] = Auth::user()->name;

        Aset::create($validateData);

        return redirect()->route('aset.index')->with('success', 'Data Aset/Inventaris berhasil disimpan');
    }

    public function edit($id)
    {
        $asets = Aset::where('id', $id)->get();
        $namaasets = Namaaset::all();

        return view('prasarana.aset.edit', ['asets' => $asets], compact('namaasets'));
    }

    public function update(Request $request, Aset $aset)
    {
        
        
        $validateData = $request->validate([
            'jumlah' => 'integer|required',
            'namaaset_id' => 'required',
            'satuan' => 'required',
            'kondisi' => 'required',
           // 'photo' => 'required|image|file|max:1024',
        ]);

        if($request->file('photo')){
            if($request->oldPhoto){
                Storage::delete($request->oldPhoto);
            }
            $validateData['photo'] =  $request->file('photo')->store('img-aset');
        }

        $validateData['ket'] = $request->ket;
        $validateData['tgl_perolehan'] = $request->tgl_perolehan;
        $validateData['harga_perolehan'] = $request->harga_perolehan;

        Aset::where('id',$aset->id)
            ->update($validateData);
          
        return redirect()->route('aset.index')->with('success', 'Data Aset/Inventaris berhasil diperbaharui');
    }

    public function destroy(Aset $aset)
    {
        event(new AsetDeleteEvent($aset));
        if($aset->photo){
            Storage::delete($aset->photo);
        }
        $aset->delete();
        return redirect()->route('aset.index')->with('success', 'Data Aset/Inventaris berhasil dihapus');
    }

   
}
