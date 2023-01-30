<?php

namespace App\Http\Controllers\Kasmasjid;

use App\Http\Controllers\Controller;
use App\Models\Kasmasjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;


class KeluarController extends Controller
{
    public function index()
    {
        $jenistransaksi = DB::table('jenis_transaksi')->where('tipe_transaksi', 'keluar')->orderBy('nm_jenis_transaksi')->get();

        $histori_keluar = $this->historiKeluar();
        return view('kasmasjid.keluar.index', compact('jenistransaksi', 'histori_keluar'));
    }


    private function historiKeluar()
    {
        $historiKeluar = Kasmasjid::join('jenis_transaksi', 'jenis_transaksi.id', '=', 'kasmasjid.jenistransaksi_id')
            ->where('jenis_transaksi.tipe_transaksi', 'keluar')
            ->orderBy('kasmasjid.waktu', 'desc')
            ->get(['kasmasjid.*', 'jenis_transaksi.nm_jenis_transaksi']);

        return $historiKeluar;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'waktu' => 'required',
            'nominal_keluar' => 'required|integer',
            'jenistransaksi_id' => 'required',
        ]);

        if ($request->nominal_keluar > 0) {
            DB::transaction(function () use ($request) {
                DB::table('kasmasjid')->insert([
                    'waktu' => $request->waktu . ' ' . date('H:i:s'),
                    'nominal_keluar' => $request->nominal_keluar,
                    'nominal_masuk' => 0,
                    'jenistransaksi_id' => $request->jenistransaksi_id,
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
