<?php

namespace App\Http\Controllers\Kasmasjid;

use App\Http\Controllers\Controller;
use App\Http\Requests\JenistransaksiRequest as Request;
use Illuminate\Http\Request as DefaultRequest;
//use App\Events\UserDeleteEvent;
use DB;
use App\Models\Jenistransaksi;

class JenistransaksiController extends Controller
{
    public function index(Jenistransaksi $jenistransaksi)
    {
        $jenistransaksis = Jenistransaksi::get();
        return view('kasmasjid.jenistransaksi.index', compact('jenistransaksis'));
    }

    public function create()
    {
        $maxId = DB::table('jenis_transaksi')->max('id');
        $max = $maxId + 1;
        return view('kasmasjid.jenistransaksi.create', compact('max'));
    }

    public function store(Request $request)
    {
        //$request->request->add(['password' => bcrypt($request->password)]);
        Jenistransaksi::create($request->all());
        return redirect()->route('jenistransaksi.index')->with('success', 'Data Jenis Transaksi Berhasil disimpan');
    }

    public function show(Jenistransaksi $jenistransaksi)
    {
        return view('kasmasjid.jenistransaksi.show', compact('jenistransaksi'));
    }

    public function edit(Jenistransaksi $jenistransaksi)
    {
        return view('kasmasjid.jenistransaksi.edit', compact('jenistransaksi'));
    }

    public function update(DefaultRequest $request, Jenistransaksi $jenistransaksi)
    {
        //  $password = $request->password ? bcrypt($request->password) : $request->old_password;
        // $request->request->add(['password' => $password]);
        $jenistransaksi->update($request->all());
        return redirect()->route('jenistransaksi.index')->with('success', 'Data Jenis Transaksi berhasil diubah');
    }

    public function destroy(Jenistransaksi $jenistransaksi)
    {
        // event(new UserDeleteEvent($user));
        $jenistransaksi->delete();
        return redirect()->route('jenistransaksi.index')->with('success', 'Data Jenis Transaksi berhasil dihapus');
    }
}
