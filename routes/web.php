<?php

use Illuminate\Support\Facades\Route;

// Auth namespace
use App\Http\Controllers\Auth\LoginController;

// Admin namespace
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\TruncateController;


// Operator namespace
use App\Http\Controllers\Operator\OperatorController;

// Nasabah namespace
use App\Http\Controllers\Nasabah\NasabahController;
use App\Http\Controllers\Nasabah\TransferController as NasabahTransferController;
use App\Http\Controllers\Nasabah\LaporanController as NasabahLaporanController;

// User namespace
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ChangePasswordController;

//Transaksi namespace
use App\Http\Controllers\Transaksi\TransaksiController;
use App\Http\Controllers\Transaksi\SaldoController;
use App\Http\Controllers\Transaksi\TransferController;
use App\Http\Controllers\Transaksi\TarikController;
use App\Http\Controllers\Transaksi\SetorController;
use App\Http\Controllers\Transaksi\KasbmmController;
use App\Http\Controllers\Transaksi\JenistransaksibmmController;
use App\Http\Controllers\Transaksi\MasukbmmController;
use App\Http\Controllers\Transaksi\LaporankasbmmController;
use App\Http\Controllers\Transaksi\KeluarbmmController;
use App\Http\Controllers\Transaksi\SaldokasbmmController;

//Kasmasjid namespace
use App\Http\Controllers\Kasmasjid\KasmasjidController;
use App\Http\Controllers\Kasmasjid\SaldokasController;
use App\Http\Controllers\Kasmasjid\KeluarController;
use App\Http\Controllers\Kasmasjid\MasukController;
use App\Http\Controllers\Kasmasjid\LaporankasController;
use App\Http\Controllers\Kasmasjid\LaporansaldokasController;
use App\Http\Controllers\Kasmasjid\JenistransaksiController;

use App\Http\Controllers\Kajian\TopikkajianController;
use App\Http\Controllers\Kajian\KajianController;

use App\Http\Controllers\Kegiatan\KategoriController;
use App\Http\Controllers\Kegiatan\ArtikelController;

use App\Http\Controllers\Kegiatan\JeniskegiatanController;
use App\Http\Controllers\Kegiatan\MubalighController;

use App\Http\Controllers\Prasarana\JenisasetController;
use App\Http\Controllers\Prasarana\NamaasetController;
use App\Http\Controllers\Prasarana\AsetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route Group Auth
Route::group(['namespace' => 'Auth'], function () {
	Route::view('/', 'auth.login')->middleware('guest');
	Route::view('/login', 'auth.login')->name('login')->middleware('guest');
	Route::post('/login', [LoginController::class, 'authenticated'])->name('login.post');

	Route::post('/logout', function () {
		Auth::logout();
		return redirect()->to('login');
	})->name('logout');

	Route::view('/forgot-password', 'auth.forgot-password');
});

// Route Group Admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'can:admin']], function () {
	Route::name('admin.')->group(function () {

		Route::get('/dashboard', [AdminController::class, 'index'])->name('index');
		Route::get('/', [AdminController::class, 'index']);

		Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
		Route::post('/laporan/transaksi', [LaporanController::class, 'transaksi'])->name('laporan.transaksi');
		Route::delete('truncate/transaksi', [TruncateController::class, 'transaksi'])->name('truncate.transaksi');

		//User Resource
		Route::resource('user', 'UserController');
		Route::resource('level', 'LevelController');
		Route::resource('jabatan', 'JabatanController');
		Route::resource('pengurus', 'PengurusController');
		Route::resource('pegawai', 'PegawaiController');
		Route::resource('nasabah', 'NasabahController');
		Route::resource('jamaah', 'JamaahController');
		Route::resource('rekening', 'RekeningController');
		Route::resource('peranmubaligh', 'PeranmubalighController');
		Route::resource('yatimduafa', 'YatimduafaController');

		//Generate PDF 
		Route::get('/pdf/user/export-pdf', 'PdfController@exportPdfUser')->name('pdf.export-pdf-user');
		Route::get('/pdf/user/print-pdf', 'PdfController@printPdfUser')->name('pdf.print-pdf-user');

		//Generate Excel 
		Route::get('/excel/user/export-excel', 'ExcelController@exportExcelUser')->name('excel.export-excel-user');
		Route::post('/excel/user/import-excel', 'ExcelController@importExcelUser')->name('excel.import-excel-user');
	});
});

