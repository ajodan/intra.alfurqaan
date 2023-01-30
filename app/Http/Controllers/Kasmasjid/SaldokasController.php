<?php

namespace App\Http\Controllers\Kasmasjid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kasmasjid;

class SaldokasController extends Controller
{
    public function index()
    {

        $histori_saldo = $this->historiSaldo();
        return view('kasmasjid.saldokas.index', compact('histori_saldo'));
    }

    private function historiSaldo()
    {
        $saldokas = Kasmasjid::join('jenis_transaksi', 'jenis_transaksi.id', '=', 'kasmasjid.jenistransaksi_id')
            ->orderBy('kasmasjid.waktu', 'DESC')
            ->get(['kasmasjid.*', 'jenis_transaksi.nm_jenis_transaksi']);

        return $saldokas;
    }
}
