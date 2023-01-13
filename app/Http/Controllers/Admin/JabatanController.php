<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JabatanRequest as Request;
use Illuminate\Http\Request as DefaultRequest;
//use App\Events\UserDeleteEvent;
use DB;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    public function index(Jabatan $jabatan)
    {
        $jabatans = Jabatan::get();
        return view('admin.jabatan.index', compact('jabatans'));
    }

    public function create()
    {
        $maxId = DB::table('jabatan')->max('id');
        $max = $maxId + 1;
        return view('admin.jabatan.create', compact('max'));
    }

    public function store(Request $request)
    {
        //$request->request->add(['password' => bcrypt($request->password)]);
        Jabatan::create($request->all());
        return redirect()->route('admin.jabatan.index')->with('success', 'Data Jabatan Berhasil disimpan');
    }

    public function show(Jabatan $jabatan)
    {
        return view('admin.jabatan.show', compact('jabatan'));
    }

    public function edit(Jabatan $jabatan)
    {
        return view('admin.jabatan.edit', compact('jabatan'));
    }

    public function update(DefaultRequest $request, Jabatan $jabatan)
    {
        //  $password = $request->password ? bcrypt($request->password) : $request->old_password;
        // $request->request->add(['password' => $password]);
        $jabatan->update($request->all());
        return redirect()->route('admin.jabatan.index')->with('success', 'Data Jabatan berhasil diubah');
    }

    public function destroy(Jabatan $jabatan)
    {
        // event(new UserDeleteEvent($user));
        $jabatan->delete();
        return redirect()->route('admin.jabatan.index')->with('success', 'Data Jabatan berhasil dihapus');
    }
}