Route::group(['middleware' => 'can:operator', 'prefix' => 'operator'], function () {
	Route::name('operator.')->group(function () {
		Route::resource('nasabah', 'Admin\NasabahController');
		Route::resource('rekening', 'Admin\RekeningController');
	});
});

// Route Group Operator
Route::group(['namespace' => 'Operator', 'prefix' => 'operator', 'middleware' => ['can:operator']], function () {
	Route::name('operator.')->group(function () {

		Route::get('/', [OperatorController::class, 'index'])->name('index');
	});
});

// Route Group Jamaah
Route::group(['namespace' => 'Jamaah', 'prefix' => 'jamaah', 'middleware' => ['can:jamaah']], function () {
	Route::name('jamaah.')->group(function () {

		Route::get('/', [JamaahController::class, 'index'])->name('index');

		Route::get('/transfer', [JamaahTransferController::class, 'index'])->name('transfer.index');
		Route::post('/transfer', [JamaahTransferController::class, 'store'])->name('transfer.store');
		Route::get('/histori-transfer', [JamaahTransferController::class, 'historiTransfer'])->name('transfer.histori');

		Route::post('/laporan/transfer-keluar', [NasabahLaporanController::class, 'transferKeluar'])->name('laporan.transfer-keluar');
	});
});

//Route Group User
Route::group(['namespace' => 'User', 'prefix' => 'user', 'middleware' => 'auth'], function () {
	Route::name('user.')->group(function () {
		//Home
		Route::get('/home', [HomeController::class, 'index'])->name('home');

		//Profile	
		Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
		Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

		//Ubah Password
		Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('change-password.index');
		Route::patch('/change-password', [ChangePasswordController::class, 'update'])->name('change-password.update');
	});
});

//Route Group Transaksi 
Route::group(['prefix' => 'transaksi', 'middleware' => ['auth', 'can:bmm']], function () {
	Route::namespace('Transaksi')->group(function () {

		Route::get('/', [TransaksiController::class, 'index'])->name('transaksi.index');
		Route::post('/', [TransaksiController::class, 'store'])->name('transaksi.store');
		Route::post('/bmm-generate-pdf', [LaporanController::class, 'transaksi'])->name('transaksi.generate-pdf');

		//Transfer
		Route::get('/transfer', [TransferController::class, 'index'])->name('transfer.index');
		Route::post('/transfer', [TransferController::class, 'store'])->name('transfer.store');
		Route::delete('/transfer', [TransferController::class, 'destroy'])->name('transfer.destroy');

		//Setor
		Route::get('/setor', [SetorController::class, 'index'])->name('setor.index');
		Route::post('/setor', [SetorController::class, 'store'])->name('setor.store');
		Route::delete('/setor', [SetorController::class, 'destroy'])->name('setor.destroy');

		//Tarik
		Route::get('/tarik', [TarikController::class, 'index'])->name('tarik.index');
		Route::post('/tarik', [TarikController::class, 'store'])->name('tarik.store');

		//Saldo
		Route::get('/saldo', [SaldoController::class, 'index'])->name('saldo.index');
		Route::post('/saldo', [SaldoController::class, 'store'])->name('saldo.store');

		Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
		Route::post('/laporan/transaksi', [LaporanController::class, 'transaksi'])->name('laporan.transaksi');
		Route::delete('truncate/transaksi', [TruncateController::class, 'transaksi'])->name('truncate.transaksi');

		Route::get('/kasbmm', [KasbmmController::class, 'index'])->name('kasbmm.index');
		// Route::post('/', [KasbmmController::class, 'store'])->name('kasbmm.store');
		Route::post('/generate-pdf', [LaporankasbmmController::class, 'kasbmm'])->name('kasbmm.generate-pdf');

		//Masuk
		Route::get('/masukbmm', [MasukbmmController::class, 'index'])->name('masukbmm.index');
		Route::post('/masukbmm', [MasukbmmController::class, 'store'])->name('masukbmm.store');

		//Masuk
		Route::get('/keluarbmm', [KeluarbmmController::class, 'index'])->name('keluarbmm.index');
		Route::post('/keluarbmm', [KeluarbmmController::class, 'store'])->name('keluarbmm.store');

		//Saldo
		Route::get('/saldokasbmm', [SaldokasbmmController::class, 'index'])->name('saldokasbmm.index');
		Route::post('/saldokasbmm', [SaldokasbmmController::class, 'store'])->name('saldokasbmm.store');
		Route::post('/saldokasbmm-pdf', [LaporansaldokasController::class, 'kasbmm'])->name('saldokasbmm.saldokasbmm-pdf');

		//Jenis Transaksi
		Route::resource('jenistransaksibmm', 'JenistransaksibmmController');
	});
});

