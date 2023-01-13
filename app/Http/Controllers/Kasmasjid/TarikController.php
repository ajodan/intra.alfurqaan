<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarikController extends Controller
{
	public function index()
	{
		$jamaah = DB::table('jamaah')->join('rekening', function ($join) {
			$join->on('jamaah.kd_jamaah', '=', 'rekening.kd_jamaah')
				->select('jamaah.nm_jamaah', 'rekening.no_rekening');
		})->get();

		$histori_penarikan = DB::table('transaksi')
			->where('jns_transaksi', 'tarik')
			->join('rekening', function ($query) {
				$query->on('transaksi.no_rekening', '=', 'rekening.no_rekening')
					->join('jamaah', 'rekening.kd_jamaah', '=', 'jamaah.kd_jamaah');
			})->get();

		return view('transaksi.tarik.index', compact('jamaah', 'histori_penarikan'));
	}

	public function store(Request $request)
	{
		$rekening = DB::table('rekening')
			->where('no_rekening', $request->no_rekening)
			->first();

		if ($request->nominal < 1) {
			return back()->with('error', 'Nominal Tidak valid');
		}

		if ($rekening->saldo >= 50000) {
			if ($rekening->saldo >= $request->nominal) {
				DB::transaction(function () use ($request, $rekening) {
					DB::table('transaksi')->insert([
						'waktu' => $request->waktu . ' ' . date('H:i:s'),
						'nominal' => $request->nominal,
						'jns_transaksi' => 'tarik',
						'no_rekening' => $request->no_rekening,
					]);

					DB::table('rekening')
						->where('no_rekening', $request->no_rekening)
						->update([
							'saldo' => $rekening->saldo - $request->nominal,
						]);
				});
				return back()->with('success', 'Penarikan sukses');
			} else {
				return back()->with('error', 'Penarikan gagal , saldo tidak cukup');
			}
		} else {
			return back()->with('error', 'Penarikan gagal , saldo kurang dari Rp.50000');
		}
	}
}
