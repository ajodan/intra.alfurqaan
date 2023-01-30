<?php

namespace App\Http\Controllers\Kasmasjid;

use App\Http\Controllers\Controller;
use App\Models\Kasmasjid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;


class MasukController extends Controller
{
    public function index()
    {
        $jenistransaksi = DB::table('jenis_transaksi')->where('tipe_transaksi', 'masuk')->orderBy('nm_jenis_transaksi')->get();

        $histori_masuk = $this->historiMasuk();
        return view('kasmasjid.masuk.index', compact('jenistransaksi', 'histori_masuk'));
    }


    private function historiMasuk()
    {
        $historiMasuk = Kasmasjid::join('jenis_transaksi', 'jenis_transaksi.id', '=', 'kasmasjid.jenistransaksi_id')
            ->where('jenis_transaksi.tipe_transaksi', 'masuk')
            ->orderBy('kasmasjid.id', 'desc')
            ->get(['kasmasjid.*', 'jenis_transaksi.nm_jenis_transaksi']);

        return $historiMasuk;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'waktu' => 'required',
            'nominal_masuk' => 'required|integer',
            'jenistransaksi_id' => 'required',
        ]);

        if ($request->nominal_masuk > 0) {
            DB::transaction(function () use ($request) {
                DB::table('kasmasjid')->insert([
                    'waktu' => $request->waktu . ' ' . date('H:i:s'),
                    'nominal_masuk' => $request->nominal_masuk,
                    'nominal_keluar' => 0,
                    'jenistransaksi_id' => $request->jenistransaksi_id,
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
