<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Services\PdfService;
use App\Models\Kasbmm;

class KasbmmController extends Controller
{
	public function index()
	{
		$jenistransaksibmm = DB::table('jenis_transaksi_bmm')->get();

		$histori_transaksi = $this->historiTransaksi();

		return view('transaksi.kasbmm.index', compact('jenistransaksibmm', 'histori_transaksi'));
	}

	private function historiTransaksi()
	{
		$histori_transaksi = Kasbmm::join('jenis_transaksi_bmm', 'jenis_transaksi_bmm.id', '=', 'kasbmm.jenistransaksibmm_id')
			->orderBy('kasbmm.waktu', 'asc')
			->get(['kasbmm.*', 'jenis_transaksi_bmm.nm_jenis_transaksi']);

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
