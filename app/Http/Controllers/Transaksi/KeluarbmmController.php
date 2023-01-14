<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Kasbmm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;


class KeluarbmmController extends Controller
{
    public function index()
    {
        $jenistransaksi = DB::table('jenis_transaksi_bmm')->where('tipe_transaksi', 'keluar')->get();

        $histori_keluar = $this->historiKeluar();
        return view('transaksi.keluarbmm.index', compact('jenistransaksi', 'histori_keluar'));
    }


    private function historiKeluar()
    {
        $historiKeluar = Kasbmm::join('jenis_transaksi_bmm', 'jenis_transaksi_bmm.id', '=', 'kasbmm.jenistransaksibmm_id')
            ->where('jenis_transaksi_bmm.tipe_transaksi', 'keluar')
            ->orderBy('kasbmm.id', 'desc')
            ->get(['kasbmm.*', 'jenis_transaksi_bmm.nm_jenis_transaksi']);

        return $historiKeluar;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'waktu' => 'required',
            'nominal_keluar' => 'required|integer',
            'jenistransaksibmm_id' => 'required',
        ]);

        if ($request->nominal_keluar > 0) {
            DB::transaction(function () use ($request) {
                DB::table('kasbmm')->insert([
                    'waktu' => $request->waktu . ' ' . date('H:i:s'),
                    'nominal_keluar' => $request->nominal_keluar,
                    'nominal_masuk' => 0,
                    'jenistransaksibmm_id' => $request->jenistransaksibmm_id,
                    'created_at' => Carbon::now(),
                    'created_by' => Auth::user()->name
                ]);
            });

            return back()->with('success', 'Transaksi Keluar berhasil');
        } else {
            return back()->with('error', 'Transaksi Keluar Gagal , nominal tidak valid');
        }
    }

    public function edit(Kasmasjid $kasmasjid)
    {
        return view('kasmasjid.masuk.edit', compact('jabatan'));
    }


    public function destroy(Kasmasjid $kasmasjid)
    {
        $kasmasjid->delete();
        return redirect()->route('masuk.index')
            ->with('success', 'Data Pengeluaran Berhasil dihapus..!!');
    }
}
