<!DOCTYPE html>
<html>

<head>
  <title>Laporan Kas Masjid</title>
</head>
<?php
$image  = public_path() . '/img/logo-alfurqaan.png'; // destination path
?>
<body>
  <center>
    <div class="pro-head">
      <img src="{{ $image }}" width="100" class="img-radius" alt="Logo Al Furqaan">
  </div>
    <h3 align='center'>DKM Al Furqaan</h3>
    <div align='center'>Perumahan Taman Alamanda Blok C Karangsatria, Tambun Utara, Kabupaten Bekasi</div>
    <div align='center'>Telepon : 08128263573, 081399553085, 085775242210</div>
    <h3 align='center'>Laporan Kas Masjid</h3>
  </center>
  <b>Periode tanggal {{ \Carbon\Carbon::parse(request()->tgl_mulai)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse(request()->tgl_selesai)->format('d-m-Y') }}</b><br><br>
  <table style="" border="1" cellspacing="0" cellpadding="10" width="100%">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Jenis Transaksi</th>
        <th scope="col">Pemasukan</th>
        <th scope="col">Pengeluaran</th>
        <th scope="col">Saldo Akhir</th>
      </tr>
    </thead>
    <tbody>
      @php
      $no=1;
      $saldo = 0;
      @endphp
      @foreach($kasmasjid as $tr)
      @php
      $saldo = $saldo + ($tr->nominal_masuk - $tr->nominal_keluar);
      @endphp

      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ \Carbon\Carbon::parse($tr->waktu)->format('d-m-Y') }}</td>
        <td>{{ $tr->nm_jenis_transaksi }}</td>
        <td align='right'>@toRupiah($tr->nominal_masuk)</td>
        <td align='right'>@toRupiah($tr->nominal_keluar)</td>
        <td align='right'>@toRupiah($saldo)</td>
      </tr>
      @endforeach
    </tbody>
  </table><br>
  <div align='left'>
    Mengetahui &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bendahara
  </div>
  <div align='left'>Ketua Umum DKM Al Furqaan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DKM Al Furqaan</div><br><br><br>
  <div align='left'>Nurhadi, M. Pd. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gunawan, S.E.</div>
</body>


</html>