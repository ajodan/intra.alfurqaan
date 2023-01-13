<?php

namespace App\Http\Controllers\Jenismasuk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenismasukController extends Controller
{
    public function index()
    {
        $jamaah = DB::table('jamaah')->join('rekening', function ($join) {
            $join->on('jamaah.kd_jamaah', '=', 'rekening.kd_jamaah')
                ->select('jamaah.nm_jamaah', 'rekening.no_rekening');
        })->get();

        $histori_setor = $this->historiSetor();

        return view('kasmasjid.jenismasuk.index', compact('jamaah', 'histori_setor'));
    }

    private function historiSetor()
    {
        $histori_setor = DB::table('transaksi')
            ->where('jns_transaksi', 'setor')
            ->join('rekening', function ($query) {
                $query->on('transaksi.no_rekening', '=', 'rekening.no_rekening')
                    ->join('jamaah', 'jamaah.kd_jamaah', '=', 'rekening.kd_jamaah');
            })->get();

        return $histori_setor;
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'waktu' => 'required',
            'nominal' => 'required|integer',
            'no_rekening' => 'required|integer',
        ]);

        if ($request->nominal > 0) {
            DB::transaction(function () use ($request) {
                DB::table('transaksi')->insert([
                    'waktu' => $request->waktu . ' ' . date('H:i:s'),
                    'nominal' => $request->nominal,
                    'jns_transaksi' => 'setor',
                    'no_rekening' => $request->no_rekening,
                ]);

                $current_saldo = DB::table('rekening')
                    ->where('no_rekening', $request->no_rekening)
                    ->first()->saldo;

                DB::table('rekening')
                    ->where('no_rekening', $request->no_rekening)
                    ->update([
                        'saldo' => $current_saldo + $request->nominal,
                    ]);
            });

            return back()->with('success', 'Setor berhasil');
        } else {
            return back()->with('error', 'Setor gagal , nominal tidak valid');
        }
    }
}
