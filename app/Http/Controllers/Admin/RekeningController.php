<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request as DefaultRequest;
use App\Http\Requests\RekeningRequest as Request;


use App\Models\Rekening;
use App\Models\Jamaah;
use App\Models\Pengurus;
use DB;

class RekeningController extends Controller
{
    public function index()
    {
        $rekening = Rekening::join('pengurus', 'rekening.kd_pengurus', '=', 'pengurus.kd_pengurus')
            ->select('rekening.*', 'pengurus.nm_pengurus', 'pengurus.kd_pengurus')
            ->get();
        return view('admin.rekening.index', compact('rekening'));
    }

    public function create()
    {
        return view('admin.rekening.create');
    }

    public function store(Request $request)
    {
        Rekening::create($request->all());
        return redirect()->route('admin.rekening.index')->with('success', 'Data berhasil ditambah');
    }

    public function show(Rekening $rekening)
    {
        $histori_transaksi = DB::table('transaksi')
            ->where('no_rekening', $rekening->no_rekening)
            ->latest('waktu')
            ->get();

        $nasabah = DB::table('rekening')
            ->where('rekening.id', $rekening->id)->join('jamaah', 'rekening.kd_jamaah', '=', 'jamaah.kd_jamaah')
            ->first();

        return view('admin.rekening.show', compact('rekening', 'jamaah', 'histori_transaksi'));
    }

    public function edit(Rekening $rekening)
    {
        return view('admin.rekening.edit', compact('rekening'));
    }

    public function update(DefaultRequest $request, Rekening $rekening)
    {
        $rekening->update($request->all());
        return redirect()->route('admin.rekening.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Rekening $rekening)
    {
        $rekening->delete();
        return redirect()->route('admin.rekening.index')->with('success', 'Data berhasil dihapus');
    }
}
