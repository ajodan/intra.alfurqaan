<?php

namespace App\Http\Controllers\Kasmasjid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Services\PdfService;
use App\Models\Kasmasjid;

class KasmasjidController extends Controller
{
	public function index()
	{
		$jenistransaksi = DB::table('jenis_transaksi')->orderBy('nm_jenis_transaksi','asc')->get();

		$histori_transaksi = $this->historiTransaksi();

		return view('kasmasjid.index', compact('jenistransaksi', 'histori_transaksi'));
	}

	private function historiTransaksi()
	{
		$histori_transaksi = Kasmasjid::join('jenis_transaksi', 'jenis_transaksi.id', '=', 'kasmasjid.jenistransaksi_id')
			->orderBy('kasmasjid.waktu', 'asc')
			->get(['kasmasjid.*', 'jenis_transaksi.nm_jenis_transaksi']);

		return $histori_transaksi;
	}

	public function store(Request $request)
	{
		DB::table('transaksi')->insert([
			'no_rekening' => $request->no_rekening,
			'nominal' => $request->nominal,
			'jns_transaksi' => $request->jns_transaksi,
			'waktu' => $request->waktu,
			'created_at' => date('Y-m-d H:i:s'),
		]);

		return back()->with('success', 'Transaksi berhasil');
	}

	public function exportPdf(PdfService $pdfService)
	{
		$data['histori_transaksi'] = $histori_transaksi = $this->historiTransaksi();
		return $pdfService->export('kasmasjid.preview-pdf', $data, 'histori-transaksi');
	}

	public function printPdf(PdfService $pdfService)
	{

		$data['histori_transaksi'] = $histori_transaksi = $this->historiTransaksi();
		return $pdfService->print('kasmasjid.preview-pdf', $data);
	}
}
