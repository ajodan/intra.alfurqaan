<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Services\PdfService;
use App\Models\Kasbmm;

class LaporankasbmmController extends Controller
{
    private $pdfService;

    function __construct(PdfService $pdfService)
    {
        $this->pdfService = $pdfService;
    }

    public function index()
    {
        return view('kasbmm.laporan.index');
    }

    public function kasbmm(Request $request)
    {
        $tanggal = $this->validate($request, [
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
        ]);

        // $histori_transaksi = Kasmasjid::join('jenis_transaksi', 'jenis_transaksi.id', '=', 'kasmasjid.jenistransaksi_id')
        //     ->whereBetween('transaksi.waktu', $tanggal)
        //     ->orderBy('kasmasjid.waktu', 'asc')
        //     ->get(['kasmasjid.*', 'jenis_transaksi.nm_jenis_transaksi']);

        $result = DB::table('kasbmm')
            ->join('jenis_transaksi_bmm', function ($query) use ($tanggal) {
                $query->on('kasbmm.jenistransaksibmm_id', '=', 'jenis_transaksi_bmm.id')
                    ->whereBetween('kasbmm.waktu', $tanggal);
            });

        $data['kasbmm'] = $result->get();
        $data['total_keluar'] = $result->sum('kasbmm.nominal_keluar');
        $data['total_masuk'] = $result->sum('kasbmm.nominal_masuk');

        $tgl_mulai = Carbon::parse($request->tgl_mulai)->format('d-m-Y');
        $tgl_selesai = Carbon::parse($request->tgl_selesai)->format('d-m-Y');

        if ($data['kasbmm']->count() > 0) {
            return $this->pdfService->export('transaksi.laporan.transaksi', $data, 'laporan-transaksi-' . $tgl_mulai . '-' . $tgl_selesai);
        } else {
            return back()
                ->with('error', 'Tidak ada data untuk tanggal ' . $tgl_mulai . ' - ' . $tgl_selesai);
        }
    }
}
