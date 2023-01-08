<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Services\PdfService;

class TransaksiController extends Controller
{
	public function index()
	{
		$jamaah = DB::table('jamaah')->join('rekening', function ($join) {
			$join->on('jamaah.kd_jamaah', '=', 'rekening.kd_jamaah')
				->select('jamaah.nm_jamaah', 'rekening.no_rekening');
		})->get();

		$histori_transaksi = $this->historiTransaksi();

		return view('transaksi.index', compact('jamaah', 'histori_transaksi'));
	}

	private function historiTransaksi()
	{
		$histori_transaksi = DB::table('transaksi')->join('rekening', function ($query) {
			$query->on('transaksi.no_rekening', '=', 'rekening.no_rekening')
				->join('jamaah', 'jamaah.kd_jamaah', '=', 'rekening.kd_jamaah')
				->select('jamaah.nm_jamaah');
		})->latest('transaksi.created_at')->get();

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
		return $pdfService->export('transaksi.preview-pdf', $data, 'histori-transaksi');
	}

	public function printPdf(PdfService $pdfService)
	{

		$data['histori_transaksi'] = $histori_transaksi = $this->historiTransaksi();
		return $pdfService->print('transaksi.preview-pdf', $data);
	}
}
