<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rekening;

class SaldoController extends Controller
{
    public function index()
    {
        $jamaah = DB::table('jamaah')->join('rekening', function ($join) {
            $join->on('jamaah.kd_jamaah', '=', 'rekening.kd_jamaah')
                ->select('jamaah.nm_jamaah', 'rekening.no_rekening');
        })->get();

        $histori_saldo = $this->historiSaldo();

        return view('transaksi.saldo.index', compact('jamaah', 'histori_saldo'));
    }

    private function historiSaldo()
    {
        // $histori_saldo = DB::table('rekening')
        //     // ->where('jns_transaksi', 'setor')
        //     ->join('jamaah', function ($query) {
        //         $query->on('transaksi.no_rekening', '=', 'rekening.no_rekening')
        //             ->join('jamaah', 'jamaah.kd_jamaah', '=', 'rekening.kd_jamaah');
        //     })->get();

        $saldo = Rekening::join('jamaah', 'rekening.kd_jamaah', '=', 'jamaah.kd_jamaah')
            ->select('rekening.*', 'jamaah.nm_jamaah', 'jamaah.kd_jamaah')
            ->get();

        return $saldo;
    }
}
