<!DOCTYPE html>
<html>

<head>
  <title>GENERATE PDF</title>
</head>

<body>
  <br><br>
  <center>
    <h2>Laporan Kas Masjid</h2>
  </center>
  <br>
  <b>Dari tanggal {{ \Carbon\Carbon::parse(request()->tgl_mulai)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse(request()->tgl_selesai)->format('d-m-Y') }}</b><br><br>
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
  </table>
</body>


</html>