<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kasbmm;

class SaldokasbmmController extends Controller
{
    public function index()
    {

        $histori_saldo = $this->historiSaldo();
        return view('transaksi.saldokasbmm.index', compact('histori_saldo'));
    }

    private function historiSaldo()
    {
        $saldokas = Kasbmm::join('jenis_transaksi_bmm', 'jenis_transaksi_bmm.id', '=', 'kasbmm.jenistransaksibmm_id')
            ->orderBy('kasbmm.waktu', 'ASC')
            ->get(['kasbmm.*', 'jenis_transaksi_bmm.nm_jenis_transaksi']);

        return $saldokas;
    }
}