//Route Group Kasmasjid 
Route::group(['prefix' => 'kasmasjid', 'middleware' => ['auth', 'can:bendahara']], function () {
	Route::namespace('Kasmasjid')->group(function () {

		Route::get('/', [KasmasjidController::class, 'index'])->name('kasmasjid.index');
		Route::post('/', [KasmasjidController::class, 'store'])->name('kasmasjid.store');
		Route::post('/generate-pdf', [LaporankasController::class, 'kasmasjid'])->name('kasmasjid.generate-pdf');

		//Masuk
		Route::get('/masuk', [MasukController::class, 'index'])->name('masuk.index');
		Route::post('/masuk', [MasukController::class, 'store'])->name('masuk.store');


		//Keluar
		Route::get('/keluar', [KeluarController::class, 'index'])->name('keluar.index');
		Route::post('/keluar', [KeluarController::class, 'store'])->name('keluar.store');

		//Saldo
		Route::get('/saldokas', [SaldokasController::class, 'index'])->name('saldokas.index');
		Route::post('/saldokas', [SaldokasController::class, 'store'])->name('saldokas.store');
		Route::post('/saldokas-pdf', [LaporansaldokasController::class, 'kasmasjid'])->name('saldokas.saldokas-pdf');


		//Jenis Transaksi
		Route::resource('jenistransaksi', 'JenistransaksiController');
	});
});

//Route Group Kegiatan 
Route::group(['prefix' => 'kegiatan', 'middleware' => ['auth', 'can:dakwah']], function () {
	Route::namespace('Kegiatan')->group(function () {

		//Jenis Kegiatan
		Route::resource('jeniskegiatan', 'JeniskegiatanController');

		//Kategori 
		Route::resource('kategori', 'KategoriController');
		//Mubaligh
		Route::resource('mubaligh', 'MubalighController');
		//Artikel

		Route::resource('artikel', 'ArtikelController');

		//Kegiatan
		Route::resource('kegiatan', 'KegiatanController');

		Route::get('/artikel/checkSlug', [ArtikelController::class, 'checkSlug']);
	});
});

//Route Group Kajian 
Route::group(['prefix' => 'kajian', 'middleware' => ['auth', 'can:dakwah']], function () {
	Route::namespace('Kajian')->group(function () {

		//Topik Kajian
		Route::resource('topikkajian', 'TopikkajianController');
		//Kajian
		Route::resource('kajian', 'KajianController');
	});
});

//Route Group Prasarana 
Route::group(['prefix' => 'prasarana', 'middleware' => ['auth', 'can:rumahtangga']], function () {
	Route::namespace('Prasarana')->group(function () {

		//Jenis Aset
		Route::resource('jenisaset', 'JenisasetController');
		//Nama Aset
		Route::resource('namaaset', 'NamaasetController');
		//Nama Aset
		Route::resource('aset', 'AsetController');
		
	});
});