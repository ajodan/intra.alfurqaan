<!DOCTYPE html>
<html>

<head>
  <title>CETAK PDF</title>
</head>

<body>
  <br><br>
  <center>
    <h2>Laporan Kas Baitul Maal Masjid</h2>
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
      </tr>
    </thead>
    <tbody>
      @foreach($kasbmm as $tr)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ \Carbon\Carbon::parse($tr->waktu)->format('d-m-Y') }}</td>
        <td>{{ $tr->nm_jenis_transaksi }}</td>
        <td align='right'>@toRupiah($tr->nominal_masuk)</td>
        <td align='right'>@toRupiah($tr->nominal_keluar)</td>
      </tr>
      @endforeach
      <tr>
        <td colspan="3"><b>Jumlah Keseluruhan</b></td>
        <td><b>@toRupiah($total_masuk)</b></td>
        <td><b>@toRupiah($total_keluar)</b></td>
      </tr>
    </tbody>
  </table>
</body>

</html>