<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Kasbmm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;


class MasukbmmController extends Controller
{
    public function index()
    {
        $jenistransaksi = DB::table('jenis_transaksi_bmm')->where('tipe_transaksi', 'masuk')->get();

        $histori_masuk = $this->historiMasuk();
        return view('transaksi.masukbmm.index', compact('jenistransaksi', 'histori_masuk'));
    }


    private function historiMasuk()
    {
        $historiMasuk = Kasbmm::join('jenis_transaksi_bmm', 'jenis_transaksi_bmm.id', '=', 'kasbmm.jenistransaksibmm_id')
            ->where('jenis_transaksi_bmm.tipe_transaksi', 'masuk')
            ->orderBy('kasbmm.id', 'desc')
            ->get(['kasbmm.*', 'jenis_transaksi_bmm.nm_jenis_transaksi']);

        return $historiMasuk;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'waktu' => 'required',
            'nominal_masuk' => 'required|integer',
            'jenistransaksibmm_id' => 'required',
        ]);

        if ($request->nominal_masuk > 0) {
            DB::transaction(function () use ($request) {
                DB::table('kasbmm')->insert([
                    'waktu' => $request->waktu . ' ' . date('H:i:s'),
                    'nominal_masuk' => $request->nominal_masuk,
                    'nominal_keluar' => 0,
                    'jenistransaksibmm_id' => $request->jenistransaksibmm_id,
                    'created_at' => Carbon::now(),
                    'created_by' => Auth::user()->name
                ]);
            });

            return back()->with('success', 'Transaksi masuk berhasil');
        } else {
            return back()->with('error', 'Transaksi masuk gagal , nominal tidak valid');
        }
    }

    public function destroy(Kasmasjid $kasmasjid)
    {
        $kasmasjid->delete();
        return redirect()->route('masuk.index')
            ->with('success', 'Data Pemasukan Berhasil dihapus..!!');
    }
}
