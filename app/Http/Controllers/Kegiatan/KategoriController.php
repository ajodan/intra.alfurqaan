<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriRequest as Request;
use Illuminate\Http\Request as DefaultRequest;
//use App\Events\UserDeleteEvent;
use DB;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(Kategori $Kategori)
    {
        $kategoris = Kategori::get();
        return view('kegiatan.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        $maxId = DB::table('kategoris')->max('id');
        $max = $maxId + 1;
        return view('kegiatan.kategori.create', compact('max'));
    }

    public function store(Request $request)
    {
        //$request->request->add(['password' => bcrypt($request->password)]);
        Kategori::create($request->all());
        return redirect()->route('kategori.index')->with('success', 'Data Kategori Berhasil disimpan');
    }

    // public function show(Jenistransaksi $jenistransaksi)
    // {
    //     return view('kasmasjid.jenistransaksi.show', compact('jenistransaksi'));
    // }

    public function edit(Kategori $kategori)
    {
        return view('kegiatan.kategori.edit', compact('kategori'));
    }

    public function update(DefaultRequest $request, Kategori $kategori)
    {

        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('success', 'Data Kategori berhasil diubah');
    }

    public function destroy(Kategori $kategori)
    {
        // event(new UserDeleteEvent($user));
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Data Kategori berhasil dihapus');
    }
}
