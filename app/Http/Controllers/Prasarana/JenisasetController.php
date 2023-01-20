<?php

namespace App\Http\Controllers\Prasarana;

use App\Http\Controllers\Controller;
use App\Http\Requests\JenisasetRequest as Request;
use Illuminate\Http\Request as DefaultRequest;
//use App\Events\UserDeleteEvent;
use DB;
use App\Models\Jenisaset;

class JenisasetController extends Controller
{
    public function index(Jenisaset $jenisaset)
    {
        $jenisasets = Jenisaset::get();
        return view('prasarana.jenisaset.index', compact('jenisasets'));
    }

    public function create()
    {
        $maxId = DB::table('jenis_asets')->max('id');
        $max = $maxId + 1;
        return view('prasarana.jenisaset.create', compact('max'));
    }

    public function store(Request $request)
    {
        //$request->request->add(['password' => bcrypt($request->password)]);
        Jenisaset::create($request->all());
        return redirect()->route('jenisaset.index')->with('success', 'Data Jenis Aset Berhasil disimpan');
    }

   

    public function edit(Jenisaset $jenisaset)
    {
        return view('prasarana.jenisaset.edit', compact('jenisaset'));
    }

    public function update(DefaultRequest $request, Jenisaset $jenisaset)
    {
        //  $password = $request->password ? bcrypt($request->password) : $request->old_password;
        // $request->request->add(['password' => $password]);
        $jenisaset->update($request->all());
        return redirect()->route('jenisaset.index')->with('success', 'Data Jenis Aset berhasil diubah');
    }

    public function destroy(Jenisaset $jenisaset)
    {
        // event(new UserDeleteEvent($user));
        $jenisaset->delete();
        return redirect()->route('jenisaset.index')->with('success', 'Data Jenis Aset berhasil dihapus');
    }
}
