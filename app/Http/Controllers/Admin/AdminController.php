<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Kasmasjid;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;

class AdminController extends Controller
{
    public function index()
    {

        $total_transaksi = $this->totalTransaksi();
    	
        return view('admin.index',compact('total_transaksi'));
    }

    private function totalTransaksi()
    {
   
        $totalmasuk = DB::table('kasmasjid')->sum('nominal_masuk');
        $totalkeluar = DB::table('kasmasjid')->sum('nominal_keluar');
        $saldoakhir = $totalmasuk - $totalkeluar;
        return $saldoakhir;
    }
}