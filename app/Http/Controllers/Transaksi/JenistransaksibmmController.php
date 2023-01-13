<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Http\Requests\JenistransaksiRequest as Request;
use Illuminate\Http\Request as DefaultRequest;
//use App\Events\UserDeleteEvent;
use DB;
use App\Models\Jenistransaksibmm;

class JenistransaksibmmController extends Controller
{
    public function index(Jenistransaksibmm $jenistransaksibmm)
    {
        $jenistransaksis = Jenistransaksibmm::get();
        return view('transaksi.jenistransaksi.index', compact('jenistransaksis'));
    }

    public function create()
    {
        $maxId = DB::table('jenis_transaksi_bmm')->max('id');
        $max = $maxId + 1;
        return view('transaksi.jenistransaksi.create', compact('max'));
    }

    public function store(Request $request)
    {
        //$request->request->add(['password' => bcrypt($request->password)]);
        Jenistransaksibmm::create($request->all());
        return redirect()->route('jenistransaksibmm.index')->with('success', 'Data Jenis Transaksi Berhasil disimpan');
    }

    public function show(Jenistransaksibmm $jenistransaksibmm)
    {
        return view('transaksi.jenistransaksi.show', compact('jenistransaksibmm'));
    }

    public function edit(Jenistransaksibmm $jenistransaksibmm)
    {
        return view('transaksi.jenistransaksi.edit', compact('jenistransaksibmm'));
    }

    public function update(DefaultRequest $request, Jenistransaksibmm $jenistransaksibmm)
    {
        //  $password = $request->password ? bcrypt($request->password) : $request->old_password;
        // $request->request->add(['password' => $password]);
        $jenistransaksibmm->update($request->all());
        return redirect()->route('jenistransaksibmm.index')->with('success', 'Data Jenis Transaksi berhasil diubah');
    }

    public function destroy(Jenistransaksibmm $jenistransaksibmm)
    {
        // event(new UserDeleteEvent($user));
        $jenistransaksibmm->delete();
        return redirect()->route('jenistransaksibmm.index')->with('success', 'Data Jenis Transaksi berhasil dihapus');
    }
}
