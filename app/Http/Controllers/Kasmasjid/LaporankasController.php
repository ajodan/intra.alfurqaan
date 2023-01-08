<?php

namespace App\Http\Controllers\Kasmasjid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Services\PdfService;
use App\Models\Kasmasjid;

class LaporankasController extends Controller
{
    private $pdfService;

    function __construct(PdfService $pdfService)
    {
        $this->pdfService = $pdfService;
    }

    public function index()
    {
        return view('kasmasjid.laporan.index');
    }

    public function kasmasjid(Request $request)
    {
        $tanggal = $this->validate($request, [
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
        ]);

        // $histori_transaksi = Kasmasjid::join('jenis_transaksi', 'jenis_transaksi.id', '=', 'kasmasjid.jenistransaksi_id')
        //     ->whereBetween('transaksi.waktu', $tanggal)
        //     ->orderBy('kasmasjid.waktu', 'asc')
        //     ->get(['kasmasjid.*', 'jenis_transaksi.nm_jenis_transaksi']);

        $result = DB::table('kasmasjid')
            ->join('jenis_transaksi', function ($query) use ($tanggal) {
                $query->on('kasmasjid.jenistransaksi_id', '=', 'jenis_transaksi.id')
                    ->whereBetween('kasmasjid.waktu', $tanggal);
            });

        $data['kasmasjid'] = $result->get();
        $data['total_keluar'] = $result->sum('kasmasjid.nominal_keluar');
        $data['total_masuk'] = $result->sum('kasmasjid.nominal_masuk');

        $tgl_mulai = Carbon::parse($request->tgl_mulai)->format('d-m-Y');
        $tgl_selesai = Carbon::parse($request->tgl_selesai)->format('d-m-Y');

        if ($data['kasmasjid']->count() > 0) {
            return $this->pdfService->export('kasmasjid.laporan.transaksi', $data, 'laporan-transaksi-' . $tgl_mulai . '-' . $tgl_selesai);
        } else {
            return back()
                ->with('error', 'Tidak ada data untuk tanggal ' . $tgl_mulai . ' - ' . $tgl_selesai);
        }
    }
}
