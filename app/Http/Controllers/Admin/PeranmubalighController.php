<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PeranmubalighRequest as Request;
use Illuminate\Http\Request as DefaultRequest;
//use App\Events\UserDeleteEvent;
use DB;
use App\Models\Peranmubaligh;

class PeranmubalighController extends Controller
{
    public function index(Peranmubaligh $peranmubaligh)
    {
        $peranmubalighs = Peranmubaligh::get();
        return view('admin.peranmubaligh.index', compact('peranmubalighs'));
    }

    public function create()
    {
        $maxId = DB::table('peran_mubalighs')->max('id');
        $max = $maxId + 1;
        return view('admin.peranmubaligh.create', compact('max'));
    }

    public function store(Request $request)
    {
        //$request->request->add(['password' => bcrypt($request->password)]);
        Peranmubaligh::create($request->all());
        return redirect()->route('admin.peranmubaligh.index')->with('success', 'Data Peran Mubaligh Berhasil disimpan');
    }

    public function show(Jabatan $jabatan)
    {
        return view('admin.jabatan.show', compact('jabatan'));
    }

    public function edit(Peranmubaligh $peranmubaligh)
    {
        return view('admin.peranmubaligh.edit', compact('peranmubaligh'));
    }

    public function update(DefaultRequest $request, Peranmubaligh $peranmubaligh)
    {
        //  $password = $request->password ? bcrypt($request->password) : $request->old_password;
        // $request->request->add(['password' => $password]);
        $peranmubaligh->update($request->all());
        return redirect()->route('admin.peranmubaligh.index')->with('success', 'Data Peran Mubaligh berhasil diubah');
    }

    public function destroy(Peranmubaligh $peranmubaligh)
    {
        // event(new UserDeleteEvent($user));
        $peranmubaligh->delete();
        return redirect()->route('admin.peranmubaligh.index')->with('success', 'Data Peran Mubaligh berhasil dihapus');
    }
}
